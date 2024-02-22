<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MRListExport;

class MarketingRepresentativeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.mr.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.mr.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation rules
        $rules = [
            'name' => 'required|string|max:255',
            'employee_id' => 'required|string|max:255|unique:users,employee_id',
            // 'email' => 'required|email|max:255|unique:users,email',
            // 'date_of_birth' => 'required|date',
            // 'phone' => 'required|string|max:20',
            // 'status' => ['required', Rule::in(['Active', 'InActive', 'Suspend', 'Block'])],
            // 'password' => 'required|string|min:6|confirmed',
        ];

        // Custom validation messages
        $messages = [
            // 'status.in' => 'The status must be one of: Active, InActive, Suspend, Block.',
            // 'password.confirmed' => 'The password confirmation does not match.',
        ];

        // Validate the request data
        $validatedData = $request->validate($rules, $messages);

        try {
            // Create a new User instance
            $user = new User();
            $user->employee_id = $request->input('employee_id');
            $user->name = $request->input('name');
            $user->role = 'mr';
            $user->status = 'Active';
            $user->doctor_create_limit = '10';
            // Save the user
            $user->save();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error while creating user: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while creating an account');
        }
    }



    public function mrListtable()
    {


        if (isset($_GET['search']['value'])) {
            $search = $_GET['search']['value'];
        } else {
            $search = '';
        }

        if (isset($_GET['length'])) {
            $limit = $_GET['length'];
        } else {
            $limit = 10;
        }

        if (isset($_GET['start'])) {
            $offset = $_GET['start'];
        } else {
            $offset = 0;
        }

        $orderType = isset($_GET['order'][0]['dir']) ? $_GET['order'][0]['dir'] : 'asc';
        $nameOrder = isset($_GET['columns'][$_GET['order'][0]['column']]['name']) ? $_GET['columns'][$_GET['order'][0]['column']]['name'] : 'id';



        $query = User::whereNull('deleted_at')
            ->where('role', 'mr');

        $query->where('employee_id', 'like', $search . '%')
            ->where('employee_id', 'like', $search . '%');

        $total = $query->count();

        $order = $query->offset($offset)
            ->limit($limit)
            ->orderBy($nameOrder, $orderType)
            ->get();


        $data = [];

        foreach ($order as $index => $cate) {

            $doctor_count = Doctor::where('created_by', $cate->id)->count();
            $download = '<a href="' . route('admin.zipdownload', ['imageId' => $cate->id]) . '" class="btn btn-sm btn-info" title="Download All Doctor Photos">
            <i class="fa fa-download"></i></a>';

            $data[] = [

                'name' => $cate->name,
                "employee_id" => $cate->employee_id,
                // "email" => $cate->email,
                // "phone" => $cate->phone,
                // "date_of_joining" => Carbon::parse($cate->created_at)->format('Y-m-d h:iA'),
                // "status" => $cate->status,
                "doctor_added" => $doctor_count,
                "download" =>  $download,
            ];
        }

        $records = [
            "recordsTotal" => $total,
            "recordsFiltered" => $total,
            "data" => $data,
        ];

        return response()->json($records);
    }


    public function exportMRList(Request $request)
    {
        $current_time = \Carbon\Carbon::now()->toDateTimeString();

        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=mr_list_$current_time.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );


        $mrdata = User::select('users.name as mrName', 'users.employee_id as mrId', 'doctors.name as doctorName')
            ->LeftJoin('doctors', 'doctors.created_by', '=', 'users.id')
            ->where('users.role', 'mr')
            ->get();



        $columns = array(
            'MR ID',
            'MR NAME',
            'DOCTOR NAME',
        );

        $callback = function () use ($mrdata, $columns) {
            $file = fopen('php://output', 'w');
            // Add UTF-8 BOM
            fprintf($file, chr(0xEF) . chr(0xBB) . chr(0xBF));

            // Write headers
            fputcsv($file, $columns);

            foreach ($mrdata as $cate) {

                fputcsv($file, [
                    $cate->mrId,
                    $cate->mrName,
                    $cate->doctorName
                ]);
            }
            fclose($file);
        };


        return response()->stream($callback, 200, $headers);
        exit();
    }
}

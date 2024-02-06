<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
            'email' => 'required|email|max:255|unique:users,email',
            'date_of_birth' => 'required|date',
            'phone' => 'required|string|max:20',
            'status' => ['required', Rule::in(['Active', 'InActive', 'Suspend', 'Block'])],
            'password' => 'required|string|min:6|confirmed',
        ];

        // Custom validation messages
        $messages = [
            'status.in' => 'The status must be one of: Active, InActive, Suspend, Block.',
            'password.confirmed' => 'The password confirmation does not match.',
        ];

        // Validate the request data
        $validatedData = $request->validate($rules, $messages);

        try {
            // Create a new User instance
            $user = new User();

            // Fill the user data
            $user->date_of_birth = $validatedData['date_of_birth'];
            $user->email = $validatedData['email'];
            $user->employee_id = $validatedData['employee_id'];
            $user->name = $validatedData['name'];
            $user->phone = $validatedData['phone'];
            $user->status = $validatedData['status'];

            // Set the password
            $user->password = bcrypt($validatedData['password']);

            // Save the user
            $user->save();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error while creating user: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while creating an account');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
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

        $query->where('name', 'like', $search . '%')
            ->where('email', 'like', $search . '%');

        $total = $query->count();

        $order = $query->offset($offset)
            ->limit($limit)
            ->orderBy($nameOrder, $orderType)
            ->get();



        $data = [];

        foreach ($order as $index => $cate) {



            $data[] = [
                "id" => $index + 1,
                'name' => $cate->name,
                "employee_id" => $cate->employee_id,
                "email" => $cate->email,
                "phone" => $cate->phone,
                "date_of_joining" => Carbon::parse($cate->created_at)->format('Y-m-d h:iA'),
                "status" => $cate->status,
                "doctor_added" => 0,
                "action" => 'View',
            ];
        }

        $records = [
            "recordsTotal" => $total,
            "recordsFiltered" => $total,
            "data" => $data,
        ];

        return response()->json($records);
    }
}

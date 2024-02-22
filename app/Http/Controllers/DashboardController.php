<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use PhpOffice\PhpSpreadsheet\IOFactory;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::guard('admin')->user()->role === 'admin') {
            $mr_count = User::where('role', 'mr')->count();
            $doctor_count = Doctor::count();
            return view('backend.dashboard.index', compact('mr_count', 'doctor_count'));
        } else {
            $doctor = Doctor::where('created_by', Auth::guard('admin')->user()->id)->get();
            return view('backend.mr-dashboard.index', compact('doctor'));
        }
    }


    public function import(Request $request)
    {
        try {
            set_time_limit(0);

            DB::beginTransaction();

            if ($request->hasFile('excelFile')) {
                $file = $request->file('excelFile');
                $extension = $file->getClientOriginalExtension();

                if ($extension === 'xlsx') {
                    $spreadsheet = IOFactory::load($file);
                    $worksheet = $spreadsheet->getActiveSheet();

                    $firstRow = true;

                    foreach ($worksheet->getRowIterator() as $row) {
                        if ($firstRow) {
                            $firstRow = false;
                            continue;
                        }

                        $data = [];

                        foreach ($row->getCellIterator() as $cell) {
                            $data[] = $cell->getValue();
                        }

                        // Check if the data array is not empty
                        if (!empty($data)) {
                            // Your data processing logic here
                            $mrupload = new User();
                            $mrupload->name = $data[0];
                            $mrupload->employee_id = $data[2];
                            $mrupload->role = 'mr';
                            $mrupload->status = 'Active';
                            $mrupload->save();
                        }
                    }
                } elseif ($extension === 'csv') {
                    // CSV import logic
                    $csvFile = fopen($file->getPathname(), 'r');
                    $firstRow = true;

                    while (($data = fgetcsv($csvFile)) !== false) {
                        if ($firstRow) {
                            $firstRow = false;
                            continue;
                        }

                        // Check if the data array is not empty
                        if (!empty($data)) {
                            // Your data processing logic here for CSV
                            $mrupload = new User();
                            $mrupload->name = $data[0];
                            $mrupload->employee_id = $data[2];
                            $mrupload->role = 'mr';
                            $mrupload->status = 'Active';
                            $mrupload->save();
                        }
                    }

                    fclose($csvFile);
                } else {
                    // Unsupported file format
                    return redirect()->route('dashboard.index')->with('error', 'Unsupported file format.');
                }

                DB::commit();
                return redirect()->route('dashboard.index')->with('success', 'File Successfully Imported');
            }
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();

            Log::error('Error during file import: ' . $e->getMessage());
            Log::error('File: ' . $e->getFile());
            Log::error('Line: ' . $e->getLine());
            Log::error('Trace: ' . $e->getTraceAsString());
            Log::error('Last Query: ' . $e->getSql());
            Log::error('Query Bindings: ' . json_encode($e->getBindings()));

            return redirect()->route('supplier.import')->with('error', 'An error occurred during file import.');
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Doctor;
use App\Models\doctorImages;
use App\Models\User;
use Carbon\Carbon;
use Dompdf\Options;
use Barryvdh\DomPDF\Facade;
use Nette\Utils\Random;
use Illuminate\Support\Facades\File;
use ZipArchive;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $doctor = Doctor::get();
        return view('backend.doctor.index', compact('doctor'));
    }

    public function create()
    {
        return view('backend.doctor.create');
    }

    public function store(Request $request)
    {

        try {
            $request->validate([
                'name' => 'required|string',
                'april_photo' => 'required|image|mimes:jpeg,jpg,png|max:4096',
                'may_photo' => 'required|image|mimes:jpeg,jpg,png|max:4096',
                'june_photo' => 'required|image|mimes:jpeg,jpg,png|max:4096',
                'july_photo' => 'required|image|mimes:jpeg,jpg,png|max:4096',
                'august_photo' => 'required|image|mimes:jpeg,jpg,png|max:4096',
                'september_photo' => 'required|image|mimes:jpeg,jpg,png|max:4096',
                'october_photo' => 'required|image|mimes:jpeg,jpg,png|max:4096',
                'november_photo' => 'required|image|mimes:jpeg,jpg,png|max:4096',
                'december_photo' => 'required|image|mimes:jpeg,jpg,png|max:4096',
                'january_photo' => 'required|image|mimes:jpeg,jpg,png|max:4096',
                'february_photo' => 'required|image|mimes:jpeg,jpg,png|max:4096',
                'march_photo' => 'required|image|mimes:jpeg,jpg,png|max:4096',
            ]);
            $doctor_count = Doctor::where('created_by', Auth::guard('admin')->user()->id)->count();
            if ($doctor_count >= 10) {
                return response()->json(['error' => false]);
                exit;
            }

            $employee_id = Auth::guard('admin')->user()->employee_id;

            // Increment the doctor_count by 1
            $doctor_count += 1;

            // Format $index with leading zeros
            $index = sprintf('%02d', $doctor_count);

            $employeeid = $employee_id . '_' . $index;

            $dateOfBirth = $request->input('date_of_birth');
            $marriageAnniversaryDate = $request->input('marriage_anniversary');


            $doctor = new Doctor();
            $doctor->name = 'Dr.' . $request->input('name');
            // Example for date_of_birth
            // Check if the date_of_birth is not empty before creating a Carbon instance
            if (!empty($dateOfBirth)) {
                $doctor->date_of_birth = $dateOfBirth;
            }

            if (!empty($marriageAnniversaryDate)) {
                $doctor->marriage_anniversary = $marriageAnniversaryDate;
            }

            $doctor->calendar_id = $employeeid;

            if ($request->file('april_photo') && $employee_id) {
                $april_photo = $request->file('april_photo');
                $monthName = 'april';  // Replace this with the actual month name
                $employeeFolder = 'employee_' . $employee_id;

                // Create the employee folder if it doesn't exist
                if (!file_exists(public_path('doctor_images/' . $employeeFolder))) {
                    mkdir(public_path('doctor_images/' . $employeeFolder), 0777, true);
                }

                $fileName = $monthName . '_' . time() . '_' . mt_rand(1000, 9999) . '.' . $april_photo->extension();

                // Move the image to the employee-specific directory
                $april_photo->move(public_path('doctor_images/' . $employeeFolder), $fileName);

                // Save the relative image path to the database
                $doctor->april_photo = 'doctor_images/' . $employeeFolder . '/' . $fileName;
            }


            if ($request->file('may_photo') && $employee_id) {
                $may_photo = $request->file('may_photo');
                $monthName = 'may';  // Replace this with the actual month name
                $employeeFolder = 'employee_' . $employee_id;

                // Create the employee folder if it doesn't exist
                if (!file_exists(public_path('doctor_images/' . $employeeFolder))) {
                    mkdir(public_path('doctor_images/' . $employeeFolder), 0777, true);
                }

                $fileName = $monthName . '_' . time() . '_' . mt_rand(1000, 9999) . '.' . $may_photo->extension();

                // Move the image to the employee-specific directory
                $may_photo->move(public_path('doctor_images/' . $employeeFolder), $fileName);

                // Save the relative image path to the database
                $doctor->may_photo = 'doctor_images/' . $employeeFolder . '/' . $fileName;
            }

            // For June Photo
            if ($request->file('june_photo') && $employee_id) {
                $june_photo = $request->file('june_photo');
                $monthName = 'june';  // Replace this with the actual month name
                $employeeFolder = 'employee_' . $employee_id;

                // Create the employee folder if it doesn't exist
                if (!file_exists(public_path('doctor_images/' . $employeeFolder))) {
                    mkdir(public_path('doctor_images/' . $employeeFolder), 0777, true);
                }

                $fileName = $monthName . '_' . time() . '_' . mt_rand(1000, 9999) . '.' . $june_photo->extension();

                // Move the image to the employee-specific directory
                $june_photo->move(public_path('doctor_images/' . $employeeFolder), $fileName);

                // Save the relative image path to the database
                $doctor->june_photo = 'doctor_images/' . $employeeFolder . '/' . $fileName;
            }

            // For July Photo
            if ($request->file('july_photo') && $employee_id) {
                $july_photo = $request->file('july_photo');
                $monthName = 'july';  // Replace this with the actual month name
                $employeeFolder = 'employee_' . $employee_id;

                // Create the employee folder if it doesn't exist
                if (!file_exists(public_path('doctor_images/' . $employeeFolder))) {
                    mkdir(public_path('doctor_images/' . $employeeFolder), 0777, true);
                }

                $fileName = $monthName . '_' . time() . '_' . mt_rand(1000, 9999) . '.' . $july_photo->extension();

                // Move the image to the employee-specific directory
                $july_photo->move(public_path('doctor_images/' . $employeeFolder), $fileName);

                // Save the relative image path to the database
                $doctor->july_photo = 'doctor_images/' . $employeeFolder . '/' . $fileName;
            }

            // For August Photo
            if ($request->file('august_photo') && $employee_id) {
                $august_photo = $request->file('august_photo');
                $monthName = 'august';  // Replace this with the actual month name
                $employeeFolder = 'employee_' . $employee_id;

                // Create the employee folder if it doesn't exist
                if (!file_exists(public_path('doctor_images/' . $employeeFolder))) {
                    mkdir(public_path('doctor_images/' . $employeeFolder), 0777, true);
                }

                $fileName = $monthName . '_' . time() . '_' . mt_rand(1000, 9999) . '.' . $august_photo->extension();

                // Move the image to the employee-specific directory
                $august_photo->move(public_path('doctor_images/' . $employeeFolder), $fileName);

                // Save the relative image path to the database
                $doctor->august_photo = 'doctor_images/' . $employeeFolder . '/' . $fileName;
            }

            // For September Photo
            if ($request->file('september_photo') && $employee_id) {
                $september_photo = $request->file('september_photo');
                $monthName = 'september';  // Replace this with the actual month name
                $employeeFolder = 'employee_' . $employee_id;

                // Create the employee folder if it doesn't exist
                if (!file_exists(public_path('doctor_images/' . $employeeFolder))) {
                    mkdir(public_path('doctor_images/' . $employeeFolder), 0777, true);
                }

                $fileName = $monthName . '_' . time() . '_' . mt_rand(1000, 9999) . '.' . $september_photo->extension();

                // Move the image to the employee-specific directory
                $september_photo->move(public_path('doctor_images/' . $employeeFolder), $fileName);

                // Save the relative image path to the database
                $doctor->september_photo = 'doctor_images/' . $employeeFolder . '/' . $fileName;
            }

            // For October Photo
            if ($request->file('october_photo') && $employee_id) {
                $october_photo = $request->file('october_photo');
                $monthName = 'october';  // Replace this with the actual month name
                $employeeFolder = 'employee_' . $employee_id;

                // Create the employee folder if it doesn't exist
                if (!file_exists(public_path('doctor_images/' . $employeeFolder))) {
                    mkdir(public_path('doctor_images/' . $employeeFolder), 0777, true);
                }

                $fileName = $monthName . '_' . time() . '_' . mt_rand(1000, 9999) . '.' . $october_photo->extension();

                // Move the image to the employee-specific directory
                $october_photo->move(public_path('doctor_images/' . $employeeFolder), $fileName);

                // Save the relative image path to the database
                $doctor->october_photo = 'doctor_images/' . $employeeFolder . '/' . $fileName;
            }

            // For November Photo
            if ($request->file('november_photo') && $employee_id) {
                $november_photo = $request->file('november_photo');
                $monthName = 'november';  // Replace this with the actual month name
                $employeeFolder = 'employee_' . $employee_id;

                // Create the employee folder if it doesn't exist
                if (!file_exists(public_path('doctor_images/' . $employeeFolder))) {
                    mkdir(public_path('doctor_images/' . $employeeFolder), 0777, true);
                }

                $fileName = $monthName . '_' . time() . '_' . mt_rand(1000, 9999) . '.' . $november_photo->extension();

                // Move the image to the employee-specific directory
                $november_photo->move(public_path('doctor_images/' . $employeeFolder), $fileName);

                // Save the relative image path to the database
                $doctor->november_photo = 'doctor_images/' . $employeeFolder . '/' . $fileName;
            }

            // For December Photo
            if ($request->file('december_photo') && $employee_id) {
                $december_photo = $request->file('december_photo');
                $monthName = 'december';  // Replace this with the actual month name
                $employeeFolder = 'employee_' . $employee_id;

                // Create the employee folder if it doesn't exist
                if (!file_exists(public_path('doctor_images/' . $employeeFolder))) {
                    mkdir(public_path('doctor_images/' . $employeeFolder), 0777, true);
                }

                $fileName = $monthName . '_' . time() . '_' . mt_rand(1000, 9999) . '.' . $december_photo->extension();

                // Move the image to the employee-specific directory
                $december_photo->move(public_path('doctor_images/' . $employeeFolder), $fileName);

                // Save the relative image path to the database
                $doctor->december_photo = 'doctor_images/' . $employeeFolder . '/' . $fileName;
            }

            // For January Photo
            if ($request->file('january_photo') && $employee_id) {
                $january_photo = $request->file('january_photo');
                $monthName = 'january';  // Replace this with the actual month name
                $employeeFolder = 'employee_' . $employee_id;

                // Create the employee folder if it doesn't exist
                if (!file_exists(public_path('doctor_images/' . $employeeFolder))) {
                    mkdir(public_path('doctor_images/' . $employeeFolder), 0777, true);
                }

                $fileName = $monthName . '_' . time() . '_' . mt_rand(1000, 9999) . '.' . $january_photo->extension();

                // Move the image to the employee-specific directory
                $january_photo->move(public_path('doctor_images/' . $employeeFolder), $fileName);

                // Save the relative image path to the database
                $doctor->january_photo = 'doctor_images/' . $employeeFolder . '/' . $fileName;
            }

            // For February Photo
            if ($request->file('february_photo') && $employee_id) {
                $february_photo = $request->file('february_photo');
                $monthName = 'february';  // Replace this with the actual month name
                $employeeFolder = 'employee_' . $employee_id;

                // Create the employee folder if it doesn't exist
                if (!file_exists(public_path('doctor_images/' . $employeeFolder))) {
                    mkdir(public_path('doctor_images/' . $employeeFolder), 0777, true);
                }

                $fileName = $monthName . '_' . time() . '_' . mt_rand(1000, 9999) . '.' . $february_photo->extension();

                // Move the image to the employee-specific directory
                $february_photo->move(public_path('doctor_images/' . $employeeFolder), $fileName);

                // Save the relative image path to the database
                $doctor->february_photo = 'doctor_images/' . $employeeFolder . '/' . $fileName;
            }

            // For March Photo
            if ($request->file('march_photo') && $employee_id) {
                $march_photo = $request->file('march_photo');
                $monthName = 'march';  // Replace this with the actual month name
                $employeeFolder = 'employee_' . $employee_id;

                // Create the employee folder if it doesn't exist
                if (!file_exists(public_path('doctor_images/' . $employeeFolder))) {
                    mkdir(public_path('doctor_images/' . $employeeFolder), 0777, true);
                }

                $fileName = $monthName . '_' . time() . '_' . mt_rand(1000, 9999) . '.' . $march_photo->extension();

                // Move the image to the employee-specific directory
                $march_photo->move(public_path('doctor_images/' . $employeeFolder), $fileName);

                // Save the relative image path to the database
                $doctor->march_photo = 'doctor_images/' . $employeeFolder . '/' . $fileName;
            }

            $doctor->created_by  = Auth::guard('admin')->user()->id;
            $doctor->save();
            return response()->json(['success' => true, 'doctor_id' => $doctor->id]);
            // return redirect()->route('doctor.index')->with('success', 'Doctor created successfully!');
        } catch (\Exception $e) {
            Log::error('Error during file import: ' . $e->getMessage());
            Log::error('File: ' . $e->getFile());
            Log::error('Line: ' . $e->getLine());
            Log::error('Trace: ' . $e->getTraceAsString());
            // Handle the case where the doctor with the given ID is not found
            return redirect()->back()->with('error', 'Doctor not found');
        }
    }



    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     $doctor = Doctor::find($id);
    //     //   $doctorImage = doctorImages::where('doctor_id', $doctor->id)->get();
    //     return view('backend.doctor.show', compact('doctor'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $doctor = Doctor::findOrFail($id);
            return view('backend.doctor.edit', compact('doctor'));
        } catch (\Exception $e) {
            // Handle the case where the doctor with the given ID is not found
            return redirect()->back()->with('error', 'Doctor not found');
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function updateDoctor(Request $request, $id)
    {
        // dd($request->id);
        $request->validate([
            'name' => 'required|string',
            'date_of_birth' => 'nullable|date',
        ]);

        $employee_id = Auth::guard('admin')->user()->employee_id;

        $doctor = Doctor::findOrFail($request->id);
        $doctor->name = $request->input('name');
        $doctor->date_of_birth = $request->input('date_of_birth');
        $doctor->marriage_anniversary = $request->input('marriage_anniversary');

        if ($request->file('april_photo') && $employee_id) {
            $april_photo = $request->file('april_photo');
            $monthName = 'april';  // Replace this with the actual month name
            $employeeFolder = 'employee_' . $employee_id;

            // Create the employee folder if it doesn't exist
            if (!file_exists(public_path('doctor_images/' . $employeeFolder))) {
                mkdir(public_path('doctor_images/' . $employeeFolder), 0777, true);
            }

            $fileName = $monthName . '_' . time() . '_' . mt_rand(1000, 9999) . '.' . $april_photo->extension();

            // Move the image to the employee-specific directory
            $april_photo->move(public_path('doctor_images/' . $employeeFolder), $fileName);

            // Save the relative image path to the database
            $doctor->april_photo = 'doctor_images/' . $employeeFolder . '/' . $fileName;
        }


        if ($request->file('may_photo') && $employee_id) {
            $may_photo = $request->file('may_photo');
            $monthName = 'may';  // Replace this with the actual month name
            $employeeFolder = 'employee_' . $employee_id;

            // Create the employee folder if it doesn't exist
            if (!file_exists(public_path('doctor_images/' . $employeeFolder))) {
                mkdir(public_path('doctor_images/' . $employeeFolder), 0777, true);
            }

            $fileName = $monthName . '_' . time() . '_' . mt_rand(1000, 9999) . '.' . $may_photo->extension();

            // Move the image to the employee-specific directory
            $may_photo->move(public_path('doctor_images/' . $employeeFolder), $fileName);

            // Save the relative image path to the database
            $doctor->may_photo = 'doctor_images/' . $employeeFolder . '/' . $fileName;
        }

        // For June Photo
        if ($request->file('june_photo') && $employee_id) {
            $june_photo = $request->file('june_photo');
            $monthName = 'june';  // Replace this with the actual month name
            $employeeFolder = 'employee_' . $employee_id;

            // Create the employee folder if it doesn't exist
            if (!file_exists(public_path('doctor_images/' . $employeeFolder))) {
                mkdir(public_path('doctor_images/' . $employeeFolder), 0777, true);
            }

            $fileName = $monthName . '_' . time() . '_' . mt_rand(1000, 9999) . '.' . $june_photo->extension();

            // Move the image to the employee-specific directory
            $june_photo->move(public_path('doctor_images/' . $employeeFolder), $fileName);

            // Save the relative image path to the database
            $doctor->june_photo = 'doctor_images/' . $employeeFolder . '/' . $fileName;
        }

        // For July Photo
        if ($request->file('july_photo') && $employee_id) {
            $july_photo = $request->file('july_photo');
            $monthName = 'july';  // Replace this with the actual month name
            $employeeFolder = 'employee_' . $employee_id;

            // Create the employee folder if it doesn't exist
            if (!file_exists(public_path('doctor_images/' . $employeeFolder))) {
                mkdir(public_path('doctor_images/' . $employeeFolder), 0777, true);
            }

            $fileName = $monthName . '_' . time() . '_' . mt_rand(1000, 9999) . '.' . $july_photo->extension();

            // Move the image to the employee-specific directory
            $july_photo->move(public_path('doctor_images/' . $employeeFolder), $fileName);

            // Save the relative image path to the database
            $doctor->july_photo = 'doctor_images/' . $employeeFolder . '/' . $fileName;
        }

        // For August Photo
        if ($request->file('august_photo') && $employee_id) {
            $august_photo = $request->file('august_photo');
            $monthName = 'august';  // Replace this with the actual month name
            $employeeFolder = 'employee_' . $employee_id;

            // Create the employee folder if it doesn't exist
            if (!file_exists(public_path('doctor_images/' . $employeeFolder))) {
                mkdir(public_path('doctor_images/' . $employeeFolder), 0777, true);
            }

            $fileName = $monthName . '_' . time() . '_' . mt_rand(1000, 9999) . '.' . $august_photo->extension();

            // Move the image to the employee-specific directory
            $august_photo->move(public_path('doctor_images/' . $employeeFolder), $fileName);

            // Save the relative image path to the database
            $doctor->august_photo = 'doctor_images/' . $employeeFolder . '/' . $fileName;
        }

        // For September Photo
        if ($request->file('september_photo') && $employee_id) {
            $september_photo = $request->file('september_photo');
            $monthName = 'september';  // Replace this with the actual month name
            $employeeFolder = 'employee_' . $employee_id;

            // Create the employee folder if it doesn't exist
            if (!file_exists(public_path('doctor_images/' . $employeeFolder))) {
                mkdir(public_path('doctor_images/' . $employeeFolder), 0777, true);
            }

            $fileName = $monthName . '_' . time() . '_' . mt_rand(1000, 9999) . '.' . $september_photo->extension();

            // Move the image to the employee-specific directory
            $september_photo->move(public_path('doctor_images/' . $employeeFolder), $fileName);

            // Save the relative image path to the database
            $doctor->september_photo = 'doctor_images/' . $employeeFolder . '/' . $fileName;
        }

        // For October Photo
        if ($request->file('october_photo') && $employee_id) {
            $october_photo = $request->file('october_photo');
            $monthName = 'october';  // Replace this with the actual month name
            $employeeFolder = 'employee_' . $employee_id;

            // Create the employee folder if it doesn't exist
            if (!file_exists(public_path('doctor_images/' . $employeeFolder))) {
                mkdir(public_path('doctor_images/' . $employeeFolder), 0777, true);
            }

            $fileName = $monthName . '_' . time() . '_' . mt_rand(1000, 9999) . '.' . $october_photo->extension();

            // Move the image to the employee-specific directory
            $october_photo->move(public_path('doctor_images/' . $employeeFolder), $fileName);

            // Save the relative image path to the database
            $doctor->october_photo = 'doctor_images/' . $employeeFolder . '/' . $fileName;
        }

        // For November Photo
        if ($request->file('november_photo') && $employee_id) {
            $november_photo = $request->file('november_photo');
            $monthName = 'november';  // Replace this with the actual month name
            $employeeFolder = 'employee_' . $employee_id;

            // Create the employee folder if it doesn't exist
            if (!file_exists(public_path('doctor_images/' . $employeeFolder))) {
                mkdir(public_path('doctor_images/' . $employeeFolder), 0777, true);
            }

            $fileName = $monthName . '_' . time() . '_' . mt_rand(1000, 9999) . '.' . $november_photo->extension();

            // Move the image to the employee-specific directory
            $november_photo->move(public_path('doctor_images/' . $employeeFolder), $fileName);

            // Save the relative image path to the database
            $doctor->november_photo = 'doctor_images/' . $employeeFolder . '/' . $fileName;
        }

        // For December Photo
        if ($request->file('december_photo') && $employee_id) {
            $december_photo = $request->file('december_photo');
            $monthName = 'december';  // Replace this with the actual month name
            $employeeFolder = 'employee_' . $employee_id;

            // Create the employee folder if it doesn't exist
            if (!file_exists(public_path('doctor_images/' . $employeeFolder))) {
                mkdir(public_path('doctor_images/' . $employeeFolder), 0777, true);
            }

            $fileName = $monthName . '_' . time() . '_' . mt_rand(1000, 9999) . '.' . $december_photo->extension();

            // Move the image to the employee-specific directory
            $december_photo->move(public_path('doctor_images/' . $employeeFolder), $fileName);

            // Save the relative image path to the database
            $doctor->december_photo = 'doctor_images/' . $employeeFolder . '/' . $fileName;
        }

        // For January Photo
        if ($request->file('january_photo') && $employee_id) {
            $january_photo = $request->file('january_photo');
            $monthName = 'january';  // Replace this with the actual month name
            $employeeFolder = 'employee_' . $employee_id;

            // Create the employee folder if it doesn't exist
            if (!file_exists(public_path('doctor_images/' . $employeeFolder))) {
                mkdir(public_path('doctor_images/' . $employeeFolder), 0777, true);
            }

            $fileName = $monthName . '_' . time() . '_' . mt_rand(1000, 9999) . '.' . $january_photo->extension();

            // Move the image to the employee-specific directory
            $january_photo->move(public_path('doctor_images/' . $employeeFolder), $fileName);

            // Save the relative image path to the database
            $doctor->january_photo = 'doctor_images/' . $employeeFolder . '/' . $fileName;
        }

        // For February Photo
        if ($request->file('february_photo') && $employee_id) {
            $february_photo = $request->file('february_photo');
            $monthName = 'february';  // Replace this with the actual month name
            $employeeFolder = 'employee_' . $employee_id;

            // Create the employee folder if it doesn't exist
            if (!file_exists(public_path('doctor_images/' . $employeeFolder))) {
                mkdir(public_path('doctor_images/' . $employeeFolder), 0777, true);
            }

            $fileName = $monthName . '_' . time() . '_' . mt_rand(1000, 9999) . '.' . $february_photo->extension();

            // Move the image to the employee-specific directory
            $february_photo->move(public_path('doctor_images/' . $employeeFolder), $fileName);

            // Save the relative image path to the database
            $doctor->february_photo = 'doctor_images/' . $employeeFolder . '/' . $fileName;
        }

        // For March Photo
        if ($request->file('march_photo') && $employee_id) {
            $march_photo = $request->file('march_photo');
            $monthName = 'march';  // Replace this with the actual month name
            $employeeFolder = 'employee_' . $employee_id;

            // Create the employee folder if it doesn't exist
            if (!file_exists(public_path('doctor_images/' . $employeeFolder))) {
                mkdir(public_path('doctor_images/' . $employeeFolder), 0777, true);
            }

            $fileName = $monthName . '_' . time() . '_' . mt_rand(1000, 9999) . '.' . $march_photo->extension();

            // Move the image to the employee-specific directory
            $march_photo->move(public_path('doctor_images/' . $employeeFolder), $fileName);

            // Save the relative image path to the database
            $doctor->march_photo = 'doctor_images/' . $employeeFolder . '/' . $fileName;
        }
        $doctor->created_by  = Auth::guard('admin')->user()->id;
        $doctor->save();
        return response()->json(['success' => true]);
    }


    public function calendarpreview(Request $request)
    {
        $imageId = $request->input('imageId');

        $doctordetails = Doctor::findOrFail($imageId);
        $month = '04';
        $may_month = '05';
        $june_month = '06';
        $july_month = '07';
        $august_month = '08';
        $september_month = '09';
        $october_month = '10';
        $november_month = '11';
        $december_month = '12';
        $year = (int) now()->year;

        //now next year
        $january_month = '01';
        $february_month = '02';
        $march_month = '03';
        $nextYear = now()->year + 1;

        $calendarData = $this->generateCalendar($year, $month, $doctordetails); // for april month
        $calendarDataMay = $this->generateCalendar($year, $may_month, $doctordetails); // for april month

        $calendarDatajune = $this->generateCalendar($year, $june_month, $doctordetails); //june_photo
        $calendarDatajuly = $this->generateCalendar($year, $july_month, $doctordetails);
        $calendarDataMayaugust = $this->generateCalendar($year, $august_month, $doctordetails);
        $calendarDataMayseptember = $this->generateCalendar($year, $september_month, $doctordetails);
        $calendarDataMayoctober = $this->generateCalendar($year, $october_month, $doctordetails);
        $calendarDataMaynovember = $this->generateCalendar($year,  $november_month, $doctordetails);
        $calendarDataMaydecember = $this->generateCalendar($year, $december_month, $doctordetails);


        // for next year calendar 
        $calendarDatajanuary = $this->generateCalendar($nextYear, $january_month, $doctordetails);
        $calendarDatafebruary = $this->generateCalendar($nextYear,  $february_month, $doctordetails);
        $calendarDatamarch = $this->generateCalendar($nextYear, $march_month, $doctordetails);



        // Format the month and year for display
        $formattedMonth = \DateTime::createFromFormat('!m', $month)->format('F'); // e.g., April
        $formattedMonthNumber = sprintf("%02d", $month); // e.g., 04

        return view('backend.doctor.print-calendar', compact('doctordetails', 'calendarData', 'year', 'month', 'formattedMonth', 'formattedMonthNumber', 'calendarDataMay', 'calendarDatajune', 'calendarDatajuly', 'calendarDataMayaugust', 'calendarDataMayseptember', 'calendarDataMayoctober', 'calendarDataMaynovember', 'calendarDataMaydecember', 'calendarDatajanuary', 'calendarDatafebruary', 'calendarDatamarch'));
    }

    private function generateCalendar($year, $month, $doctordetails)
    {
        $cal = new \DateTime("$year-$month-01");

        $lastDay = (int)$cal->format('t');

        $dateOfBirth = new \DateTime($doctordetails->date_of_birth);
        $marriageAnniversary = new \DateTime($doctordetails->marriage_anniversary);

        $calendarHTML = "<style>
            .custom-font-table {
                width:90%;
                border-collapse: collapse;
                height: 180px;
                font-family: 'DinMedium', sans-serif; /* Replace 'DinMedium' with the correct font-family name */
            }
            th, td {
                text-align: center;
            }
            .highlight-date-birth {
                color: red;
            }
            .highlight-date-anniversary {
                color: red;
            }
            .highlight-sunday {
                color: red;
                font-weight: bold;
            }
        </style>
        <div style='margin-left: 30px;'>
        <h4 id='monthAndYear' class='text-center mb-4' style='color:#000080;'>{$cal->format('F')} | {$cal->format('m')} | $year</h4>
        <table class='custom-font-table'>
            <tr>
                <th style='width: 14.2857%;' class='highlight-sunday'>Sun</th>
                <th style='width: 14.2857%;'>Mon</th>
                <th style='width: 14.2857%;'>Tue</th>
                <th style='width: 14.2857%;'>Wed</th>
                <th style='width: 14.2857%;'>Thu</th>
                <th style='width: 14.2857%;'>Fri</th>
                <th style='width: 14.2857%;'>Sat</th>
            </tr>";

        $day = 1;
        for ($i = 0; $i < 6; $i++) {
            $calendarHTML .= '<tr>';
            for ($j = 0; $j < 7; $j++) {
                if ($i === 0 && $j < $cal->format('w')) {
                    $calendarHTML .= '<td></td>';
                } elseif ($day > $lastDay) {
                    break;
                } else {
                    $currentDate = new \DateTime("$year-$month-" . sprintf("%02d", $day));
                    $currentDateFormatted = $currentDate->format('m-d');
                    $dateOfBirthFormatted = $dateOfBirth->format('m-d');
                    $marriageAnniversaryFormatted = $marriageAnniversary->format('m-d');

                    $highlightClass = '';

                    if ($currentDateFormatted == $dateOfBirthFormatted) {
                        $highlightClass .= ' highlight-date-birth';
                    }

                    if ($currentDateFormatted == $marriageAnniversaryFormatted) {
                        $highlightClass .= ' highlight-date-anniversary';
                    }

                    if ($j == 0) {
                        $highlightClass .= ' highlight-sunday';
                    }

                    $calendarHTML .= "<td class='$highlightClass'>$day</td>";
                    $day++;
                }
            }
            $calendarHTML .= '</tr>';
        }

        $calendarHTML .= '</table></div>';

        return $calendarHTML;
    }



    public function calendarDownload(Request $request)
    {
        $imageId = $request->input('imageId');

        $doctordetails = Doctor::findOrFail($imageId);
        $mr_id = User::find($doctordetails->created_by);

        $mrid = $mr_id->employee_id;
        $drName = $doctordetails->name;

        // Create an array of image paths based on the doctor's details
        $imagePaths = [
            public_path($doctordetails->april_photo),
            public_path($doctordetails->may_photo),
            public_path($doctordetails->june_photo),
            public_path($doctordetails->july_photo),
            public_path($doctordetails->august_photo),
            public_path($doctordetails->september_photo),
            public_path($doctordetails->october_photo),
            public_path($doctordetails->november_photo),
            public_path($doctordetails->december_photo),
            public_path($doctordetails->january_photo),
            public_path($doctordetails->february_photo),
            public_path($doctordetails->march_photo),
        ];

        // Create a temporary zip file
        $zipFilePath = tempnam(sys_get_temp_dir(), 'photos');
        $zip = new ZipArchive();
        $zip->open($zipFilePath, ZipArchive::CREATE);

        // Add each image file to the zip
        foreach ($imagePaths as $path) {
            $fileName = pathinfo($path, PATHINFO_BASENAME);
            $zip->addFile($path, $fileName);
        }

        // Close the zip file
        $zip->close();

        // Construct the desired file name
        $fileName = $mrid . '_' . str_replace(' ', '_', $drName) . '.zip';

        // Set headers to force download
        return Response::download($zipFilePath, $fileName)->deleteFileAfterSend(true);
    }

    public function generatePdf()
    {

        // Your HTML content
        $htmlContent = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Calendar</title>
        </head>
        <body style="background: #ededed;">
        
        <div id="calendarDiv" style="width: 8.5in; height: 5.5in; margin: 0 auto; page-break-after: always;display: flex;flex-wrap: wrap;background: url("assets/images/background.png");background-size :cover;">
        
            <div style="width: 50%;">
                <img src="left.png" alt="image" style="width: 100%;height: 100%">
            </div>
        
            <div style="width: 50%;">
                <div style="text-align: right;">
                    <img src="top_calendar.png" alt="image" style=" width: 70px; margin-right: 40px">
                </div>
                
                <div>
                    <div style="color: #000080; font-weight: 900;font-size: 25px;text-align:center;">
                        May &#124; 05 &#124; 2024
                    </div>
                </div>
        
                <div style="width: 80%;margin: auto">
                    <table style="font-weight: 900;width: 100%;margin-top: 20px;margin-bottom: 20px;text-align: center;border-spacing: 10px;font-size: 20px;">
                        <thead>
                            <tr>
                              <th style="color: red">Sun</th>
                              <th>Mon</th>
                              <th>Tue</th>
                              <th>Wed</th>
                              <th>Thu</th>
                              <th>Fri</th>
                              <th>Sat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                              <td style="color: red">1</td>
                              <td>2</td>
                              <td>3</td>
                              <td>4</td>
                              <td>5</td>
                              <td>6</td>
                              <td>7</td>
                            </tr>
                            <tr>
                              <td style="color: red">8</td>
                              <td>9</td>
                              <td>10</td>
                              <td>11</td>
                              <td>12</td>
                              <td>13</td>
                              <td>14</td>
                            </tr>
                            <tr>
                              <td style="color: red">15</td>
                              <td>16</td>
                              <td>17</td>
                              <td>18</td>
                              <td>19</td>
                              <td>20</td>
                              <td>21</td>
                            </tr>
                            <tr>
                              <td style="color: red">22</td>
                              <td>23</td>
                              <td>24</td>
                              <td>25</td>
                              <td>26</td>
                              <td>27</td>
                              <td>28</td>
                            </tr>
                            <tr>
                              <td style="color: red">29</td>
                              <td>30</td>
                              <td>31</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
        
                <div style="text-align: center">
                    <img src="bottom_calendar.png" alt="image" style="width: 65%">
                </div>      
            </div>  
        </div>
            
        </body>
        </html>
        
        ';

        // Load HTML content
        $pdf = PDF::loadHTML($htmlContent);

        // Download the PDF with a specific file name
        return $pdf->download('filename.pdf');
    }


    public function ZipDownload(Request $request)
    {
        $mrid = $request->input('imageId');
    
        // Fetch all doctors for the given $mrid
        $doctordetails = Doctor::where('created_by', $mrid)->get();
    
        // Retrieve the MR's information
        $mr = User::find($mrid);
        $mr_employee_id = $mr->employee_id;
    
        // Create a temporary directory to store all doctor folders
        $tempMainDirectory = sys_get_temp_dir() . '/' . uniqid('doctors_');
        mkdir($tempMainDirectory);
    
        foreach ($doctordetails as $doctor) {
            // Create a folder for each doctor
            $foldername = $doctor->calendar_id;
            $tempDirectory = $tempMainDirectory . '/' . $foldername;
            mkdir($tempDirectory);
    
            // Create an array of image paths based on the doctor's details
            $imagePaths = [
                'april_photo' => $doctor->april_photo,
                'may_photo' => $doctor->may_photo,
                'june_photo' => $doctor->june_photo,
                'july_photo' => $doctor->july_photo,
                'august_photo' => $doctor->august_photo,
                'september_photo' => $doctor->september_photo,
                'october_photo' => $doctor->october_photo,
                'november_photo' => $doctor->november_photo,
                'december_photo' => $doctor->december_photo,
                'january_photo' => $doctor->january_photo,
                'february_photo' => $doctor->february_photo,
                'march_photo' => $doctor->march_photo,
            ];
    
            // Move each image file to the temporary doctor folder
            foreach ($imagePaths as $imageName => $imagePath) {
                $sourcePath = public_path($imagePath);
                $destinationPath = $tempDirectory . '/' . $imageName . '.jpg'; // Adjust the extension as needed
                copy($sourcePath, $destinationPath);
            }
        }
    
        // Create a temporary zip file
        $zipFilePath = tempnam(sys_get_temp_dir(), 'doctors');
        $zip = new ZipArchive();
        $zip->open($zipFilePath, ZipArchive::CREATE);
    
        // Add each doctor folder to the zip
        $doctorFolders = glob($tempMainDirectory . '/*', GLOB_ONLYDIR);
        foreach ($doctorFolders as $doctorFolder) {
            $folderName = basename($doctorFolder);
            $zip->addEmptyDir($folderName);
            $this->addFolderToZip($doctorFolder, $zip, $folderName);
        }
    
        // Close the zip file
        $zip->close();
    
        // Remove the temporary doctor folders
        $this->deleteDirectory($tempMainDirectory);
    
        // Construct the desired file name
        $fileName = $mr_employee_id . '_' . str_replace(' ', '_', $mr->name) . '.zip';
    
        // Set headers to force download
        return response()->download($zipFilePath, $fileName)->deleteFileAfterSend(true);
    }
    
    // Helper function to add a folder and its contents to a zip file
    protected function addFolderToZip($folder, $zip, $parentFolder = '')
    {
        $files = glob($folder . '/*');
    
        foreach ($files as $file) {
            if (is_dir($file)) {
                $this->addFolderToZip($file, $zip, $parentFolder . '/' . basename($file));
            } else {
                $zip->addFile($file, $parentFolder . '/' . basename($file));
            }
        }
    }
    
    
    // Helper function to recursively delete a directory and its contents
    protected function deleteDirectory($dir)
    {
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (filetype($dir . "/" . $object) == "dir") {
                        $this->deleteDirectory($dir . "/" . $object);
                    } else {
                        unlink($dir . "/" . $object);
                    }
                }
            }
            reset($objects);
            rmdir($dir);
        }
    }
    
}

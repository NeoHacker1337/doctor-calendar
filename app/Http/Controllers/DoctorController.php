<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Doctor;
use App\Models\doctorImages;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

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
        $request->validate([
            'name' => 'required|string',
            'date_of_birth' => 'nullable|date',

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


        $doctor = new Doctor();
        $doctor->name = 'Dr.' . $request->input('name');
        $doctor->date_of_birth = Carbon::createFromFormat('Y-m-d', $request->input('date_of_birth'))->toDateString();
        $doctor->marriage_anniversary = Carbon::createFromFormat('Y-m-d', $request->input('marriage_anniversary'))->toDateString();
        $doctor->calendar_id = $employeeid;
        if ($request->file('april_photo')) {
            $april_photo = $request->file('april_photo');
            $fileName = time() . '_' . mt_rand(1000, 9999) . '.' . $april_photo->extension();

            // Move the image to the public/doctor_images directory
            $april_photo->move(public_path('doctor_images'), $fileName);

            // Save the relative image path to the database
            $doctor->april_photo = 'doctor_images/' . $fileName;
        }
        if ($request->file('may_photo')) {
            $may_photo = $request->file('may_photo');
            $fileName = time() . '_' . mt_rand(1000, 9999) . '.' . $may_photo->extension();
            // Upload image to public directory
            $may_photo->move(public_path('doctor_images'), $fileName);

            $doctor->may_photo  = 'doctor_images/' . $fileName;
        }
        if ($request->file('june_photo')) {
            $june_photo = $request->file('june_photo');
            $fileName = time() . '_' . mt_rand(1000, 9999) . '.' . $june_photo->extension();
            // Upload image to public directory
            $june_photo->move(public_path('doctor_images'), $fileName);

            $doctor->june_photo  = 'doctor_images/' . $fileName;
        }
        if ($request->file('july_photo')) {
            $july_photo = $request->file('july_photo');
            $fileName = time() . '_' . mt_rand(1000, 9999) . '.' . $july_photo->extension();
            // Upload image to public directory
            $july_photo->move(public_path('doctor_images'), $fileName);

            $doctor->july_photo = 'doctor_images/' . $fileName;
        }
        if ($request->file('august_photo')) {
            $august_photo = $request->file('august_photo');
            $fileName = time() . '_' . mt_rand(1000, 9999) . '.' . $august_photo->extension();
            // Upload image to public directory
            $august_photo->move(public_path('doctor_images'), $fileName);

            $doctor->august_photo = 'doctor_images/' . $fileName;
        }
        if ($request->file('september_photo')) {
            $september_photo = $request->file('september_photo');
            $fileName = time() . '_' . mt_rand(1000, 9999) . '.' . $september_photo->extension();
            // Upload image to public directory
            $september_photo->move(public_path('doctor_images'), $fileName);

            $doctor->september_photo = 'doctor_images/' . $fileName;
        }
        if ($request->file('october_photo')) {
            $october_photo = $request->file('october_photo');
            $fileName = time() . '_' . mt_rand(1000, 9999) . '.' . $october_photo->extension();
            // Upload image to public directory
            $october_photo->move(public_path('doctor_images'), $fileName);

            $doctor->october_photo  = 'doctor_images/' . $fileName;
        }
        if ($request->file('november_photo')) {
            $november_photo = $request->file('november_photo');
            $fileName = time() . '_' . mt_rand(1000, 9999) . '.' . $november_photo->extension();
            // Upload image to public directory
            $november_photo->move(public_path('doctor_images'), $fileName);

            $doctor->november_photo  = 'doctor_images/' . $fileName;
        }
        if ($request->file('december_photo')) {
            $december_photo = $request->file('december_photo');
            $fileName = time() . '_' . mt_rand(1000, 9999) . '.' . $december_photo->extension();
            // Upload image to public directory
            $december_photo->move(public_path('doctor_images'), $fileName);

            $doctor->december_photo = 'doctor_images/' . $fileName;
        }
        if ($request->file('january_photo')) {
            $january_photo = $request->file('january_photo');
            $fileName = time() . '_' . mt_rand(1000, 9999) . '.' . $january_photo->extension();
            // Upload image to public directory
            $january_photo->move(public_path('doctor_images'), $fileName);

            $doctor->january_photo = 'doctor_images/' . $fileName;
        }
        if ($request->file('february_photo')) {
            $february_photo = $request->file('february_photo');
            $fileName = time() . '_' . mt_rand(1000, 9999) . '.' . $february_photo->extension();
            // Upload image to public directory
            $february_photo->move(public_path('doctor_images'), $fileName);

            $doctor->february_photo  = 'doctor_images/' . $fileName;
        }
        if ($request->file('march_photo')) {
            $march_photo = $request->file('march_photo');
            $fileName = time() . '_' . mt_rand(1000, 9999) . '.' . $march_photo->extension();
            // Upload image to public directory
            $march_photo->move(public_path('doctor_images'), $fileName);

            $doctor->march_photo = 'doctor_images/' . $fileName;
        }
        $doctor->created_by  = Auth::guard('admin')->user()->id;
        $doctor->save();
        return response()->json(['success' => true, 'doctor_id' => $doctor->id]);
        // return redirect()->route('doctor.index')->with('success', 'Doctor created successfully!');
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



        $doctor = Doctor::findOrFail($request->id);
        $doctor->name = $request->input('name');
        $doctor->date_of_birth = $request->input('date_of_birth');
        $doctor->marriage_anniversary = $request->input('marriage_anniversary');

        if ($request->file('april_photo')) {
            $april_photo = $request->file('april_photo');
            $fileName = time() . '_' . mt_rand(1000, 9999) . '.' . $april_photo->extension();

            // Move the image to the public/doctor_images directory
            $april_photo->move(public_path('doctor_images'), $fileName);

            // Save the relative image path to the database
            $doctor->april_photo = 'doctor_images/' . $fileName;
        }
        if ($request->file('may_photo')) {
            $may_photo = $request->file('may_photo');
            $fileName = time() . '_' . mt_rand(1000, 9999) . '.' . $may_photo->extension();
            // Upload image to public directory
            $may_photo->move(public_path('doctor_images'), $fileName);

            $doctor->may_photo  = 'doctor_images/' . $fileName;
        }
        if ($request->file('june_photo')) {
            $june_photo = $request->file('june_photo');
            $fileName = time() . '_' . mt_rand(1000, 9999) . '.' . $june_photo->extension();
            // Upload image to public directory
            $june_photo->move(public_path('doctor_images'), $fileName);

            $doctor->june_photo  = 'doctor_images/' . $fileName;
        }
        if ($request->file('july_photo')) {
            $july_photo = $request->file('july_photo');
            $fileName = time() . '_' . mt_rand(1000, 9999) . '.' . $july_photo->extension();
            // Upload image to public directory
            $july_photo->move(public_path('doctor_images'), $fileName);

            $doctor->july_photo = 'doctor_images/' . $fileName;
        }
        if ($request->file('august_photo')) {
            $august_photo = $request->file('august_photo');
            $fileName = time() . '_' . mt_rand(1000, 9999) . '.' . $august_photo->extension();
            // Upload image to public directory
            $august_photo->move(public_path('doctor_images'), $fileName);

            $doctor->august_photo = 'doctor_images/' . $fileName;
        }
        if ($request->file('september_photo')) {
            $september_photo = $request->file('september_photo');
            $fileName = time() . '_' . mt_rand(1000, 9999) . '.' . $september_photo->extension();
            // Upload image to public directory
            $september_photo->move(public_path('doctor_images'), $fileName);

            $doctor->september_photo = 'doctor_images/' . $fileName;
        }
        if ($request->file('october_photo')) {
            $october_photo = $request->file('october_photo');
            $fileName = time() . '_' . mt_rand(1000, 9999) . '.' . $october_photo->extension();
            // Upload image to public directory
            $october_photo->move(public_path('doctor_images'), $fileName);

            $doctor->october_photo  = 'doctor_images/' . $fileName;
        }
        if ($request->file('november_photo')) {
            $november_photo = $request->file('november_photo');
            $fileName = time() . '_' . mt_rand(1000, 9999) . '.' . $november_photo->extension();
            // Upload image to public directory
            $november_photo->move(public_path('doctor_images'), $fileName);

            $doctor->november_photo  = 'doctor_images/' . $fileName;
        }
        if ($request->file('december_photo')) {
            $december_photo = $request->file('december_photo');
            $fileName = time() . '_' . mt_rand(1000, 9999) . '.' . $december_photo->extension();
            // Upload image to public directory
            $december_photo->move(public_path('doctor_images'), $fileName);

            $doctor->december_photo = 'doctor_images/' . $fileName;
        }
        if ($request->file('january_photo')) {
            $january_photo = $request->file('january_photo');
            $fileName = time() . '_' . mt_rand(1000, 9999) . '.' . $january_photo->extension();
            // Upload image to public directory
            $january_photo->move(public_path('doctor_images'), $fileName);

            $doctor->january_photo = 'doctor_images/' . $fileName;
        }
        if ($request->file('february_photo')) {
            $february_photo = $request->file('february_photo');
            $fileName = time() . '_' . mt_rand(1000, 9999) . '.' . $february_photo->extension();
            // Upload image to public directory
            $february_photo->move(public_path('doctor_images'), $fileName);

            $doctor->february_photo  = 'doctor_images/' . $fileName;
        }
        if ($request->file('march_photo')) {
            $march_photo = $request->file('march_photo');
            $fileName = time() . '_' . mt_rand(1000, 9999) . '.' . $march_photo->extension();
            // Upload image to public directory
            $march_photo->move(public_path('doctor_images'), $fileName);

            $doctor->march_photo = 'doctor_images/' . $fileName;
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

    // private function generateCalendar($year, $month, $doctordetails)
    // {
    //     $cal = new \DateTime("$year-$month-01");

    //     $lastDay = (int)$cal->format('t');

    //     $dateOfBirth = new \DateTime($doctordetails->date_of_birth);
    //     $marriageAnniversary = new \DateTime($doctordetails->marriage_anniversary);

    //     $calendarHTML = "<style>
    //     .custom-font-table {
    //         width: 100%;
    //         border-collapse: collapse;
    //         height: 200px;
    //         font-family: 'DinMedium', sans-serif; /* Replace 'DinMedium' with the correct font-family name */
    //     }
    // </style>
    // <h4 id='monthAndYear' class='text-center mb-4'>{$cal->format('F')} | {$cal->format('m')} | $year</h4>
    // <table style='width:100%; border-collapse: collapse; height:200px;'>
    //     <tr>
    //         <th style='width: 14.2857%;'>Sun</th>
    //         <th style='width: 14.2857%;'>Mon</th>
    //         <th style='width: 14.2857%;'>Tue</th>
    //         <th style='width: 14.2857%;'>Wed</th>
    //         <th style='width: 14.2857%;'>Thu</th>
    //         <th style='width: 14.2857%;'>Fri</th>
    //         <th style='width: 14.2857%;'>Sat</th>
    //     </tr>";


    //     $day = 1;
    //     for ($i = 0; $i < 6; $i++) {
    //         $calendarHTML .= '<tr>';
    //         for ($j = 0; $j < 7; $j++) {
    //             if ($i === 0 && $j < $cal->format('w')) {
    //                 $calendarHTML .= '<td></td>';
    //             } elseif ($day > $lastDay) {
    //                 break;
    //             } else {
    //                 $currentDate = new \DateTime("$year-$month-" . sprintf("%02d", $day));
    //                 $currentDateFormatted = $currentDate->format('m-d');
    //                 $dateOfBirthFormatted = $dateOfBirth->format('m-d');
    //                 $marriageAnniversaryFormatted = $marriageAnniversary->format('m-d');

    //                 $highlightClass = '';

    //                 if ($currentDateFormatted == $dateOfBirthFormatted) {

    //                     $highlightClass .= ' highlight-date-birth';
    //                 }

    //                 if ($currentDateFormatted == $marriageAnniversaryFormatted) {

    //                     $highlightClass .= ' highlight-date-anniversary';
    //                 }

    //                 $calendarHTML .= "<td class='$highlightClass'>$day</td>";
    //                 $day++;
    //             }
    //         }
    //         $calendarHTML .= '</tr>';
    //     }

    //     $calendarHTML .= '</table>';

    //     return $calendarHTML;
    // }

    private function generateCalendar($year, $month, $doctordetails)
    {
        $cal = new \DateTime("$year-$month-01");
    
        $lastDay = (int)$cal->format('t');
    
        $dateOfBirth = new \DateTime($doctordetails->date_of_birth);
        $marriageAnniversary = new \DateTime($doctordetails->marriage_anniversary);
    
        $calendarHTML = "<style>
            .custom-font-table {
                width: 100%;
                border-collapse: collapse;
                height: 200px;
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
    
        $calendarHTML .= '</table>';
    
        return $calendarHTML;
    }
    
}

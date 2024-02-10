<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Doctor;
use App\Models\doctorImages;
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
        $request->validate([
            'name' => 'required|string',
            'date_of_birth' => 'nullable|date',

        ]);
        $doctor = new Doctor();
        $doctor->name = 'Dr.' . $request->input('name');
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
        // Validate the request data
        $validatedData = $request->validate([
            'hospital_name' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'registration_number' => 'required|string|max:23|min:19',
            'email' => 'required|email|max:255',
            'contact_number' => 'required|string|max:15',
            'education' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'date_of_birth' => 'required|date',
            'marriage_anniversary' => 'nullable|date',
            'upload_photo_option' => 'nullable|in:yes,no',
            'photo' => 'nullable|array|max:12', // Assuming 'photo' is the name of your file input
            'photo.*' => 'image|mimes:jpeg,png,jpg,gif|max:4048', // Adjust the mime types and max size as needed
        ]);

        // Find the doctor by ID
        $doctor = Doctor::findOrFail($request->input('id'));

        // Update the doctor data based on the request
        $doctor->hospital_name = $request->input('hospital_name');
        $doctor->name = $request->input('name');
        $doctor->registration_number = $request->input('registration_number');
        $doctor->email = $request->input('email');
        $doctor->contact_number = $request->input('contact_number');
        $doctor->education = $request->input('education');
        $doctor->specialization = $request->input('specialization');
        $doctor->address = $request->input('address');
        $doctor->date_of_birth = $request->input('date_of_birth');
        $doctor->marriage_anniversary = $request->input('marriage_anniversary');
        $doctor->created_by = Auth::guard('admin')->user()->id; // Assuming you want to track who updated the record
        $doctor->save();

        // Handle photo upload if 'upload_photo_option' is 'yes'
        if ($request->input('upload_photo_option') === 'yes' && $request->hasFile('photo')) {
            foreach ($request->file('photo') as $photo) {
                // Generate a unique filename
                $fileName = time() . '_' . mt_rand(1000, 9999) . '.' . $photo->extension();

                // Upload image to storage (assuming you are using the 'public' disk)
                $path = $photo->storeAs('public/doctor_images', $fileName);

                // Create a new doctor image record
                $doctorImages = new DoctorImages();
                $doctorImages->doctor_id = $doctor->id;
                $doctorImages->path = $path; // Store the full path
                $doctorImages->created_by = Auth::guard('admin')->user()->id;
                $doctorImages->save();
            }
        }
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

        return view('backend.doctor.print-calendar', compact('doctordetails', 'calendarData', 'year', 'month', 'formattedMonth', 'formattedMonthNumber', 'calendarDataMay','calendarDatajune','calendarDatajuly','calendarDataMayaugust','calendarDataMayseptember','calendarDataMayoctober','calendarDataMaynovember','calendarDataMaydecember','calendarDatajanuary','calendarDatafebruary','calendarDatamarch'));
    }

    private function generateCalendar($year, $month, $doctordetails)
    {
        $cal = new \DateTime("$year-$month-01");

        $lastDay = (int)$cal->format('t');

        $dateOfBirth = $doctordetails->date_of_birth;
        $marriageAnniversary = $doctordetails->marriage_anniversary;

        $calendarHTML = "<h4 id='Year' class='text-right mb-4'>$year</h4>
                    <h4 id='monthAndYear' class='text-center mb-4'>{$cal->format('F')} | {$cal->format('m')}</h4>
                    <table style='width:100%; border-collapse: collapse; height:200px;'>
                        <tr>
                            <th>Sun</th>
                            <th>Mon</th>
                            <th>Tue</th>
                            <th>Wed</th>
                            <th>Thu</th>
                            <th>Fri</th>
                            <th>Sat</th>
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
                    $currentDate = "$year-$month-" . sprintf("%02d", $day);

                    $highlightClass = '';

                    if ($currentDate == $dateOfBirth || $currentDate == $marriageAnniversary) {
                        $highlightClass = 'highlight-date';
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

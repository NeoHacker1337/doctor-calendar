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
            'upload_photo_option' => 'required|in:yes,no',
            'photo' => 'nullable|array|max:12', // Assuming 'photo' is the name of your file input
            'photo.*' => 'image|mimes:jpeg,png,jpg,gif|max:4048', // Adjust the mime types and max size as needed
        ]);


        $doctor = new Doctor();
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
        $doctor->created_by = Auth::guard('admin')->user()->id;
        $doctor->status = 'Active';
        $doctor->save();

        if ($request->input('upload_photo_option') === 'yes') {

            foreach ($request->file('photo') as $photo) {
                // Generate a unique filename
                $fileName = time() . '_' . mt_rand(1000, 9999) . '.' . $photo->extension();
            
                // Upload image to public directory
                $path = $photo->move(public_path('doctor_images'), $fileName);
            
                // Create a new doctor image record
                $doctorImages = new DoctorImages();
                $doctorImages->doctor_id = $doctor->id;
                $doctorImages->path = 'doctor_images/' . $fileName; // Store the relative path
                $doctorImages->created_by = Auth::guard('admin')->user()->id;
                $doctorImages->save();
            }

            
            // foreach ($request->file('photo') as $photo) {
            //     // Generate a unique filename
            //     $fileName = time() . '_' . mt_rand(1000, 9999) . '.' . $photo->extension();

            //     // Upload image to storage (assuming you are using the 'public' disk)
            //     $path = $photo->storeAs('public/doctor_images', $fileName);

            //     // Create a new doctor image record
            //     $doctorImages = new DoctorImages();
            //     $doctorImages->doctor_id = $doctor->id;
            //     $doctorImages->path = $path; // Store the full path
            //     $doctorImages->created_by = Auth::guard('admin')->user()->id;
            //     $doctorImages->save();
            // }
        }
        return response()->json(['success' => true]);
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $doctor = Doctor::find($id);
        $doctorImage = doctorImages::where('doctor_id', $doctor->id)->get();
        return view('backend.doctor.show', compact('doctor', 'doctorImage'));
    }

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
        $month = $request->input('month');
        $year = $request->input('year');
        $doctorImage = doctorImages::findOrFail($imageId);

        $doctordetails = Doctor::findOrFail($doctorImage->doctor_id);

        return view('backend.doctor.print-calendar', compact('doctordetails', 'doctorImage', 'year', 'month'));
    }

    
    public function downloadpdfDoctor(Request $request)
    {
        ini_set('memory_limit', '2048M');

        $id = $request->input('imageId');
        $month = $request->input('month');
        $year = $request->input('year');

        $doctorImage = doctorImages::findOrFail($id);
        $doctordetails = Doctor::findOrFail($doctorImage->doctor_id)->first();

        // Load the HTML content of the show view
        $html = view('backend.doctor.print-calendar', compact('doctordetails', 'doctorImage', 'month', 'year'))->render();

        // Generate the PDF
        $pdf = PDF::loadHTML($html);

        // Download the PDF file
        return $pdf->download('calendar_preview.pdf');
    }
}

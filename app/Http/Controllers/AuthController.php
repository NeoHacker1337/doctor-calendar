<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendOTP;
use App\Models\PasswordResetToken;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.auth.login');
    }

    public function adminlogin()
    {
        return view('backend.auth.adminlogin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function checklogin(Request $request)
    {

        try {
            $employeeId = $request->input('employeeId');
            $user = User::where('employee_id', $employeeId)->first();

            if ($user) {
                // Log in the user
                Auth::guard('admin')->login($user);

                // Authentication successful
                $dashboardRoute = route('mr-dashboard.index');
                return response()->json(['success' => true, 'dashboardRoute' => $dashboardRoute]);
            } else {
                // Authentication failed
                return response()->json(['error' => false]);
            }
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error while creating user: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while login account');
        }
    }

    public function adminLoginCheck(Request $request)
    {

        try {

            $credentials = $request->only('email', 'password');
            if (Auth::guard('admin')->attempt($credentials)) {
                // Authentication successful
                $dashboardRoute = route('dashboard.index');
                return response()->json(['success' => true, 'dashboardRoute' => $dashboardRoute]);
            } else {
                // Authentication failed
                return response()->json(['error' => false]);
            }
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error while creating user: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while login account');
        }
    }


    public function logout()
    {
        Auth::guard('admin')->logout(); // Use the appropriate guard ('web' is the default for user authentication)

        // Optionally, you can redirect the user to a specific page after logout
        return redirect('/')->with('status', 'Logged out successfully');
    }

    public function forgotpassword()
    {
        return view('backend.auth.forgot');
    }


    public function forgotpasswordupdate(Request $request)
    {

        try {
            // Retrieve data from the request
            $loginType = $request->input('loginType');
            $email = $request->input('email');
            $employeeId = $request->input('employeeId');

            // Generate OTP
            $otp = mt_rand(100000, 999999);

            // Example: Password reset logic for admin
            if ($loginType === 'admin') {
                $admin = User::where('email', $email)->first();

                if ($admin) {
                    // Send OTP via email
                    $this->sendOtpEmail($admin->email, $otp);

                    $otpCheck = PasswordResetToken::where('email', $admin->email)->first();
                    $token = Str::random(32);
                    if ($otpCheck) {
                        $otpCheck->otp = $otp;
                        $otpCheck->token = $token;
                        $otpCheck->save();
                    } else {
                        $otpsave = new PasswordResetToken();
                        $otpsave->email = $admin->email;
                        $otpsave->otp = $otp;
                        $otpsave->token = $token;
                        $otpsave->save();
                    }

                    return redirect()->route('admin.otp', ['token' => $token]);
                } else {

                    return response()->json(['error' => false, 'message' => 'Invalid Email Id']);
                }
            }

            // Example: Password reset logic for employee
            if ($loginType === 'employee') {
                // Similar logic for employee...
                $employee = User::where('employee_id', $employeeId)->first();
                $token = Str::random(32);
                if ($employee) {
                    $this->sendOtpEmail($employee->email, $otp);
                    $otpCheck = PasswordResetToken::where('email', $employee->email)->first();
                    if ($otpCheck) {
                        $otpCheck->otp = $otp;
                        $otpCheck->token = $token;
                        $otpCheck->save();
                    } else {
                        $otpsave = new PasswordResetToken();
                        $otpsave->email = $employee->email;
                        $otpsave->otp = $otp;
                        $otpsave->token = $token;
                        $otpsave->save();
                    }

                    return redirect()->route('admin.otp', ['token' => $token]);
                } else {

                    return response()->json(['error' => false, 'message' => 'Invalid Employee Id']);
                }
            }
        } catch (\Exception $e) {
            // Handle exceptions if any
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    /**
     * Send OTP via email.
     *
     * @param  string  $email
     * @param  string  $otp
     * @return void
     */
    private function sendOtpEmail($email, $otp)
    {
        try {
            // Use your Mailable class (e.g., SendOTP)
            Mail::to($email)->send(new SendOTP($otp));

            // Optionally, you can log or handle success
        } catch (\Exception $e) {
            // Handle exceptions if any
            // Log the error or handle it based on your requirements
        }
    }

    public function putOtp($token)
    {
        return view('backend.auth.otp', compact('token'));
    }



    public function OtpSubmit(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric', // You can add additional validation rules for 'otp'
            'hash' => 'required|string', // Adjust the validation rules for 'hash' based on your needs
            'password' => 'required|string|min:6|confirmed', // Example validation for 'password'
            '_token' => 'required|string',
        ]);

        $otp = $request->input('otp');
        $token = $request->input('hash');
        $otpCheck = PasswordResetToken::where('otp', $otp)->where('token', $token)->first();

        if ($otpCheck) {
            // Valid OTP, update user's password
            $user = User::where('email', $otpCheck->email)->first();

            if ($user) {
                // Update user's password
                $user->password = Hash::make($request->input('password'));
                $user->save();

                // Optional: You may want to delete the used OTP record from the tokens table
                $otpCheck->delete();

                return response()->json(['success' => true, 'message' => 'Password updated successfully']);
            } else {
                return response()->json(['error' => true, 'message' => 'User not found']);
            }
        } else {
            return response()->json(['error' => true, 'message' => 'Invalid OTP']);
        }
    }
}

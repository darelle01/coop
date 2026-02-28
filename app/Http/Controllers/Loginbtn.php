<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use App\Mail\OTP;

class Loginbtn extends Controller
{
    public function Login(Request $request)
    {
        // Validate the incoming request credentials
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        
        if (Auth::guard('admin')->attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
            
            $user = Auth::guard('admin')->user();
            if ($user->status === 'Deactivated') {
                Auth::guard('admin')->logout(); 
                return redirect()->back()->with('error', 'Your account has been deactivated.');
            }

            // Regenerate session to prevent session fixation attacks and "Page Expired" issues
            $request->session()->regenerate();

            $OTP = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'), 0, 6);

            try {
                Mail::to($user->email)->send(new OTP($OTP, $user->full_name));
            } catch (\Exception $e) {
                return back()->with('error', 'Failed to send OTP email. Please try again.');
            }

            $encryptedOTP = Crypt::encrypt($OTP);
            session([
                'encryptedOTP' => $encryptedOTP,
                'email' => $user->email,
                'user' => $user,
            ]);

            return redirect()->route('Otp.Page');
        }
        return back()->with('error', 'Invalid email or password.');
    }
}

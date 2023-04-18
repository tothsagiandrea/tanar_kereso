<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\UserGroup;
use App\Models\Teacher;

use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Redirect;

class UserAuthController extends Controller
{

    /* *** USER REGISTRATION FUNCTIONS *** */

    public function showRegistration () : View {
        $user_groups = UserGroup::where('selectable', 1)
                ->get();
        return view('registration', ['user_groups' => $user_groups]);
    }

    public function registerUser (UserRequest $request) {
        $user = new User;

        $user->email = $request->email;
        $user->name = $request->name;
        $user->user_group = $request->role;
        $user->password = Hash::make($request->password);

        if ($user->save()) {
            event(new Registered($user));
            return redirect()->back()->with('status', 'success');
        } else {
            return redirect()->back()->with('status', 'fail');
        }
    }

    public function showVerifyEmailPage () : View {
        return view('verifyemail');
    }

    public function showVerifiedEmailPage ($verified = false) : View {
        if ($verified) {
            return view('verifiedemail');
        }

        return redirect()->back();
    }
    
    public function verifyEmail(EmailVerificationRequest $request) {
        $request->fulfill();
        $verified = true;

        $this->showVerifiedEmailPage($verified);
    }

    public function sendEmailNotification(Request $request) {    
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    }

    /* *** FORGOTTEN PASSWORD FUNCTIONS *** */

    public function showForgottenPasswordPage () : View {
        return view('forgottenpassword');
    }

    public function forgottenPassword(Request $request) {
        $request->validate(['email' => ['required', 'email']]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
    }

    public function showResetPasswordForm(string $token) {
        return view('resetpassword', ['token' => $token]);
    }

    public function resetPassword(Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);
     
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
     
                $user->save();
     
                event(new PasswordReset($user));
            }
        );
     
        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('loginPage')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    }

    /* *** USER LOGIN FUNCTIONS *** */

    public function showLogin () : View {
        return view('login');
    }
    
    public function loginUser(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        // Authenticating user
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = auth()->user();
            $email = $user->email;
            $user_group = $user->user_group;
            $teacher_user_group = UserGroup::where('name', 'tanár')->get('id');
            if ($teacher_user_group[0]->id == $user_group) {
                $teacher = Teacher::where('email', $email)->get();
                if (count($teacher) == 0) {
                    Redirect::to('/teacherdata');
                    return view('teacherdata');
                }
            }
            return redirect()->intended('/');
        }

        return redirect()->back()->with('status', __('These credentials do not match our records.'));
    }

    /* *** USER LOGOUT *** */

    public function logoutUser(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}

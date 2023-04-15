<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserGroup;
use App\Models\Teacher;

use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Redirect;
use Psy\Readline\Hoa\Console;

/**
 * Summary of RouteController
 */
class RouteController extends Controller
{
    public function showIndex () : View {
        return view('index');
    }

    public function showContacts () : View {
        return view('contacts');
    }

    public function showServices () : View {
        return view('services');
    }

    public function showForum () : View {
        return view('forum');
    }

    public function showLogin () : View {
        return view('login');
    }

    public function showForgottenPasswordPage () : View {
        return view('forgottenpassword');
    }
    
    public function showRegistration () : View {
        $user_groups = UserGroup::where('selectable', 1)
                ->get();
        return view('registration', ['user_groups' => $user_groups]);
    }

    public function showTeacherDataPage () : View {
        return view('teacherdata');
    }

    public function setTeacherData(Request $request) {
        dd($request);
    }

    public function showTeacherPage () : View {
        return view('teacher');
    }

    public function registerUser (UserRequest $request) {
        $user = new User;

        $user->email = $request->email;
        $user->name = $request->name;
        $user->user_group = $request->role;
        $user->password = Hash::make($request->password);

        if ($user->save()) {
            return redirect()->back()->with('status', 'success');
        } else {
            return redirect()->back()->with('status', 'fail');
        }
    }

    public function loginUser(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = auth()->user();
            $email = $user->email;
            $name = $user->name;
            $user_group = $user->user_group;
            $teacher_user_group = UserGroup::where('name', 'tanár')->get('id');
            if ($teacher_user_group[0]->id == $user_group) {
                $teacher = Teacher::where('email', $email)->get();
                if (count($teacher) == 0) {
                    Redirect::to('/teacherdata');
                    return view('teacherdata');
                    //return redirect('/teacherdata')->with('status', 'missing_data')->with('email', $email)->with('name', $name);
                }
            }
            return redirect()->intended('/');
        }

        return redirect()->back()->with('status', 'fail');
    }

    public function logoutUser(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}

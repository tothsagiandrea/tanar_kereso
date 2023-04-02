<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\UserGroup;

use App\Http\Requests\UserRequest;

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
    
    public function showRegistration () : View {
        $user_groups = UserGroup::where('selectable', 1)
                ->get();
        return view('registration', ['user_groups' => $user_groups]);
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

        $user->save();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Data39;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class Register39Controller extends Controller
{
    public function register39(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users39',
            'password' => 'required|min:8',
            'repassword' => 'required|same:password',
        ]);

        $userData = $request->all();
        $userData["password"] = bcrypt($request->password);
        $userData["is_active"] = 0;

        $user = new User();
        $user->fill($userData);
        $save = $user->save();

        $detailUser = new Data39();
        $detailUser->id_user = $user->id;
        $detailUser->save();

        if ($save && $detailUser) {
            return redirect('/login39')->with('success', 'Register Success');
        } else {
            return back()->with('error', 'Register failed!');
        }
    }
}

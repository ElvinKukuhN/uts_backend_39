<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Agama39;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class Halo39Controller extends Controller
{
    public function halo39()
    {
        $user = User::where('role', 'user')->get();
        $agama = Agama39::all();

        return view('welcome', ['data' => $user, 'agama' => $agama]);
    }
}

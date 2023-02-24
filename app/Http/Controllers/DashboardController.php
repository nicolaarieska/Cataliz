<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
     // Index
     public function index()
     {
        $user = User::all();
         return view('user.index', compact('user'));
     }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function Index()
    {
        $studentCount = User::where('usertype', '=', 'Student')->count();
        $employeeCount = User::where('usertype', '=', 'Employee')->count();
        return view('admin.index', compact('studentCount', 'employeeCount'));
    }

    public function Logout()
    {
        Auth::logout();
        return Redirect()->route('login');
    }
}

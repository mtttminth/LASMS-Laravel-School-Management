<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function Index()
    {
        $data['userCount'] = User::count();

        return view('admin.index', compact($data));
    }

    public function Logout()
    {
        Auth::logout();
        return Redirect()->route('login');
    }
}

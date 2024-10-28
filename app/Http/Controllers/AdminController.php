<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboardadmin()
    {
        return view('dashboardadmin'); 
    }

    public function showDashboard()
    {
        $title = 'Dashboard Admin'; 
        return view('dashboardadmin', compact('title'));
    }
    
    public function showMotor()
    {
    $title = 'Daftar Motor';
    return view('motor', compact('title'));
    }

}

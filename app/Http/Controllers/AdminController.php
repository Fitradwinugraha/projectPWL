<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboardadmin()
    {
        return view('dashboardadmin'); // Pastikan view ini ada
    }

    public function showDashboard()
    {
        $title = 'Dashboard Admin'; // Atur judul sesuai kebutuhan
        return view('dashboardadmin', compact('title'));
    }
}

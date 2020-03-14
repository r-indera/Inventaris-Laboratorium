<?php

namespace App\Http\Controllers;

use App\User;
use App\Inventory;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function struktur()
    {
        return view('dashboard.struktur');
    }

    public function galery()
    {
        //
    }
}

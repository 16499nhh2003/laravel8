<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function dashboard(){
        return view('admin.dashboard');
    }

    public function error(){
        return view('admin.errors.404');
    }
    public function file(){
        return view('admin.lfm.file');
    }
}

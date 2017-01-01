<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //index view of the admin panel "adminlte"
    public function index()
    {
      return view('admin.home.index');
    }
}

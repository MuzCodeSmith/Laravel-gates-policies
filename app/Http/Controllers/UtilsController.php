<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilsController extends Controller
{
    public function dashboardPage(){
        return view('utils.dashboard');
    }
}

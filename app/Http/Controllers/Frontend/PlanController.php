<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        return view('plans.index');  
    }
}
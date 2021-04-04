<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use Illuminate\Http\Request;

class FrontController extends Controller
{
 public function index()
 {
        return view('front.front');
    }
}

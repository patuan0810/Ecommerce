<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForgetController extends Controller
{
    public function show_forget() {
        return view('pages.forget');
    }
}
    
<?php

namespace App\Http\Controllers\Typeform;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        return view('typeform.about.index');
    }
}

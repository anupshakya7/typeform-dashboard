<?php

namespace App\Http\Controllers\Typeform;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index(){
        return view('typeform.branch.index');
    }
}

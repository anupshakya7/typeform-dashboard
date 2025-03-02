<?php

namespace App\Http\Controllers\Typeform;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function index(){
        return view('typeform.organization.index');
    }
}

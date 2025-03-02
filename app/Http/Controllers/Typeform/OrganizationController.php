<?php

namespace App\Http\Controllers\Typeform;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function index(){
        $organizations = Organization::all();

        return view('typeform.organization.index',compact('organizations'));
    }
}

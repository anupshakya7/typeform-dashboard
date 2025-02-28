<?php

namespace App\Http\Controllers\Typeform;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function getAnswer(Request $request){
        dd($request->all());
    }
}

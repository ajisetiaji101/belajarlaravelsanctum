<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index(){
        return response()->json([
            "message" => "Wellcome to Form"
        ],200);
    }
}

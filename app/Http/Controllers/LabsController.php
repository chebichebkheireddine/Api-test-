<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use Illuminate\Http\Request;
//  This is good when you finish all api 
class LabsController extends Controller
{
    //This is for test if is read the data
    function index(){
        // Add Model to fitch the data
        return Lab::all();
        // return ["Result"=>"Test if is work or not "];
    }
}

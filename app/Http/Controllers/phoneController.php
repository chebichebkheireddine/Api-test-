<?php

namespace App\Http\Controllers;

use App\Models\phone;
use Illuminate\Http\Request;

class phoneController extends Controller
{
    //This is for call any item to use it in The work 
    function listPhone($id=null){
        return $id?phone::find($id):phone::all();
    }
}

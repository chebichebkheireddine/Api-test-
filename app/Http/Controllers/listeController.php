<?php

namespace App\Http\Controllers;

use App\Models\lists;
use App\Models\Phone;
use Illuminate\Http\Request;

class listeController extends Controller
{
    //  Connect to post 
    // This class is for controller to define Phon list to test it 
    function phoneList(Request $req){

        $phone= new Phone;
        $phone->phone=$req->phone;
        $result=$phone->save();
        // To tes if is work to make it 
        if($result){

            return ["Result"=>"test is good to use it in good way "];
        }
        else{

            return ["Reusalt"=>"test failed  "];
        }
        // comment to test if is work 

    }function listTest(Request $req){

        $list= new lists;
        $list->name=$req->name;
        $list->text_id=$req->text_id;
        $result=$list->save();
        // To tes if is work to make it 
        if($result){

            return ["Result"=>"test is good to use it in good way "];
        }
        else{

            return ["Reusalt"=>"test failed  "];
        }
        // comment to test if is work 

    }   
}

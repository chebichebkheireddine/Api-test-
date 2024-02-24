<?php

namespace App\Http\Controllers;

use App\Models\lists;
use App\Models\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class listeController extends Controller
{
    //  Connect to post 
    // This class is for controller to define Phon list to test it 
    function phoneList(Request $req)
    {

        $phone = new Phone;
        $phone->phone = $req->phone;
        $result = $phone->save();
        // To tes if is work to make it 
        if ($result) {

            return ["Result" => "test is good to use it in good way "];
        } else {

            return ["Reusalt" => "test failed  "];
        }
        // comment to test if is work 

    }
    function listTest(Request $req)
    {

        $list = new lists;
        $list->name = $req->name;
        $list->text_id = $req->text_id;
        $result = $list->save();
        // To tes if is work to make it 
        if ($result) {

            return ["Result" => "Done with data "];
        } else {

            return ["Reusalt" => " failed to add   "];
        }
        // comment to test if is work 

    }
    // This is code function to put the data in db 
    function update(Request $req)
    {
        $list = lists::find($req->id);
        $list->name = $req->name;
        $list->text_id = $req->text_id;
        $test = $list->save();
        if ($test) {
            return ["Reusalt" => "Done"];
        } else {
            
            return ["Reusalt" => "failed updating"];
        }
    }
    
    // This is for search post 
    function SearchList($name)
    {
        // This return is for search in databases with  any word  
        return lists::where("name","like","%".$name."%")->get();
    }

    // Delete Function 
    function delete($id){
        // return ["Result"=>"Delete is done good ".$id];
        $list = lists::find($id);
        $result= $list->delete();
        if($result){
            return ["Result"=>"Delete is done good "];
        }
        else{

            return ["Result"=>"Delete is not be done plese Repite the prossers  "];
            
        }
    }
    // Function validation 
    function saveData(Request $req){
        // make rules for validator
        $rulse=array(
            "text_id"=>"required"
        );
        $validator=Validator::make($req->all(),$rulse);
        if ($validator->fails()) {
            // return $validator->errors();
            // add validator errors with json response
            return response()->json($validator->errors(),401);
        }
        else{
        $list = new lists;
        $list->name = $req->name;
        $list->text_id = $req->text_id;
        $result = $list->save();
        // To tes if is work to make it 
        if ($result) {

            return ["Result" => "Done the data id add into db"];
        } else {

            return ["Reusalt" => " failed  "];
        }
        

        }
        // $list= new lists;


    }
}
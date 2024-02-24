<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //This is to show all 
        return Lab::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Add validator to this 
        $rules = array(
            "name" => "required",
            "phone" => "required",
            "id_labs" => "required"
        );
        $validator = Validator::make($request->all(), $rules,["test"=>"if  is work or not"]);
        if ($validator->fails()) {
            # Make response json 
            return response()->json($validator->errors(), 402);
        } else {
            //This for post data 
            $labs = new Lab;
            $labs->name = $request->name;
            $labs->phone = $request->phone;
            $labs->id_labs = $request->id_labs;
            $result = $labs->save();
            if ($result) {
                # Good 
                return ["Result" => "Done "];
            } else {
                # code...
                return ["Result" => "Faild to add "];
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //This is to show just item 
        return Lab::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Update the data
        #step one update direct with 
        /*
        $labs=Lab::find($id);
        $labs->name=$request->name; 
        $labs->phone=$request->phone; 
        $labs->id_labs=$request->labs;
        */
        #step 2
        // Use $req
        
        $labs=Lab::find($request->id);

        $labs->id=$request->id; 
        $labs->name=$request->name; 
        $labs->phone=$request->phone; 
        $labs->id_labs=$request->labs;
        $result=$labs->save();
        if ($result) {
            # code...
            return ["test"=>"Done  this ".$request->id." Has update"];
        } else {
            # code...
            return ["test"=>"Faild to update this id ".$request->id];
        }
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Delet 
        $labs=Lab::find($id);
        $result= $labs->delete();
        if ($result) {
            # code...
            return ["Reusalt"=>" Done delete"];
        } else {
            # code...
            return ["Reusalt"=>"  delete"];
            
        }
        
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\students;
use Validator;

class StudentData extends Controller
{
    // function to display all the data
    function list($id=null)
    {
        return $id?students::find($id):students::all();
    }

    //  function to add new data
    function add(Request $req)
    {
        $students = new students;
        $students->studname=$req->studname;
        $students->studemail=$req->studemail;
        $students->course=$req->course;
        $students->fee=$req->fee;
        $result =$students->save();
        if($result)
        {
            return ["Result"=>"Data has been Saved"];
        }
        else{
            return ["Result"=>"Data not added"];
        }
    }


     //  function to update data

     function update(Request $req)
     {
        $students = students::find($req->id);
        $students->studname=$req->studname;
        $students->studemail=$req->studemail;
        $students->course=$req->course;
        $students->fee=$req->fee;
        $result =$students->save();
        if($result)
        {
            return ["Result"=>"Data has been Updated"];
        }
        else{
            return ["Result"=>"Data not updated"];
        }
     }


    //  function to data deleted
    function delete($id)
    {
        $students = students::find($id);
        $result=$students->delete();
        if($result){
            return ["Result"=>"Data has been deleted"];
        }
        else{
            return ["Result"=>"Data not deleted"];
        }
    }

    //  function to data search
    function search($studname)
    {
        // return students::where("studname",$studname)->get();
        return students::where("studname","like","%".$studname."%")->get();
    }


     //  function to data validation

    function testData(Request $req)
    {
        $rules = array(
            "studname" => "required",
            "studemail" => "required|email",
            "course" => "required",
            "fee" => "required|numeric",
        );
        $validator = Validator::make($req->all(),$rules);
        if($validator->fails())
        {
            return response()->json($validator->errors(),401);
        }
        else{
            $students = new students;
            $students->studname=$req->studname;
            $students->studemail=$req->studemail;
            $students->course=$req->course;
            $students->fee=$req->fee;
            $result =$students->save();
            if($result)
            {
                return ["Result"=>"Data has been Saved"];
            }
            else{
                return ["Result"=>"Data not added"];
            }
        }
    }
}

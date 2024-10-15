<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class studentapi extends Controller
{
    function getData()
    {
        return ["name"=>"Dhruvin",
                "email"=>"dhruvinkothari4@gmail.com",
                "City"=>"Rajkot",
                "Study"=>"Full Stack Developr"];
    }
}

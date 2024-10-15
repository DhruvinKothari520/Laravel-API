<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\students;

class MemberController extends Controller
{
    public function index()
    {
        return  students::all();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class User extends Controller
{
    function index()
    {
        return "hell0";
    }

    function myroute($req)
    {
        return view('mycontroller',['data'=>$req]);
    }
}


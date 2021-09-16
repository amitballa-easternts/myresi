<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table_register;

use Illuminate\Support\Facades\Http;
class ControllerFetch extends Controller
{
    function get_data()
    {
        return Http::get("http://127.0.0.1:8000/designation");
    }
    
}

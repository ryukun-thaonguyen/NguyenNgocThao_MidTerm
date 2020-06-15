<?php

namespace App\Http\Controllers;

use App\Tour;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    function index(){
        $tours=Tour::all();
        return view('home',['tours'=>$tours]);
    }
}

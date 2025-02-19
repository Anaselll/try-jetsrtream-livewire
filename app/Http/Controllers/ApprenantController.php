<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;

class ApprenantController extends Controller
{
    public function index(Request $request){
        
       return view('Dashboard.Apprenant.index',[
           "formations"=>Formation::with("user")->get()
       ]);
    }
}
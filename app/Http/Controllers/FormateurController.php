<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;

class FormateurController extends Controller
{
    public function index(Request $request){
         return view('Dashboard.Formateur.index',[
                "formations"=>Formation::where("user_id",$request->user()->id)->get()
            ]);
    }
}

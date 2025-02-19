<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormationController extends Controller
{
    public function join(Request $req, $formation_id){
        $user=$req->user();
        $user->inscriptions()->attach($formation_id);

        return redirect("/dashboard");
    }
}

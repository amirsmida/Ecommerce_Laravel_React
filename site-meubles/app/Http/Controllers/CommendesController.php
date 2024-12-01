<?php

namespace App\Http\Controllers;

use App\Models\Commendes;
use Illuminate\Http\Request;

class CommendesController extends Controller
{
    public function index()
    {
        $commendes = Commendes::orderBy('etat')->get();
        return view('dashbord.commende.listes', compact('commendes'));
    }

    public function show($id){
        $commende = Commendes::with('lignieComnd')->find($id);
        return view('dashbord.commende.affiche', compact('commende'));
    }

    public function updatEtat($id,$etat){
        $commende=Commendes::find($id);
        $commende->etat=$etat;
        $commende->save();
        return redirect()->route('commende.index');
    }
}

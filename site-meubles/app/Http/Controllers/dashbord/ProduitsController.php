<?php

namespace App\Http\Controllers\dashbord;

use App\Http\Controllers\Controller;
use App\Models\Articles;
use App\Models\Categorie;
use Illuminate\Http\Request;

class ProduitsController extends Controller
{
    public function index()
    {
        $articles=Articles::where('etat',0)->get();
        $type=0;
        return view('dashbord.articles.listes', compact('articles','type'));
    }
    public function indexArchiv()
    {
        $articles=Articles::where('etat',1)->get();
        $type=1;
        return view('dashbord.articles.index', compact('articles','type'));
    }
    public function create()
    {
        $articles=Articles::where('etat',0)->get();
        $categories=Categorie::where('etat',0)->get();
        return view('dashbord.articles.ajout', compact('articles','categories'));
    }
    public function store(Request $request){
       
        Articles::create([
            'nom'=> $request->input('nom'),
            'logo'=> $request->input('image'),
            'description'=> $request->input('description'),
            'prix'=> $request->input('prix'),
            'id_categorie'=> $request->input('id_categorie'),
            'etat'=> 0,
        ]);
        return redirect()->route('articles.index');
    }
    public function edit(Request $request,$id){
        $article=Articles::find($id);
        $categories=Categorie::where('etat',0)->get();
        return view('dashbord.articles.modifier', compact('article','categories'));
    }
    public function update(Request $request,$id)
    {
        $articl=Articles::find($id);
        $articl->nom=$request->input('nom');
        $articl->logo=$request->input('logo');
        
        $articl->description=$request->input('description');
        $articl->prix=$request->input('prix');
        $articl->id_categorie=$request->input('id_categorie');
        $articl->save();
        return redirect()->route('articles.index');
    }
    public function archive($id,$etat){
        $articl=Articles::find($id);
        $articl->etat=$etat;
        $articl->save();
        return redirect()->route('articles.index');
    }
}

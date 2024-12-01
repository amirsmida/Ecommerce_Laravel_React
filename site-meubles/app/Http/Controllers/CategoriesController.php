<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorie; 

use App\Models\Articles;

class CategoriesController extends Controller
{
    public function index(){
        $categories=Categorie::where('etat',0)->get();
        $type=0;
        return view('dashbord.categories.listes',compact('categories','type'));
    }

    public function indexArchiv()
    {
        $categories=Categorie::where('etat',1)->get();
        $type=1;
        return view('dashbord.categories.listes', compact('categories','type'));
    }

    public function create(){
        $categories= Categorie::where('etat',0)->get();
        return view('dashbord.categories.ajouter' , compact('categories','categories'));
    }
    public function store(Request $request){ 
        Categorie::create([
            'nom'=> $request->input('nom'),
            'image'=>  $request->input('image'),
            'id_categorie'=> $request->input('id_categorie'),
            'etat'=> 0,
        ]);
        return redirect()->route('categories.index')->with('success','categorie ajouté avec succés');
    }
    public function edit($id){
        $categorie=Categorie::findorFail($id);
        $categories=Categorie::where('etat',0)->get();
        return view('dashbord.categories.modifier',compact('categorie','categories'));
    }
    public function update(Request $request, $id){
        $catg=Categorie::findorFail($id);
        $catg=Categorie::find($id);
        $catg->nom=$request->input('nom');
        if($request->input('image')!='')
           $catg->image=  $request->input('image');
        $catg->id_categorie=$request->input('id_categorie');
        $catg->save();
        return redirect()->route('categories.index')->with('success','categorie ajouté avec succés');
    }

    public function archive($id,$etat){
        $catg=Categorie::find($id);
        $catg->etat=$etat;
        $catg->save();
        Articles::where('id_categorie', $id)->update(['etat' => $etat]);
        return redirect()->route('categories.index');
    }
}

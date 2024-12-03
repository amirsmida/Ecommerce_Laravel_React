<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Articles;
use App\Models\Clients;
use App\Models\User;
use App\Models\Commendes;
use App\Models\CommendeLignies;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Validator;
use JWTAuth;

class ApiController extends Controller
{
    public function listeCategories(){
        $categories = Categorie::select('id','nom','logo')->where('etat',0)->get()->toArray();
        return array_reverse($categories);
    }

    public function listeArticles(){
        $categories = Articles::select('id','nom','logo','description','prix','id_categorie')->where('etat',0)->get()->toArray();
        return array_reverse($categories);
    }

    public function articleByCatg($id)
    {
        $articles= Articles::where('id_categorie', $id)->with('categories')->get()->toArray();
        return response()->json($articles);
    }

    public function inscritClit(Request $request){
        $client = new Clients([
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'adresse' => $request->input('adresse'),
            'telephone' => $request->input('telephone'),
        ]);
        $client->save();
        $name=$request->input('nom').' '.$request->input('prenom');
        $user = User::create([
            'name' => $name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'id_role'=> 1,
        ]); 
        return response()->json('Client créée !');
    }

    public function passerCommende(Request $request){
        $commande = Commendes::create([
            'id_client' => $request->input('id_client'),
        ]);
    
        return response()->json($commande->id, 201);
    }
    public function lignieCommende(Request $request){
        $lignieCommande = CommendeLignies::create([
            'id_article' => $request->input('id_article'),
            'prixU' => $request->input('prixU'),
            'quantite' => $request->input('quantite'),
            'prixT' => $request->input('prixU') * $request->input('quantite'),
            'id_commende' => $request->input('id_commende'),
        ]);
        $commende=Commendes::find($request->id_commende);
        $commende->prix+=$lignieCommande->prixT;
        $commende->update();
        return response()->json('Lignie affecter !');
    }

    public function login(Request $request){
        $input = $request->only('email', 'password');
        $jwt_token = null;
        if (!$jwt_token = JWTAuth::attempt($input)) {
        return response()->json([
        'success' => false,
        'message' => 'Invalid Email or Password',
        ], Response::HTTP_UNAUTHORIZED);
        }
        return response()->json([
            'success' => true,
            'token' => $jwt_token,
            'user' => auth()->user(),
        ]);
    }
}

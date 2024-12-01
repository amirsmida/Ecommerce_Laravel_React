<?php

namespace App\Http\Controllers;

use App\Models\clients;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index()
    {
        $clients=Clients::where('etat',0)->get();
        $type=0;
        return view('dashbord.clients.listes', compact('clients','type'));
    }

    public function indexArchiv()
    {
        $clients=Clients::where('etat',1)->get();
        $type=1;
        return view('dashbord.clients.listes', compact('clients','type'));
    }

    public function archive($id,$etat){
        $client=Clients::find($id);
        $client->etat=$etat;
        $client->save();
        return redirect()->route('client.index');
    }
}
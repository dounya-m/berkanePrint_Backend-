<?php

namespace App\Http\Controllers;
use App\Models\Commande;
use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Commande::all();
        return view ('commande.index')->with('commande', $students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addcommande(Request $request)
    {

        $commande = new Commande();

        $commande->client_name = $request->input('client_name');
        $commande->date_commande = $request->input('date_commande');
        $commande->designation = $request->input('designation');
        $commande->prix_unitaire = $request->input('prix_unitaire');
        $commande->quantite = $request->input('quantite');
        //totale = prix_unitaire * quantite
        $commande->total = $request->input('prix_unitaire') * $request->input('quantite');
        // $commande->total == ('prix_unitaire' * 'quantite');

        $commande->net_payer = $request->input('net_payer');
        $commande->montant_payer = $request->input('montant_payer');
        $commande->reste = $request->input('reste');
        $commande->type_paiement = $request->input('type_paiement');
        $commande->date_livraison = $request->input('date_livraison');
        $commande->remarque = $request->input('remarque');
        $commande->save();
        return response()->json($commande);
    }

    public function allcommande()
    {
        //sellect all from commande table inner join id_clien from clients table
        $commande = Commande::orderBy('created_at', 'desc')->get();
        return response()->json($commande);
    }
    public function commandepaye()
    {
        //sellect all from commande table inner join id_clien from clients table
        $commande = Commande::where('reste' ,'==' , 0 )->orderBy('created_at', 'desc')->get();
        return response()->json($commande);
    }

    public function commandenonpaye()
    {
        //sellect all from commande table inner join id_clien from clients table
        $commande = Commande::where('reste' ,'>' , 0 )->orderBy('created_at', 'desc')->get();
        return response()->json($commande);
    }

    public function lastweek()
    {
        $commande = Commande::orderBy('created_at', 'desc')->take(7)->get();
        return response()->json($commande);
    }

    public function today()
    {
        $commande = Commande::orderBy('created_at', 'desc')->whereDate('created_at', today())->get();
        return response()->json($commande);
    }

    public function commandenumber()
    {
        //select id_commande from commande
        $commande = Commande::select('id_commande')->get();
        return response()->json($commande);
    }


    public function updatecmd(Request $request, $id_commande)
    {
        $client = Commande::find($id_commande);
        $client->update($request->all());
        return response()->json($client);
    }


    public function clientcmd(Request $request)
    {
        $client = Commande::where('client_name',$request['client_name'])
        ->orderBy('commande.created_at', 'desc')
        ->get();
        return response()->json($client);
    }
    public function depcommande(Request $request)
    {
        $command = Commande::where('id_commande',$request['id_commande'])->get() ;
        return response()->json($command);
    }


    public function deletecmd($id_commande)
    {
        Commande::destroy($id_commande);
        return response()->json(['success' => 'Client deleted successfully']);
    }
}

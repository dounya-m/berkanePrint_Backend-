<?php

namespace App\Http\Controllers;

use App\Models\Depense;
use Illuminate\Http\Request;

class DepenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $depenses = Depense::all();
        return view ('depense.index')->with('depense', $depenses);
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
    public function adddep(Request $request)
    {
        $depense = new Depense();
        $depense->id_cmd = $request->input('id_cmd');
        $depense->nom_fournisseure = $request->input('nom_fournisseure');
        $depense->date_dep = $request->input('date_dep');
        $depense->designation = $request->input('designation');
        $depense->prix = $request->input('prix');
        $depense->quantite = $request->input('quantite');
        $depense->total = $request->input('prix') * $request->input('quantite');
        $depense->net = $request->input('net');
        $depense->montant_payer = $request->input('montant_payer');
        $depense->reste = $request->input('reste');
        $depense->type_paiement = $request->input('type_paiement');
        $depense->date_livraison = $request->input('date_livraison');
        $depense->remarque = $request->input('remarque');
        $depense->save();
        return response()->json($depense);
    }


    public function alldepense()
    {
        $depenses = Depense::orderBy('created_at', 'desc')->get();
        return response()->json($depenses);
    }

    public function weekdep()
    {
        $depenses = Depense::orderBy('created_at', 'desc')->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->get();
        return response()->json($depenses);
    }
    public function todaydep()
    {
        $depenses = Depense::orderBy('created_at', 'desc')->whereDate('created_at', now())->get();
        return response()->json($depenses);
    }
    public function deppaye()
    {
        //sellect all from commande table inner join id_clien from clients table
        $depense = Depense::where('reste' ,'==' , 0 )->orderBy('created_at', 'desc')->get();
        return response()->json($depense);
    }

    public function depnonpaye()
    {
        //sellect all from commande table inner join id_clien from clients table
        $depense = Depense::where('reste' ,'>' , 0 )->orderBy('created_at', 'desc')->get();
        return response()->json($depense);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Depense  $depense
     * @return \Illuminate\Http\Response
     */
    public function show(Depense $depense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Depense  $depense
     * @return \Illuminate\Http\Response
     */
    public function edit(Depense $depense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Depense  $depense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id_dep)
    {
        $depense = Depense::find($id_dep);
        $depense->update($request->all());
        return response()->json($depense);
    }

    public function fourname(Request $request)
    {
        $depense = Depense::where('nom_fournisseure', $request['nom_fournisseure'])->orderBy('created_at', 'desc')->get();
        return response()->json($depense);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Depense  $depense
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_dep)
    {
        Depense::destroy($id_dep);
        return response()->json(['success' => 'Client depense successfully']);
    }

    public function delete(Request $request)
    {
        Depense::destroy($request['id_dep']);
        return response()->json(['success' => 'Client depense successfully']);
    }
}

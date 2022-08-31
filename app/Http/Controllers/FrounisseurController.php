<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fournisseur;

class FrounisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fournisseur = Fournisseur::all();
        return view ('fournisseur.index')->with('fournisseur', $fournisseur);
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
    public function addfournisseur(Request $request)
    {

        $request->validate([
            'fournisseur_name' => 'required|unique:fournisseur|max:255',
        ]);

        $fournisseur = new Fournisseur();
        $fournisseur->fournisseur_name = $request->input('fournisseur_name');
        $fournisseur->fournisseur_society = $request->input('fournisseur_society');
        $fournisseur->fournisseur_email = $request->input('fournisseur_email');
        $fournisseur->fournisseur_adresse = $request->input('fournisseur_adresse');
        $fournisseur->fournisseur_phone = $request->input('fournisseur_phone');
        $fournisseur->fournisseur_fix = $request->input('fournisseur_fix');
        $fournisseur->save();

        return response()->json($fournisseur);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function depFournisseur(Request $request)
    {
        $fournisseur = Fournisseur::where('fournisseur_name', $request['fournisseur_name'])->get();
        return response()->json($fournisseur);

    }

    public function allfrournisseur()
    {
        $fournisseur = Fournisseur::orderBy('created_at', 'desc')->get();
        return response()->json($fournisseur);
    }

    public function today()
    {
        $fournisseur = Fournisseur::whereDate('created_at', today())->get();
        return response()->json($fournisseur);
    }

    public function lastf()
    {
        $fournisseur = Fournisseur::orderBy('created_at', 'desc')->take(2)->get();
        return response()->json($fournisseur);
    }

    public function fname()
    {
        $fournisseur = Fournisseur::select('fournisseur_name')->get();
        return response()->json($fournisseur);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatefrournisseur(Request $request, $id)
    {
        $fournisseur = Fournisseur::find($id);
        $fournisseur->update($request->all());
        return response()->json($fournisseur);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletefournisseur($id)
    {

    Fournisseur::destroy($id);
    return response()->json(['success' => 'Fournisseur deleted successfully']);
    }
}

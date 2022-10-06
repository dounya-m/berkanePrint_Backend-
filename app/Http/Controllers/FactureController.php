<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facture;
use Carbon\Carbon;

class FactureController extends Controller
{
    public function insert(Request $request)
    {
        $facture = Facture::create([
            'tyoe'=>$request->input(key:'tyoe'),
            'mois'=>$request->input(key:'mois'),
            'prix'=>$request->input(key:'prix'),
        ]);
        $facture->save();
        return response()->json($facture);
    }

    public function last()
    {

        $facture = Facture::orderBy('created_at', 'desc')->take(1)->get();
        return response()->json($facture);
    }

    public function sum()
    {

        $facture = Facture::whereMonth('created_at', Carbon::now()->month)->sum('prix');
        return response()->json($facture);
    }
}

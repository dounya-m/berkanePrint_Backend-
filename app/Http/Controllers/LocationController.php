<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;


class LocationController extends Controller
{
    public function insert(Request $request)
    {
        $location = Location::create([
            'mois'=>$request->input(key:'mois'),
            'prix_loc'=>$request->input(key:'prix_loc'),
            'statu'=>$request->input(key:'statu'),
        ]);
        $location->save();
        return response()->json($location);
    }


    public function update(Request $request, $id_location)
    {
        $update = Location::find($id_location);
        $update->update($request->all());
        return response()->json($update);
    }
}

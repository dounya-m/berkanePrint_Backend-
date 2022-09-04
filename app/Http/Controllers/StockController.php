<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function insert(Request $request)
    {
        $stock = Stock::create([
        'type'=>$request->input(key:'type'),
        'sous_type'=>$request->input(key:'sous_type'),
        'format'=>$request->input(key:'format'),
        'gramage'=>$request->input(key:'gramage'),
        'unite'=>$request->input(key:'unite')
        ]);

        $stock->save();
        return response()->json($stock);
    }

    public function type(Request $request)
    {
        $stock = Stock::where('type', $request['type'])->get();
        return response()->json($stock);
    }
    public function papier()
    {
        $papier = Stock::where('type', 'papier')->orderBy('unite', 'asc')->get();
        return response()->json($papier);
    }
    public function souple()
    {
        $souple = Stock::where('type', 'support souples')->orderBy('unite', 'asc')->get();
        return response()->json($souple);
    }
    public function rigide()
    {
        $rigide = Stock::where('type', 'support rigide')->orderBy('unite', 'asc')->get();
        return response()->json($rigide);
    }
    public function unite()
    {
        $unite = Stock::where('unite', 0)->get();
        return response()->json($unite);
    }

    public function finStock()
    {
        $unite = Stock::where('unite', '<=', 6)->orderBy('unite', 'asc')->get();
        return response()->json($unite);
    }


    public function update(Request $request, $id_stock)
    {
        $update = Stock::find($id_stock);
        $update->update($request->all());
        return response()->json($update);
    }
}

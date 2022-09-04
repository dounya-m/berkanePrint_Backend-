<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
    //
        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request){
        $type = new Type();

        // $type->type_name = $request->input('type_name');
        $type->type_name = $request->input('type_name');
        $type->save();

        return response()->json($type);

    }

    public function all()
    {
        $types = Type::select('type_name')->get();
        return response()->json($types);
    }
}

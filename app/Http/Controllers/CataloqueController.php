<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalogue;

class CataloqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function insertcat(Request $request)
    {
        if($request->has('image'))
        {
            $image = $request->image;
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move(('C:\Users\YC£\berkan_printnew\public\catalogue'), $image_name);
        }
        else
        {
            $image_name = 'default.png';
        }
        $catalogue = new Catalogue();
            $catalogue->categorie =  $request->input('categorie');
            $catalogue->categorie_child = $request->input('categorie_child');
            $catalogue->title = $request->input('title');
            $catalogue->contente = $request->input('contente');
            $catalogue->image = $image_name;

        $catalogue->save();
        return response()->json($catalogue);
    }

    public function all()
    {
        $all = Catalogue::select('*')->orderBy('updated_at', 'desc')->get();
        return response()->json($all);
    }

    public function delet($id_catalogue)
    {

        Catalogue::destroy($id_catalogue);
        return response()->json(['success' => 'Post deleted successfully']);
    }
    public function last()
    {

        $clients = Catalogue::orderBy('created_at', 'desc')->take(8)->get();
        return response()->json($clients);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

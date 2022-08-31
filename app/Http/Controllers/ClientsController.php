<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clients;
// use Illuminate\Support\Facades\Validator;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Clients::all();
        return view ('students.index')->with('students', $students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insrtclients(Request $request)
    {
        $request->validate([
            'client_name' => 'required|unique:clients|max:255',
        ]);


        $client = new Clients();
        $client->client_name = $request->input('client_name');
        $client->client_society = $request->input('client_society');
        $client->client_email = $request->input('client_email');
        $client->client_address = $request->input('client_address');
        $client->client_phone = $request->input('client_phone');
        $client->client_fix = $request->input('client_fix');
        $client->save();
        return response()->json($client);

        // required failed

    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function oneclient($id)
    {
        $client = Clients::find($id);
        return response()->json($client);
    }
    public function allclients()
    {
        $clients = Clients::orderBy('created_at', 'desc')->get();

        return response()->json($clients);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateclient(Request $request, $id)
    {
        $client = Clients::find($id);
        $client->update($request->all());
        return response()->json($client);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteclient($id)
    {
        Clients::destroy($id);
        return response()->json(['success' => 'Client deleted successfully']);
    }

    public function selectname()
    {
        //select name from clients order by alphabetical order
        $clients = Clients::select('client_name')->orderBy('client_name', 'asc')->get();
        return response()->json($clients);
    }
    public function today()
    {
        $clients = Clients::whereDate('created_at', today())->get();
        return response()->json($clients);
    }
    public function last()
    {

        $clients = Clients::orderBy('client_name', 'asc')->take(7)->get();
        return response()->json($clients);
    }

    public function commandeclient(Request $request)
    {
        $client = Clients::where('client_name' , $request['client_name'])->get();
        return response()->json($client);
    }




}

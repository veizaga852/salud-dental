<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientsController extends Controller
{   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $clients = Client::OrderBy('id','desc')->paginate(10);
        return view('auth.clients.index')->with('clients', $clients);
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
    public function store(Request $request)
    {   
        $request->validate([
            'ci' => ['required', 'numeric', 'min:6', 'max:8'],
            'name' => ['required', 'string', 'max:100'],
            'phone' => ['required', 'numeric', 'min:5', 'max:8']
        ]);

        $client = new Client($request->all());
        Client::create([
            'ci' => $client['ci'],
            'name' => $client['name'],
            'phone' => $client['phone'],
        ]);
        return back();
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
    public function update(Request $request)
    {
        $request->validate([
            'ci' => ['required', 'numeric', 'min:6', 'max:8'],
            'name' => ['required', 'string', 'max:100'],
            'phone' => ['required', 'numeric', 'min:5', 'max:8']
        ]);
        
        $client = Client::find($request->id);
        $client->ci = $request->ci;
        $client->name = $request->name;
        $client->phone = $request->phone;
        $client->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $client = Client::find($request->id);
        $client->delete();
        return back();
    }
}

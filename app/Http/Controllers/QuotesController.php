<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quote;
use App\Models\Client;
use App\Models\Treatment;

class QuotesController extends Controller
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
        $quotes = Quote::OrderBy('date','desc')->orderBy('time', 'desc')->paginate(6);
        $clients = Client::OrderBy('name','asc')->paginate();
        $treatments = Treatment::OrderBy('name','asc')->paginate();
        return view('auth.quotes.index')
        ->with('quotes', $quotes)
        ->with('clients', $clients)
        ->with('treatments', $treatments);
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
            'date' => ['required', 'date'],
            'time' => ['required'],
            'state' => ['required']
        ]);

        $quote = new Quote($request->all());
        $user = auth()->user();
        $quote->user_id = $user->id;
        $quote->save();
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
            'date' => ['required', 'date'],
            'time' => ['required'],
            'state' => ['required']
        ]);
        
        $quote = Quote::find($request->id);
        $user = auth()->user();
        $quote->user_id = $user->id;
        $quote->client_id = $request->client_id;
        $quote->treatment_id = $request->treatment_id;
        $quote->date = $request->date;
        $quote->time = $request->time;
        $quote->state = $request->state;
        $quote->save();
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
        $quote = Quote::find($request->id);
        $quote->delete();
        return back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Treatment;

class TreatmentsController extends Controller
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
        $treatments = Treatment::OrderBy('id','desc')->paginate(10);
        return view('auth.treatments.index')->with('treatments', $treatments);
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
            'name' => ['required', 'string', 'max:50'],
            'cost' => ['required', 'numeric', 'max:8'],
            'description' => ['required', 'string', 'max:250']
        ]);
        
        $treatment = new Treatment($request->all());
        Treatment::create([
            'name' => $treatment['name'],
            'cost' => $treatment['cost'],
            'description' => $treatment['description'],
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
            'name' => ['required', 'string', 'max:50'],
            'cost' => ['required', 'numeric', 'max:8'],
            'description' => ['required', 'string', 'max:250']
        ]);
        
        $treatment = Treatment::find($request->id);
        $treatment->name = $request->name;
        $treatment->cost = $request->cost;
        $treatment->description = $request->description;
        $treatment->save();
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
        $treatment = Treatment::find($request->id);
        $treatment->delete();
        return back();
    }
}

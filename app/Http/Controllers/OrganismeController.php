<?php

namespace App\Http\Controllers;

use App\Models\Organisme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrganismeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organismes = DB::table('organismes')->paginate(3);

        return view('app.organisme.index', ['organismes' => $organismes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.organisme.create');
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
            'nom' => 'required',
            'localisation' => 'required',
        ]);        

        Organisme::create($request->all());

        return redirect()->route('organisme.index')
        ->with('success', 'organisme a été bien Enregistrer !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Organisme  $organisme
     * @return \Illuminate\Http\Response
     */
    public function show(Organisme $organisme)
    {
        return view('app.organisme.show',compact('organisme'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Organisme  $organisme
     * @return \Illuminate\Http\Response
     */
    public function edit(Organisme $organisme)
    {
        return view('app.organisme.edit',compact('organisme'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Organisme  $organisme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organisme $organisme)
    {
        $request->validate([
            'nom' => 'required',
            'localisation' => 'required',
        ]);

        $organisme->update($request->all());
  
        return redirect()->route('organisme.index')
                        ->with('success','organisme a été bien Modifier !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Organisme  $organisme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organisme $organisme)
    {
        $organisme->delete();
  
        return redirect()->route('organisme.index')
                        ->with('success','Organisme a été bien supprimer !!');
    }
}

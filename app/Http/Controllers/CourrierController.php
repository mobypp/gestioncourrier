<?php

namespace App\Http\Controllers;

use App\Models\courrier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourrierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courriers = DB::table('courriers')->paginate(3);

        return view('app.courrier.index', ['courriers' => $courriers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.courrier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		
        // $request->validate([
		// 	'matricule' => 'required',
        //     'titre' => 'required',
		// 	'destination' => 'required',
		// 	'objet' => 'required',
		// 	'contenu' => 'required',
        // ]);
        // Courrier::create($request->all());

		$path = $request->file('image')->store('public/images');
        $courrier = new courrier();
        $courrier->matricule = $request->input('matricule');
        $courrier->titre = $request->input('titre');
        $courrier->destination = $request->input('destination');
        $courrier->objet = $request->input('objet');
        $courrier->contenu = $request->input('contenu');
		$courrier->image = $path;
      
      
        $courrier->save();
        session()->flash('success', 'Utilisateur a été bien enregistré !!');
        // return redirect()->route('user.index');
        $courrier = courrier::find($courrier->id);
        return view('app.courrier.show', ['courrier' => $courrier]);

        // return redirect()->route('courrier.index')
        // ->with('success','Courrier created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Courrier  $courrier
     * @return \Illuminate\Http\Response
     */
    public function show(Courrier $courrier)
    {
        return view('app.courrier.show',compact('courrier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Courrier  $courrier
     * @return \Illuminate\Http\Response
     */
    public function edit(Courrier $courrier)
    {
        return view('app.courrier.edit',compact('courrier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Courrier  $courrier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Courrier $courrier)
    {
        $request->validate([
			'matricule' => 'required',
            'titre' => 'required',
			'destination' => 'required',
			'objet' => 'required',
			'contenu' => 'required',
        ]);

        $courrier->update($request->all());
  
        return redirect()->route('courrier.index')
                        ->with('success','Courrier updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Courrier  $courrier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Courrier $courrier)
    {
        $courrier->delete();
  
        return redirect()->route('courrier.index')
                        ->with('success','Courrier deleted successfully');
    }
}

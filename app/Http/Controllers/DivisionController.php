<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Unique;
use League\CommonMark\Extension\Table\Table;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisions = Division::paginate(6);
        return view('app.division.index', compact('divisions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.division.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
       // $this->validate($request,[
            //'nomDivision'=>'required|nomDivision|unique:divisions',
        //]);

        $division = new Division();
        $division->nomdivision = $request->input('nomdivision');
       
     
        $division->save();
        session()->flash('success', 'division a été bien enregistré !!');
        return redirect()->route('division');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function show(Division $division)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $division = Division::find($id);
        return view('app.division.edit')->with('division',$division);   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        
        $division = Division::find($id);
        $division->nomdivision = $request->input('nomdivision');

        $division->save();
        session()->flash('success', 'division a été bien Modifier !!');
        return redirect()->route('division');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function destroy(Division $division)
    {
        //
    }
}

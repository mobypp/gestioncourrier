<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Division;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Division::select('nomDivision')->get();
        $service =Service::all();
        //$service=Service::with('division')->get();
        return view('app.service.index',compact('list'))->with('services',$service);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list = Division::select('id','nomDivision')->get();
        return view('app.service.create',compact('list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'service' => 'required' ,
            'division' =>'required' ,
        ]);

        DB::table('services')->insert([
            'service'=>$request->service ,
            'division'=>$request->division ,
        ]);

        return back()->with('app.service.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $list = Division::select('id','nomDivision')->get();
        $service=  Service::find($id);
        return view('app.service.edit',compact('list'))->with('service',$service);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        DB::table('services')->where('id',$request->id)->update([
            'service'=>$request->service,
            'division'=>$request->division
        ]);
        return redirect('/service');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        DB::table('services')->where('id',$id)->delete();
        return back()->with('delete-service','service deleted successfully');
    }
}

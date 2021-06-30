<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Courrier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FileController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.file.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		

		$path = pathinfo($request->file('file')->store('public/files'));
        $file = new file();
        $file->courrier_id = $request->input('courrier_id');
		$file->nom = $path['filename'];
        $file->chemin = $path['dirname'];
        $file->extension = $path['extension'];
      
      
        $file->save();

        $courrier = courrier::find($file->courrier_id);

        //$files = DB::table('files')->paginate(100);

        return view('app.courrier.create', ['courrier' => $courrier]);
    }

    public function AnotherFile($id)
    {
        $courrier = courrier::find($id);

        return view('app.file.create', ['courrier' => $courrier]);
    }

    public function Continue($id)
    {
        $courrier = courrier::find($id);

        return view('app.courrier.show', ['courrier' => $courrier]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Courrier  $courrier
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        $courrier = courrier::find($file->courrier_id);

        $file->delete();

        $files = DB::table('files')->paginate(100);
  
        return view('app.file.index', ['courrier' => $courrier, 'files' => $files]);
    }
}

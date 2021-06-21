<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function index()
	{
		// $this->authorize('view', Role::class);
		$data = [
			'roles' => Role::paginate(5),
		];
		return view('app.role.index', $data);
	}
    public function create()
    {
        // $this->authorize('create', Role::class);
        return view('app.role.create');
    }
    public function store(Request $request)
    {
        $role = new Role();
        $role->nom = $request->input('nom');
        $role->save();
        session()->flash('success', 'le role a été bien enregistré !!');
        return redirect()->route('role');
    }
    public function update($id, Request $request)
    {
        $role = Role::find($id);
        $role->nom = $request->input('nom');
        $role->save();
        return redirect()->route('role');
    }
	//we not using it
//    public function destroy(Request $request,$id){
//        $role = Role::find($id);
//        $role->delete();
//        return redirect('role');
//
//    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
  
	public function __construct()
	{
	    $this->middleware('auth');
	}

    public function create()
    {
        $this->authorize('create', User::class);
        return view('app.user.create');
    }
    public function index()
    {
         $this->authorize('view', User::class);
        $users = User::paginate(6);
        return view('app.user.index', compact('users'));
    }

    public function edit($id)
    {
        $this->authorize('update', User::class);
        $user = user::find($id);
        return view('app.user.edit', ['user' => $user]);  
    }


	/**
	 *  Store user in the Database
	 *
	 * @param UserRequest $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function store(UserRequest $request)
	{
        $user = new User();
        $user->name = $request->input('name');
        $user->prenom = $request->input('prenom');
        $user->adresse = $request->input('adresse');
        $user->telephone = $request->input('telephone');
        $user->email = $request->input('email');
        if($request->hasfile('photo')) {
            $user->photo = $request->photo->store('image');
        }
        $user->password = Hash::make($request->input('password'));
        // bcrypt($request->input('password'));
        $user->role_id = $request->input('role_id');
        $user->service_id = $request->input('service_id');
        // $user->api_token = str_random(60);
        $user->save();
        session()->flash('success', 'Utilisateur a été bien enregistré !!');
        return redirect()->route('user.index');
	}


    public function update($id, Request $request)
    {
        $this->authorize('update', User::class);

        $user = user::find($id);
        $user->name = $request->input('name');
        $user->prenom = $request->input('prenom');
        $user->adresse = $request->input('adresse');
        $user->telephone = $request->input('telephone');
        $user->email = $request->input('email');
        if($request->hasfile('photo')) {
            $user->photo = $request->photo->store('image');
        }
        $user->password = Hash::make($request->input('password'));

        // $user->password =  bcrypt($request->input('password'));
        $user->role_id = $request->input('role_id');
        $user->service_id = $request->input('service_id');

        $user->save();
        session()->flash('success', 'Utilisateur a été bien Modifier !!');
        return redirect()->route('user.index');
    }

	//user profil
	// public function showProfile()
	// {
	// 	return view('app.profil.index');
	// }
    // public function updateProfile(Request $request, $id)
    // {
    //     $user = user::find($id);
    //     $user->name = $request->input('name');
    //     $user->email = $request->input('email');
    //     if($request->hasfile('photo')) {
    //         $user->photo = $request->photo->store('image');
    //     }
    //     $user->password = bcrypt($request->input('password'));
    //     $user->save();
    //     session()->flash('success', 'Profile a été bien Modifier !!');
    //    return redirect()->route('app.profile');
    // }


    public function destroy($id)
    {
        $this->authorize('delete', User::class);

        $user = User::find($id);
		// $mytime = Carbon::now();
		// if($user) {
		// $user->deleted_at = $mytime;
		// $user->save();
		// }
	
        
               $user->delete();
        return redirect()->route('user.index');

        // return redirect()->route('app.users.index');
    }
}

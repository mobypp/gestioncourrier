<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        
        $user = User::all();
        return view('app.profile.index', ['user' => $user]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);
        
        $user->update([
            'name' => $request->nom,
            'prenom' => $request->prenom,
            'adresse' => $request->addresse,
            'telephone' => $request->telephone,
            'email' => $request->email,
        ]);
        
        if($request->file('image') != null){
            $image = $request->file('image');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/profile'),$new_name);
            $user->update(['photo' => $image]);
        }
        // $user->name = $request->nom;
        // $user->prenom = $request->prenom;
        // $user->adresse = $request->addresse;
        // $user->telephone = $request->telephone;
        // $user->email = $request->email;
        // $user->save();
    //      $user->email = $request->input('email');
    //      if($request->hasfile('photo')) {
    //          $user->photo = $request->photo->store('image');
    //      }
    //      $user->password = bcrypt($request->input('password'));
    //      $user->save();
    //      session()->flash('success', 'Profile a été bien Modifier !!');
        // dd($user->name);

        return redirect()->route('profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}

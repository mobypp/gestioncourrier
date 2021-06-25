<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function show(){
        
        return view('app.notification.show');
    }


    // public function index(Request $request)
	// {
    //     return view ('app.notifications.index');
    // }
    // //page notification Geust manager && employee can see their notification
	// public function show(Request $request, $id, $ide)
	// {
    //     $user = \Auth::user();
    //     $notification = $user->notifications()->where('id',$id)->first();
    //     $reclamation = Reclamation::where('id', $ide)->first();
    //     return view('app.notifications.show', ['notification' => $notification , 'reclamation' => $reclamation]);//, 'users',$employes, 'iddepartement' ,$iddepartement]);
    // }
}

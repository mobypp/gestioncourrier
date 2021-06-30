<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User_Courrier;
use App\Models\Courrier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Models\Notifications;

class NotificationController extends Controller
{
    public function index(Request $request)
	{
        return view ('app.notification.index');
    }
    //page notification CD CS BO && employee can see their notification
	public function show(Request $request, $id, $ide)
	{
        $user = Auth::user();
        $notification = $user->notifications()->where('id',$id)->first();
        $courrier = Courrier::where('id', $ide)->first();
        return view('app.notification.index', ['notification' => $notification , 'courrier' => $courrier]);//, 'users',$employes, 'iddepartement' ,$iddepartement]);
    }
}

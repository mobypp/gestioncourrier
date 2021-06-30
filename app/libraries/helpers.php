<?php

use App\Models\User;
use App\Models\Courrier;
use App\Http\Controllers\UserController;

function getNotificationUrl($notification,$ide)
{
	if($notification->type == 'App\Notifications\AjouterCourrier')
	{
		return route('app.notification.show', [$notification->id ,$ide] );
	}
    if($notification->type == 'App\Notifications\AccepterCourrier')
	{
		return route('app.notifications.show', [$notification->id ,$ide] );
	}
	if($notification->type == 'App\Notifications\FinishCourrier')
	{
		return route('app.notifications.show', [$notification->id ,$ide] );
	}
}
function getNotificationMessage($notification)
{
	$v = NULL;
	
	$courrier = App\Models\Courrier::find($notification->data['courrier_id']);

	if(auth()->user()->isUF())
	{
		if(!empty($courrier)){
			$UserFinal = App\Models\User::find($courrier->user_id);
			$v = 'User Final <b>'.$UserFinal->name .'</b> a ajouter une nouvelle courrier de: <b>'.$courrier->titre.'</b>';
		}
		// return $v;
	}
	if(auth()->user()->isCS())
	{
		if(!empty($courrier)){
			$v = 'Vous avez une nouvelle Notification de : <b>'.$courrier->titre.'</b> le <b>'.$courrier->created_at.'</b>';
		}
	}
	if(auth()->user()->isCD() && !empty($notification->data['user_id']))
	{
		if(!empty($courrier)){
		$employee = \App\Models\User::find($notification->data['user_id']);
		$v = 'Employee <b>'.$employee->name .'</b> a Termine une courrier de <b>' .$courrier->titre. '</b> creer le : <b>' .$courrier->created_at.'</b>';
		}
	}
	return $v;
	
}
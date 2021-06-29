<?php

namespace App\Http\Controllers;

use App\Models\Courrier;
use App\Models\User_Courrier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Notifications\AjouterCourrier;
use App\Notifications\AccepterCourrier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Carbon\Carbon;
use App\Models\Employee;


class CourrierController extends Controller
{
    public function index()
    {
        $courriers = Courrier::paginate(6);
        return view('app.courrier.index', compact('courriers'));
    }
    public function create()
    {
        return view('app.courrier.create');
    }
    // User Final creer courrier pour la 1 er fois et notifier Chef service
    public function store(Request $request)
    {
        $courrier = new courrier();
        $courrier->matricule = $request->input('matricule');
        $courrier->titre = $request->input('titre');
        $courrier->organisme_id = $request->input('organisme_id');
        $courrier->objet = $request->input('objet');
        $courrier->contenu = $request->input('contenu');
		$path = $request->file('image')->store('public/images');
		$courrier->image = $path;
        $courrier->save();
        session()->flash('success', 'Courrier a été bien enregistré !!');
        $courrier = courrier::find($courrier->id);
        return view('app.courrier.show', ['courrier' => $courrier]);
      
      
        $courrier->save();
        session()->flash('success', 'Le courrier a été bien enregistré');

        $courrier = courrier::find($courrier->id);
        return view('app.file.create', ['courrier' => $courrier]);

        // return redirect()->route('courrier.index')
        // ->with('success','Courrier created successfully.');
    }
// enregistrer courrier et notifier Chef Service
    public function enregistrer(Request $request){
        $id = $request->input('id_co');
        $user = Auth::user()->id;
        $userf = \App\Models\User::find($user);
        if(!empty($id)){
			$userf->courriers()->attach($id, ['created_at'=>Carbon::now()]);
			$CourrierModifier = Courrier::find($id);
			}
        $ChefS = \App\Models\User::where('role_id',3)->get();
        Notification::send($ChefS, new AjouterCourrier($CourrierModifier));
        return redirect()->route('courrier.index')->with('success','Courrier Enregistrer successfully');
    }
    public function show(Courrier $courrier)
    {
        return view('app.courrier.show',compact('courrier'));
    }
    public function edit(Courrier $courrier)
    {
        return view('app.courrier.edit',compact('courrier'));
    }
    public function update(Request $request, Courrier $courrier)
    {

        $courrier = new courrier();
        $courrier->matricule = $request->input('matricule');
        $courrier->titre = $request->input('titre');
        $courrier->organisme_id = $request->input('organisme_id');
        $courrier->objet = $request->input('objet');
        $courrier->contenu = $request->input('contenu');
		$path = $request->file('image')->store('public/images');
		$courrier->image = $path;
        $courrier->save();

  
        $courrier = courrier::find($courrier->id);
        return view('app.file.create', ['courrier' => $courrier]);
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

    /********************************************** Action Chef service  */
	// public function CourrierAccepter(Request $request)
	// {
    //     $id = 3;
    //     $users = \App\Models\User::where('role_id',4)->get();
	// 	$users->courriers()->attach($id, ['created_at'=>Carbon::now()]);
	// 	$CourrierModifier = Courrier::find($id);
    //     Notification::send($users, new AccepterCourrier($CourrierModifier));     
    //     return view('app.courrier.show', ['courrier' => $CourrierModifier]);
	// }
    // Chef division Valider courrier et l envoyee pour Agent Bureau d order
    // public function CourrierValider(Request $request)
	// {
    //     $id = 3;
    //     $users = \App\Models\User::where('role_id',4)->get();
	// 	$users->courriers()->attach($id, ['created_at'=>Carbon::now()]);
	// 	$CourrierModifier = Courrier::find($id);
    //     Notification::send($users, new AccepterCourrier($CourrierModifier));     
    //     return view('app.courrier.show', ['courrier' => $CourrierModifier]);
	// }


    // Accepter courrier Chef service parte
    // public function accepter(Request $request, $id)
    // {
    //     $mytime = Carbon::now();
    //     $employee = Auth::user();
	// 	$employee->reclamations()->updateExistingPivot($id,['accepted_at'=> $mytime]);
	// 	session()->flash('success', 'la réclamation a été bien enregistré !!');
    //     return redirect()->route('app.reclamations.index');
    // }
    // Valider courrier Chef division parte

    // public function termine($id, Request $request)
    // {
    //     $mytime = Carbon::now();
    //     $employee =Auth::user();
    //     $employee->reclamations()->updateExistingPivot($id,['finished_at'=> $mytime]);
	// 	$reclamation = Reclamation::find($id);
	//     $user = User::where('role_id',2)->get();
	// 	Notification::send($user, new FinishReclamation($reclamation));
	// 	return redirect()->route('app.reclamations.index');
	// }
}

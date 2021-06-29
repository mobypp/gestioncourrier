@extends('theme.admin')
@section('main-content')



<main class="site-content">
    <div class="container">
        <div class="row">
        <div class=" col-md-12">
    <div class="container" style="padding-left:200px;">
            <h3>notification</h3>
        <table class="table table-bordered table-sm" style="background-color:white;max-width:600px;">
         {{$notification->markAsRead()}}
            <tbody>
            {{-- <tr>
                <th>receptionniste :</th>
                <td>{{App\User::where('id', $reclamation->receptionniste_id )->first()->name }}</td>
            </tr> --}}
            <tr>
                <th>type de courrier :</th>
                <td> {{$reclamation->type }} </td>
            </tr>
            <tr>
                <th>contenu :</th>
                <td>  {{$reclamation->contenu}}</td>
            </tr>
            <tr>
                 <th>date échéance :</th>
                 <td> {{ $reclamation->due_date }}
                 </td>
            </tr>
            <tr>
                 <th>Status :</th>
                 <td> {{ $reclamation->reclamation_status }} </td>
            </tr>
            <tr>
                <th>priorite :</th>
                <td>{!! $reclamation->urgency_html !!}</td>
            </tr>
             @if(Gate::allows('Access-guest'))
            {{--@can('Access-guest', Auth::user())--}}
            <tr>
                <th>Assignee  employee :</th>
                <td>
                <form action="{{ route('guest.AssignerEmployee',$notification->data['reclamation_id'] ) }}" method="post">
                <input type="hidden" name="_method" value="PUT">
                {{csrf_field()}}
                    <span style="display: none"> {{$code = App\Reclamation::where('id',$notification->data['reclamation_id'])->first()->departement_id}}</span>
                        <input type="hidden" name="departement" value="{{$code}}"/>
                        <input type="hidden" name="id" value="{{$notification->data['reclamation_id']}}"/>
                        <select  class="form-control"   size="1" id="employee_id" name="employee_id"  @if($reclamation->AssignedUser()->first() != null) disabled @endif>
                            <option disabled selected>Selectionner employee : </option>
                            @foreach(App\User::where('departement_id',$code)->where('role_id',5)->get() as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                         </select>
                    <button type="submit" class="btn btn-primary"  @if($reclamation->AssignedUser()->first() != null) disabled @endif>Enregistrer</button>
                </form>
                </td>
            </tr>
            <tr>
            <th>Valider</th>
            <td>
                <form action="{{ route('app.reclamations.ValiderReclamation', $reclamation->id) }}" method="post">
                <input type="hidden" name="_method" value="PUT">
                {{csrf_field()}}
                <button class="btn btn-success"   @if($reclamation->FinishedUser()->first() == null) disabled @endif
                     onclick="this.form.submit()" role="button">Valider
                </button> 
                </form>
            </td>
            </tr>
            @endif
            
            
            </tbody>
       
        </table>
    </div>
    </div>
    </div>
    </div>
    </main>
@endsection
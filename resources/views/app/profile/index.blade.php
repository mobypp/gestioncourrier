@extends('theme.admin')

@section('main-content')


<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" src="{{ auth()->user()->photo }}"><span class="font-weight-bold">Amelly</span><span class="text-black-50">amelly12@bbb.com</span><span> </span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Parametres</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Nom :</label><input type="text" class="form-control"  value="{{auth()->user()->name}}"></div>
                    <div class="col-md-6"><label class="labels">Prenom :</label><input type="text" class="form-control" value="{{auth()->user()->prenom}}" placeholder="surname"></div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Téléphone:</label><input type="text" class="form-control"  value="{{auth()->user()->telephone}}"></div>
                    <div class="col-md-12"><label class="labels">Addresse:</label><input type="text" class="form-control"  value="{{auth()->user()->adresse}}"></div>
                    <div class="col-md-12"><label class="labels">Adresse-Email:</label><input type="text" class="form-control"  value="{{auth()->user()->email}}"></div>

                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Enregister</button></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
  
                <div class="col-md-12"><label class="labels">Service:</label><input type="text" class="form-control"  value="{{auth()->user()->service_id}}" disabled=""></div>
                    <div class="col-md-12"><label class="labels">Role:</label><input type="text" class="form-control"  value="{{auth()->user()->role_id}}" disabled></div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

@endsection
@extends('theme.admin')

@section('main-content')



        <form  method="POST" action="/update" enctype="multipart/form-data" >
            {{ csrf_field() }}
            
               <div class="container rounded bg-white mt-5 mb-5">
                <div class="row">
            <div class="col-md-3 border-right" style="background-color:aliceblue">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5" style="background-color:aliceblue"><img class="rounded-circle mt-5" src="{{ auth()->user()->photo }}"><span class="font-weight-bold">Amelly</span><span class="text-black-50">amelly12@bbb.com</span><span> </span>
              </div>
                <input type="file" name="image" id="file" class="inputfile"  style="font-size: 0.85em;
                font-weight: 500;
                color: white;
                background-color: rgb(243, 224, 224);"/>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5" style="background-color: aliceblue">
                    <div class="d-flex justify-content-between align-items-center mb-3" style="color:black">
                        <h4 class="text-right">Profile Parametres</h4>
                    </div>
                    <div class="row mt-2" >
                        <div class="col-md-6"><label class="labels">Nom :</label><input type="text" name="nom" class="form-control"  value="{{auth()->user()->name}}"></div>
                        <div class="col-md-6"><label class="labels">Prenom :</label><input type="text" name="prenom" class="form-control" value="{{auth()->user()->prenom}}" ></div>
                    </div>
                    
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Téléphone:</label><input type="text" name="telephone" class="form-control"  value="{{auth()->user()->telephone}}"></div>
                        <div class="col-md-12"><label class="labels">Addresse:</label><input type="text" name="addresse" class="form-control"  value="{{auth()->user()->adresse}}"></div>
                        <div class="col-md-12"><label class="labels">Adresse-Email:</label><input type="email" name="email" class="form-control"  value="{{auth()->user()->email}}"></div>
                        <div class="col-md-12"><label class="labels">Mot de passe:</label><input type="password" name="password" class="form-control"  value="{{auth()->user()->password}}"></div>
                        <div class="col-md-12"><label class="labels">Confirmation de mot de passe:</label><input type="password" class="form-control @if($errors->get('password_confirmation')) is-invalid @endif"  name="password_confirmation"   value="{{auth()->user()->password}}"></div>
                    </div>
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit" style="background-color: maroon">Enregister</button></div>
                </div>
            </div>
            <div class="col-md-4" style="background-color: aliceblue">
                <div class="p-3 py-5">
      
                    <div class="col-md-12"><label class="labels">Service:</label><input type="text" class="form-control"  value="{{auth()->user()->service->nom}}" disabled=""></div>
                        <div class="col-md-12"><label class="labels">Role:</label><input type="text" class="form-control"  value="{{auth()->user()->role->nom}}" disabled></div>
                </div>
            </div>
        </div>
    </div>




        </form>
</div>
</div>

@endsection
@extends('theme.admin')

@section('main-content')
<h1 class="h3 mb-4 text-gray-800 text-center">modifier un utilisateur</h1>

<main class="site-content">
    <div class="container">
              <div class="row">
            <div class="col-md-8 offset-md-2">
        <form  method="POST" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data" >
            {{ csrf_field() }}
            {{ method_field('PUT') }}
              <div class="form-group row">
                <label for="" class="col-md-2 ">Nom</label>
                <div class="col-md-10">
                  <input id="name" type="text" class="form-control" name="name" value="{{$user->name}}" 
                  @if($errors->get('name')) is-invalid @endif autofocus required>
                  @if ($errors->has('name'))
                  <span class="help-block invalid-feedback">
                      {{ $errors->first('name') }}
                  </span>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                <label for="" class="col-md-2 ">Prenom</label>
                <div class="col-md-10">
                  <input id="prenom" type="text" class="form-control" name="prenom" value="{{$user->prenom}}" 
                  @if($errors->get('prenom')) is-invalid @endif autofocus required>
                  @if ($errors->has('prenom'))
                  <span class="help-block invalid-feedback">
                      {{ $errors->first('prenom') }}
                  </span>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                <label for="" class="col-md-2 ">Adresse</label>
                <div class="col-md-10">
                  <input id="adresse" type="text" class="form-control" name="adresse" value="{{$user->adresse}}" 
                  @if($errors->get('adresse')) is-invalid @endif autofocus required>
                  @if ($errors->has('adresse'))
                  <span class="help-block invalid-feedback">
                      {{ $errors->first('adresse') }}
                  </span>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                <label for="" class="col-md-2 ">Telephone</label>
                <div class="col-md-10">
                  <input id="telephone" type="text" class="form-control" name="telephone" value="{{$user->telephone}}" 
                  @if($errors->get('telephone')) is-invalid @endif autofocus required>
                  @if ($errors->has('telephone'))
                  <span class="help-block invalid-feedback">
                      {{ $errors->first('telephone') }}
                  </span>
                  @endif
                </div>
              </div>
    
              <div class="form-group row">
                <label for="inputPassword3" class="col-md-2 col-form-label">Email</label>
                <div class="col-md-10">
    
                  <input id="email" type="email" class="form-control" name="email" value="{{$user->email}}" required>
                    <!-- @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif -->
                </div>
              </div>
              {{$ro = ''}}
              <div class="form-group row">
                    <label for="inputPassword3" class="col-md-2 col-form-label">Role</label>
                    <div class="col-md-10">
                    <select  class="form-control"   size="1"  name="role_id"  id="role_id" onchange="chang()">
                      <option disabled>Selectionner un role : </option>
                         @foreach(App\Models\Role::all() as $role)
                         <option value="{{ $role->id }}" @if($user->role_id == $role->id) selected {{$ro = $role->nom}}  @endif>{{ $role->nom }}</option>
                         @endforeach
                    </select>
                  </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-md-2 col-form-label">Service</label>
                    <div class="col-md-10">
                    <select  class="form-control"   size="1"  name="service_id"  id="service_id" onchange="chang()">
                      <option disabled>Selectionner un Service : </option>
                         @foreach(App\Models\Service::all() as $c)
                         <option value="{{ $c->id }}" @if($user->service_id == $c->id) selected {{$ro = $c->nom}}  @endif>{{ $c->nom }}</option>
                         @endforeach
                    </select>
                  </div>
                  </div>
              <div class="form-group row">
                      <label for="inputPassword3" class="col-md-2 col-form-label">Password</label>
                      <div class="col-md-10">
                          <input id="password" type="password" class="form-control"  name="password" value="{{$user->password}}" required>
                              <!-- @if ($errors->has('password'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('password') }}</strong>
                                  </span>
                              @endif -->
                      </div>
                    </div>
    
              <div class="form-group row">
                      <label for="inputPassword3" class="col-md-2 col-form-label">Confirmer le mot de passe</label>
                      <div class="col-md-10">
                      <div class="element-input">
                         <input id="password-confirm" type="password" class="form-control"  name="password_confirmation" >
                      </div>
                      
                      </div>
                    </div>
                    <div class="form-group row">
                     <label for="inputPassword3" class="col-md-2 col-form-label">photo</label>
                     <div class="col-md-10">
                        <div class="element-input">
                      <input type="file"  id="photo" class="form-control" name="photo" value="{{$user->photo}}">
                      </div>
                      </div>
    
                    </div>
    
              <button type="submit" class="btn btn-primary " style="background-color: rgb(184, 87, 87)">Enregistrer</button>
            </form>
    
            </div>
            </div>
            </div>
            </main>




@endsection
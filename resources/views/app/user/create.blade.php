@extends('theme.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 text-center">Ajouter Utilisateur</h1>

    <main class="site-content">
        <div class="container">
                <div class="row">
                <div class="col-md-8" style="margin-left: 16%">
            <form  method="POST" action="{{ route('storeU')}}" enctype="multipart/form-data" >
                {{ csrf_field() }}
              <div class="form-group row">
                <label for="" class="col-md-2 ">Nom</label>
                <div class="col-md-10">
                  <input id="name" type="text" class="form-control  @if($errors->get('name')) is-invalid @endif" 
                  name="name" value="{{ old('name') }}"  autofocus>
                  @if ($errors->has('name'))
                      <span class="help-block invalid-feedback">
                          <strong>{{ $errors->first('name') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                <label for="" class="col-md-2 ">Prenom</label>
                <div class="col-md-10">
                  <input id="prenom" type="text" class="form-control  @if($errors->get('prenom')) is-invalid
                   @endif" name="prenom" value="{{ old('prenom') }}"  autofocus>
                  @if ($errors->has('prenom'))
                      <span class="help-block invalid-feedback">
                          <strong>{{ $errors->first('prenom') }}</strong>
                      </span>
                  @endif
                </div>
              </div>
        
              <div class="form-group row">
                <label for="inputPassword3" class="col-md-2 col-form-label">Email</label>
                <div class="col-md-10">
        
                  <input id="email" type="email" class="form-control @if($errors->get('email')) is-invalid @endif" name="email" value="{{ old('email') }}" >
                    @if ($errors->has('email'))
                        <span class="help-block invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
              </div>

              <div class="form-group row">
                <label for="" class="col-md-2 ">Adresse</label>
                <div class="col-md-10">
                  <input id="adresse" type="text" class="form-control  
                  @if($errors->get('adresse')) is-invalid @endif" name="adresse" value="{{ old('adresse') }}" 
                   autofocus>
                  @if ($errors->has('adresse'))
                      <span class="help-block invalid-feedback">
                          <strong>{{ $errors->first('adresse') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                <label for="" class="col-md-2 ">Telephone</label>
                <div class="col-md-10">
                  <input id="telephone" type="text" class="form-control  
                  @if($errors->get('telephone')) is-invalid @endif" name="telephone" value="{{ old('telephone') }}" 
                   autofocus>
                  @if ($errors->has('telephone'))
                      <span class="help-block invalid-feedback">
                          <strong>{{ $errors->first('telephone') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                    <label for="inputPassword3" class="col-md-2 col-form-label">Role</label>
                    <div class="col-md-10">
                    <select  class="form-control @if($errors->get('role_id')) is-invalid @endif"   size="1" 
                        id="role_id"  name="role_id"    onchange="chang()" >
                    <option disabled selected>Selectionner un role : </option>
                       @foreach(App\Models\Role::all() as $role)
                       <option value="{{ $role->id }}" {{ (collect(old('role_id'))->contains($role->id )) ? 'selected':'' }}>{{ $role->nom }}</option>
                       @endforeach
                       </select>
                       @if ($errors->has('role_id'))
                                       <span class="help-block invalid-feedback">
                                           <strong>{{ $errors->first('role_id') }}</strong>
                                       </span>
                                   @endif
                  </div>
                  </div>

              <div class="form-group row">
                      <label for="inputPassword3" class="col-md-2 col-form-label">Password</label>
                      <div class="col-md-10">
                          <input id="password" type="password" class="form-control @if($errors->get('password')) is-invalid @endif"
                           name="password" >
                              @if ($errors->has('password'))
                                  <span class="help-block invalid-feedback">
                                      <strong>{{ $errors->first('password') }}</strong>
                                  </span>
                              @endif
                      </div>
                    </div>
        
              <div class="form-group row">
                      <label for="inputPassword3" class="col-md-2 col-form-label">Confirmer le mot de passe</label>
                      <div class="col-md-10">
                      <div class="element-input">
                         <input id="password-confirm" type="password" class="form-control @if($errors->get('password_confirmation')) is-invalid @endif"  name="password_confirmation" >
                      </div>
                          @if ($errors->has('password_confirmation'))
                              <span class="help-block invalid-feedback">
                                  <strong>{{ $errors->first('password_confirmation') }}</strong>
                              </span>
                          @endif
                      </div>
                    </div>
                    <div class="form-group row">
                     <label for="pic" class="col-md-2 col-form-label">photo</label>
                     <div class="col-md-10">
                        <div class="element-input">
                      <input type="file"  id="photo" class="form-control" name="photo">
                      </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary col-md-12">Enregistrer</button>
            </form>
            </div>
            </div>
            </div>
    </main>

  
@endsection

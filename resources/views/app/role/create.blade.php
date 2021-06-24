@extends('theme.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 text-center">Ajouter Role</h1>

    {{-- if(auth()->check()){
        // If the user only authenticated
      } --}}
  
      {{-- $user = auth()->user(); current user data --}}

      <div class="container">
        <div class="row">

       <div class="col-md-6 offset-md-3" >

        <form  method="POST" action="{{ route('role.store') }}">
         {{ csrf_field() }}
          <div class="form-group row">
            <label for="inputEmail3" class="col-md-12 col-form-label">Type de role</label>
            <div class="col-md-12">
              <input type="text" class="form-control" id="nom" name="nom" required="">
            </div>
          </div>

          <button type="submit" class="btn btn-primary col-md-12">Enregistrer</button>
        </form>


        </div>
    </div>
    </div>
@endsection

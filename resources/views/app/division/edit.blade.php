@extends('theme.admin')

@section('main-content')
<h1 class="h3 mb-4 text-gray-800 text-center">modifier une division</h1>

<main class="site-content">
    <div class="container">
              <div class="row">
            <div class="col-md-8 offset-md-2">
        <form  method="POST" action="{{ route('update.division', $division->id) }}" enctype="multipart/form-data" >
            {{ csrf_field() }}
            {{ method_field('PUT') }}
              <div class="form-group row">
                <label for="" class="col-md-2 ">Division</label>
                <div class="col-md-10">
                  <input id="nomDivision" type="text" class="form-control" name="nomDivision" value="{{$division->nomDivision}}" 
                  @if($errors->get('nomDivision')) is-invalid @endif autofocus required>
                  @if ($errors->has('nomDivision'))
                  <span class="help-block invalid-feedback">
                      {{ $errors->first('nomDivision') }}
                  </span>
                  @endif
                </div>
              </div>

              


              <button type="submit" class="btn btn-primary col-md-12">Enregistrer</button>
            </form>
    
            </div>
            </div>
            </div>
            </main>
@endsection
@extends('theme.admin')

@section('main-content')

<h1 class="h3 mb-4 text-gray-800 text-center">Ajouter Division</h1>

    <main class="site-content">
        <div class="container">
                <div class="row">
                <div class="col-md-8" style="margin-left: 16%">
            <form  method="POST" action="{{ route('storeD')}}" enctype="multipart/form-data" >
                {{ csrf_field() }}
              <div class="form-group row">
                <label for="" class="col-md-2 ">Division</label>
                <div class="col-md-10">
                  <input id="nomDivision" type="text" class="form-control  @if($errors->get('nomDivision')) is-invalid @endif" 
                  name="nomDivision" value="{{ old('nomDivision') }}"  autofocus>
                  @if ($errors->has('nomDivision'))
                      <span class="help-block invalid-feedback">
                          <strong>{{ $errors->first('nomDivision') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              
        
              

              
                      
             
                   <button type="submit" class="btn btn-primary ">Enregistrer</button> 
            </form>
            </div>
            </div>
            </div>
    </main>


@endsection
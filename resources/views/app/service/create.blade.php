@extends('theme.admin')

@section('main-content')

<h1 class="h3 mb-4 text-gray-800 text-center">Ajouter un service</h1>

    <main class="site-content">
        <div class="container">
                <div class="row">
                <div class="col-md-8" style="margin-left: 16%">
            <form  method="POST" action="{{ route('storeS')}}" enctype="multipart/form-data" >
                {{ csrf_field() }}
              <div class="form-group row">
                <label for="" class="col-md-2 ">Service</label>
                <div class="col-md-10">
                  <input id="nom" type="text" class="form-control  @if($errors->get('service')) is-invalid @endif" 
                  name="nom" value="{{ old('service') }}"  autofocus>
                  @if ($errors->has('service'))
                      <span class="help-block invalid-feedback">
                          <strong>{{ $errors->first('service') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              

              <div class="form-group row">
                    <label for="inputPassword3" class="col-md-2 col-form-label">Division</label>
                    <div class="col-md-10">
                    <select  class="form-control @if($errors->get('division')) is-invalid @endif"   size="1" 
                        id="division_id"  name="division_id"    onchange="chang()" >
                    <option disabled selected>Selectionner une division : </option>
                       @foreach(App\Models\Division::all() as $division)
                       <option value="{{ $division->id }}" {{ (collect(old('division'))->contains($division->id )) ? 'selected':'' }}>{{ $division->nomdivision }}</option>
                       @endforeach
                       </select>
                       @if ($errors->has('division'))
                                       <span class="help-block invalid-feedback">
                                           <strong>{{ $errors->first('division') }}</strong>
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
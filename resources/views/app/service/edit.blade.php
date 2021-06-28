@extends('theme.admin')

@section('main-content')
<h2 class=" text-center" >modifier un service</h2>

     
<main class="site-content">
  <div class="container">
            <div class="row">
          <div class="col-md-8 offset-md-2">
            <form  method="POST" action="{{ route('update.service', $services->id) }}" enctype="multipart/form-data" >
              {{ csrf_field() }}
              {{ method_field('PUT') }}
                <div class="form-group row">
                  <label for="" class="col-md-2 ">Service</label>
                  <div class="col-md-10">
                    <input id="nom" type="text" class="form-control" name="nom" value="{{$services->nom}}" 
                    @if($errors->get('nom')) is-invalid @endif autofocus required>
                    @if ($errors->has('nom'))
                    <span class="help-block invalid-feedback">
                        {{ $errors->first('nom') }}
                    </span>
                    @endif
                  </div>
                </div>

           
            {{$div = ''}}
            <div class="form-group row">
                  <label for="inputPassword3" class="col-md-2 col-form-label">division</label>
                  <div class="col-md-10">
                  <select  class="form-control"   size="1"  name="division_id"  id="division_id" onchange="chang()">
                    <option disabled>Selectionner une division : </option>
                       @foreach(App\Models\Division::all() as $division)
                       <option value="{{ $division->id }}" @if($services->division_id == $division->id) selected {{$div = $division->nomdivision}}  @endif>{{ $division->nomdivision }}</option>
                       @endforeach
                  </select>
                </div>
                </div>
            
            
  
           
                
  
            <button type="submit" class="btn btn-primary " style="background-color:rgb(184, 87, 87)">Enregistrer</button>
          </form>
  
          </div>
          </div>
          </div>
          </main>
@endsection
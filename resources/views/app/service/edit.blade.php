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
                    <input id="service" type="text" class="form-control" name="service" value="{{$services->service}}" 
                    @if($errors->get('service')) is-invalid @endif autofocus required>
                    @if ($errors->has('service'))
                    <span class="help-block invalid-feedback">
                        {{ $errors->first('service') }}
                    </span>
                    @endif
                  </div>
                </div>

           
            {{$div = ''}}
            <div class="form-group row">
                  <label for="inputPassword3" class="col-md-2 col-form-label">division</label>
                  <div class="col-md-10">
                  <select  class="form-control"   size="1"  name="division"  id="division" onchange="chang()">
                    <option disabled>Selectionner une division : </option>
                       @foreach(App\Models\Division::all() as $division)
                       <option value="{{ $division->id }}" @if($services->division == $division->id) selected {{$div = $division->nomDivision}}  @endif>{{ $division->nomDivision }}</option>
                       @endforeach
                  </select>
                </div>
                </div>
            
            
  
           
                
  
            <button type="submit" class="btn btn-primary col-md-12">Enregistrer</button>
          </form>
  
          </div>
          </div>
          </div>
          </main>
@endsection
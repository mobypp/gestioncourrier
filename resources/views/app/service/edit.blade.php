@extends('theme.admin')

@section('main-content')
<h2 class=" text-center" >modifier un service</h2>
@if(Session::has('/update'))
<span>{{Session::get('/update')}}</span>
@endif
     
<form action="{{route('update.service')}}" method="POST">
   @csrf
   
 <div class="mb-3">
 <input type="hidden" name="id" value="{{$service->id}}" />
     <label for=""  class="form-label" >Nom Divison :</label>
     <input id="Ndiv" name="service" type="text" class="form-control" value="{{$service->service}}" tabindex="1">
 </div>

<div class="dropdown">
 <label> Division: </label>
  <select name="division"  class='form control'>
  @foreach($list as $lista)
  <option value="{{$lista->id}}" >{{$lista->nomDivision}}</option>
  @endforeach
  </select>
  
 
</div>
</p>
 
 <button type="submit"  class="btn btn-primary"  tabindex="4" style="background-color: brown">edit</button>
@endsection
@extends('theme.admin')

@section('main-content')
<h2 class=" text-center" >modifier une division</h2>
    <div class="container">
    @if(Session::has('/updateD'))
<span>{{Session::get('/updateD')}}</span>
@endif
<form action="{{route('update.division')}}" method="POST">
   @csrf
 <div class="mb-3">
     <label for=""  class="form-label" >Nom Divison :</label>
     <input id="Ndiv" name="nomDivision" type="text" class="form-control" value="{{$division->nomDivision}}" tabindex="1">
 </div>

 
 <button type="submit"  class="btn btn-primary"  tabindex="4" style="background-color: brown">edit</button>
@endsection
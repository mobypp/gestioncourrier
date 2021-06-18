@extends('theme.admin')

@section('main-content')

<h2 class="  text-center" >Ajouter un service</h2>

<form action="/service" method="POST">
    @csrf 
 <div class="mb-3">
     <label for=""  class="form-label">Nom Service :</label>
     <input id="Ndiv" name="service" type="text" class="form-control" tabindex="1">
 </div>

 <div class="dropdown">
 <label> Division: </label>
  <select name="division"  class='form control'>
  @foreach($list as $lista)
  <option value="{{$lista->id}}"  >{{$lista->nomDivision}}</option>
  @endforeach
  </select>
  
 


</p>

 <a href="/service" class="btn btn-secondary" tabindex="5" style="background-color: burlywood">close</a>
 <button type="submit"  class="btn btn-primary"  tabindex="4" style="background-color: brown">save</button>
 


</form>  

@endsection
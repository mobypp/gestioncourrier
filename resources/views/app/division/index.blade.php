@extends('theme.admin')

@section('main-content')

<h1 class=" text-center" >Divisions</h1>
<div class="container">
    <a href="/createDivision" class="btn btn-primary" style="background-color: brown">Ajouter</a>

<table class="table  table-white  table-striped mt2-">

<thead>
   <tr>
   
   <th scope="col">Division</th>
   <th scope="col">Actions</th>

   </tr>
</thead>
<tbody>
@foreach ($divisions as $division)
 <tr>
  
  <td>{{$division->nomDivision}}</td> 
  
  <td> 
   
  <a  href={{"editD/".$division['id']}} class="btn btn-info" style="background-color: darksalmon">modifier</a>
   
      
  </td>
</tr>
       
@endforeach   
<tbody>
</table>
@endsection
@extends('theme.admin')

@section('main-content')
 <h1 class="text-center" >Services</h1>
    <div class="container">

<a href="/createService" class="btn btn-primary"  style="background-color: brown">Ajouter</a>


<table class="table  table-white  table-striped mt2-">

   <thead>
    <tr>
       
        <th scope="col">Service</th>
        <th scope="col">Division</th>
        <th scope="col">Actions</th>
 
        </tr>
   </thead>
   <tbody>
    @foreach ($services as $service)
     <tr>
     
      
      <td>{{$service->service}}</td> 
    
      <td > {{$service->division}}   </td>
       
    
      
      <td> 
      <a  href={{"edit/".$service['id']}} class="btn btn-info" style="background-color: darksalmon">modifier</a>
       <a  href="/delete-service/{{$service->id}}" class="btn btn-info" style="background-color: firebrick" >Supprimer</a> 
          
      </td>
    </tr>
           
    @endforeach   
    <tbody>
</table>
@endsection
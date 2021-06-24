@extends('theme.admin')

@section('main-content')
<main class="site-content">
    <div class="container" id="app">
        <div class="row">
            <div class="col-12">
            @include('partials.flash')
                <div class="d-flex align-items-center mb-4">
                    <h1 class=" text-center">La liste des services</h1>
    
                    <div class="btn-group ml-auto">
                        <a href="/createService" class="btn btn-primary">
                            Ajouter un service
                        </a>
                        
                    </div>
                </div>
    
                <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="bg-light">
                    <tr>
                        <th scope="col">Service</th>
                        <th scope="col">Division</th>
                        

                        <th scope="col" colspan="2">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($services as $service)
                        <tr>
                            
                            <td>{{$service->service}}</td>
<<<<<<< HEAD
                            <td>{{$service->division}}</td>
                              

=======
                            <td>{{$service->chaymae->nomDivision}}</td>
>>>>>>> 5e22763a5b024ac2d1a0bfd92ecb38e24c88e992
                           
                            <td>
                                <a href="{{route('service.edit',$service->id) }}" role="button"
                                   class="btn btn-info ">
                                    Modifier
                                </a>
                                <a  href="/delete-service/{{$service->id}}" class="btn btn-info" style="background-color: firebrick" >Supprimer</a> 
                            </td>
                            
                        </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
                {{ $services->links("pagination::bootstrap-4") }}
                </div>
            </div>
        </div>
    </div>
    </main>
@endsection
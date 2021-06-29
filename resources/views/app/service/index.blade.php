@extends('theme.admin')

@section('main-content')
<main class="site-content">
    <div class="container" id="app">
        <div class="row">
            <div class="col-10">
            @include('partials.flash')
            @include('style')
                <div class="d-flex align-items-center mb-4" >
                    <h1 class=" text-center">La liste des services :</h1>
    
                    <div class="btn-group ml-auto">
                        <a href="/createService" class="btn btn-primary"  style="background-color: #e09e74de">
                            Ajouter un service
                        </a>
                        
                    </div>
                </div>
    
                <div class="table-responsive">
                <table class="table table-bordered ">
                    <thead style="background-color:#962D2D ">
                    <tr>
                        <th scope="col" >Service</th>
                        <th scope="col" >Division</th>
                        

                        <th scope="col" colspan="2" >Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($services as $service)
                        <tr>
                            
                            <td >{{$service->nom}}</td>
                            <td >{{$service->division->nomdivision}}</td>
                           
                            <td>
                                <a href="{{route('service.edit',$service->id) }}" role="button"
                                   class="btn btn-info "   style="background-color: #F4C7AB">
                                    Modifier
                                </a>
                                <a  href="/delete-service/{{$service->id}}" class="btn btn-info" style="background-color: #F4C7AB" >Supprimer</a> 
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
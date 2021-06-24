@extends('theme.admin')

@section('main-content')

    <!-- Page Heading -->
    {{-- <h1 class="h3 mb-4 text-gray-800">{{$user = auth()->user()->photo }}</h1> --}}
    {{-- <img src="{{$user = auth()->user()->photo }}" /> --}}
   
    <main class="site-content">
        <div class="container" id="app">
            <div class="row">
                <div class="col-12">
                @include('partials.flash')
                    <div class="d-flex align-items-center mb-4">
                        <h1 class="h3 text-muted">La liste des utilisateurs</h1>
        
                        <div class="btn-group ml-auto">
                            <a href="{{ route('user.create') }}" class="btn btn-primary">
                                Ajouter un utilisateur
                            </a>
                        </div>
                    </div>
        
                    <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="bg-light">
                        <tr>
                            <th scope="col">Utilisateur</th>
                            <th scope="col">Adresse e-mail</th>
                            <th scope="col">Rôle</th>
                            <th scope="col">Service</th>
                            <th scope="col">Adresse</th>

                            <th scope="col" colspan="2">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                            <tr>
                                <td>
                                    <img src="{{ $user->photo}}" width="40" height="40"
                                         class="rounded-circle mr-3" />
                                    {{$user->name }} {{$user->prenom}}
                                </td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->role->nom}}</td>
                                <td>{{$user->service->nom}}</td>
                                <td>{{$user->adresse}}</td>
                                <td>
                                    <a href="{{ route('user.edit',$user->id) }}" role="button"
                                       class="btn btn-info btn-sm">
                                        Modifier
                                    </a>
                                </td>
                                <td>
                                <form action="{{ route('user.destroy', $user->id )}}" method="post">
                                    <input type="hidden" name="_method" value="PUT">
                                    {{csrf_field()}}
                                    <button class="btn btn-danger"  
                                            onclick="this.form.submit()" role="button"  >Supprimer
                                    </button> 
                                </form>
                                </td>
                            </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                    {{ $users->links("pagination::bootstrap-4") }}
                    </div>
                </div>
            </div>
        </div>
        </main>
        

  
@endsection

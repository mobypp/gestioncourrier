@extends('theme.admin')
@section('page_title', 'Rôles')
@section('main-content')

    <!-- Page Heading -->
    <div class="d-flex align-items-center mb-4">
        @include('partials.flash')
        @include('style')

      <h1 class="text-center">La liste des roles :</h1>

      <div class="btn-group ml-auto" >
          <a href="{{ route('role.create')}}"  aria-current="true" class="btn btn-primary" style="background-color: #e09e74de">
            Ajouter une role
          </a>
      </div>
  </div>
  <table class="table table-bordered ">
    <thead >
    <tr>
        <th scope="col" >#</th>
        <th scope="col"  >Role</th>
        <th scope="col"   ># d'utilisateur</th>
        <th scope="col"   >Actions</th>
    </tr>
    </thead>
    <tbody>

        @forelse ($roles as $role)
        <tr>
            <td >{{ $role->id }}</td>
            <td >{{ $role->nom }}</td>
            <td >{{ $role->users()->count() }}</td>
            <td >
                <a  class="btn btn-info" disabled
                 aria-current="true" data-toggle="modal" data-target="#b{{ $role->id }}" role="button" style="background-color: #F4C7AB">
                 modifer
                </a>

                {{-- Modal - Edit Role --}}
                <div class="modal fade" id="b{{ $role->id }}" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modifier
                                    Role</h5>
                                <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div> 
        

                            <div class="modal-body"> 
                                <form action="{{ route('role.update', $role->id) }}" method="post">
                                    <input type="hidden" name="_method" value="PUT">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="role">Type de Role</label>
                                        <input type="text" class="form-control" id="nom"
                                               name="nom" value="{{$role->nom}}">

                                    </div>

                                    <button type="submit" class="btn btn-primary" style="background-color:rgb(184, 87, 87)">
                                        Enregistrer
                                    </button>
                                </form>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"  style="background-color:rgb(184, 87, 87)"
                                        data-dismiss="modal">Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </td>
        </tr>
        @empty

        @endforelse
    </tbody>
</table>
{{ $roles->links("pagination::bootstrap-4") }}
  
@endsection

@extends('theme.admin')
@section('page_title', 'Rôles')
@section('main-content')

    <!-- Page Heading -->
    <div class="d-flex align-items-center mb-4">
        @include('partials.flash')

      <h1 class="h4 text-muted">La liste des roles</h1>

      <div class="btn-group ml-auto" >
          <a href="{{ route('create')}}" class="list-group-item list-group-item-action active" aria-current="true">
            Ajouter une role
          </a>
      </div>
  </div>
  <table class="table table-striped table-hover">
    <thead class="table-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Role</th>
        <th scope="col"># d'utilisateur</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>

        @forelse ($roles as $role)
        <tr>
            <td>{{ $role->id }}</td>
            <td>{{ $role->nom }}</td>
            <td>{{ $role->users()->count() }}</td>
            <td>
                <a  class="btn active btn-dark btn-sm" disabled
                 aria-current="true" data-toggle="modal" data-target="#b{{ $role->id }}" role="button">
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
                                <form action="{{ url('edit/'.$role->id) }}" method="post">
                                    <input type="hidden" name="_method" value="PUT">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="role">Type de Role</label>
                                        <input type="text" class="form-control" id="nom"
                                               name="nom" value="{{$role->nom}}">

                                    </div>

                                    <button type="submit" class="btn btn-primary">
                                        Enregistrer
                                    </button>
                                </form>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
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

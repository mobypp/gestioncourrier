@extends('theme.admin')

@section('main-content')

    <!-- Page Heading -->
    {{-- <h1 class="h3 mb-4 text-gray-800">{{ __('Dashboard') }}</h1> --}}
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('organisme.create') }}"> Nouveau Organisme</a>
            </div>
        </div>
</div><br>

@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
@endif



<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Organisme</th>
      <th scope="col">Localisation</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
@foreach ($organismes as $organisme)
    <tr>
      <th scope="row">{{ $organisme->id }}</th>
      <td>{{ $organisme->organisme }}</td>
      <td>{{ $organisme->localisation }}</td>
      <td>
      <form action="{{ route('organisme.destroy',$organisme->id) }}" method="POST">
        
        <a class="btn btn-info" href="{{ route('organisme.show',$organisme->id) }}">Show</a>

        <a class="btn btn-primary" href="{{ route('organisme.edit',$organisme->id) }}">Edit</a>

        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </td>
    </tr>
@endforeach
  </tbody>
</table>

{{ $organismes->links() }}

  
@endsection

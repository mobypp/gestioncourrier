@extends('theme.admin')

@section('main-content')

    <!-- Page Heading -->
    {{-- <h1 class="h3 mb-4 text-gray-800">{{ __('Dashboard') }}</h1> --}}
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('courrier.create') }}"> Nouveau courrier</a>
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
      <th scope="col">Numero de Courrier</th>
      <th scope="col">Titre</th>
      <th scope="col">Contenu</th>
      <th scope="col">Sens</th>
      <th scope="col">Objet</th>
      <th scope="col">Etat</th>
	  <th scope="col">Organisme</th>
	  <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
@foreach ($courriers as $courrier)
    <tr>
      <th scope="row">{{ $courrier->id }}</th>
      <td>{{ $courrier->titre }}</td>
      <td>{{ $courrier->contenu }}</td>
      <td>{{ $courrier->sens }}</td>
      <td>{{ $courrier->objet }}</td>
      <td>{{ $courrier->etat }}</td>
	  <td>{{ $courrier->organisme }}</td>
      <td>
      <form action="{{ route('courrier.destroy',$courrier->id) }}" method="POST">
        
        <a class="btn btn-info" href="{{ route('courrier.show',$courrier->id) }}">Montrer</a>

        <a class="btn btn-primary" href="{{ route('courrier.edit',$courrier->id) }}">Editer</a>

        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
      </td>
    </tr>
@endforeach
  </tbody>
</table>

{{ $courriers->links() }}


  
@endsection

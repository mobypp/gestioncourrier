@extends('theme.admin')

@section('main-content')

    <!-- Page Heading -->
    {{-- <h1 class="h3 mb-4 text-gray-800">{{ __('Dashboard') }}</h1> --}}
    <div class="row">
        <div class="col-lg-12 margin-tb">
			<div class="pull-right">
                <a class="btn btn-primary" href="{{ route('courrier.create') }}">Ajouter</a>
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
      <th scope="col">Matricule</th>
	  <th scope="col">Titre</th>
	  <th scope="col">Destination</th>
	  <th scope="col">Objet</th>
      <th scope="col">Etat</th>
	  <th scope="col">Date</th>
	  <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
@foreach ($courriers as $courrier)
    <tr>
      <th scope="row">{{ $courrier->id }}</th>
	  <td>{{ $courrier->matricule }}</td>
      <td>{{ $courrier->titre }}</td>
      <td>{{ $courrier->destination }}</td>
      <td>{{ $courrier->objet }}</td>
      <td>
		@if($courrier->etat)
			 <p>Envoye</p>
		 @else
			<p>Non Envoye</p>
		@endif
		</td>
	  <td>{{ $courrier->created_at }}</td>
	  <td>
			<form action="{{ route('courrier.destroy', $courrier->id) }}" method="POST">

				<a class="btn btn-info" href="{{ route('courrier.show',$courrier->id) }}">Montrer</a>

				<a class="btn btn-primary" href="{{ route('courrier.edit',$courrier->id) }}">Editer</a>
				@csrf
				@method('DELETE')

				<button type="submit" title="delete" class="btn btn-danger">
					Supprimer
				</button>
			</form>
		</td>
    </tr>
@endforeach
  </tbody>
</table>

{{ $courriers->links() }}


@endsection

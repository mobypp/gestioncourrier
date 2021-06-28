@extends('theme.admin')

@section('main-content')

    <!-- Page Heading -->
    {{-- <h1 class="h3 mb-4 text-gray-800">{{ __('Dashboard') }}</h1> --}}
	<div class="row">
			<div class="col-lg-12 margin-tb">
				<div class="pull-right">
                <a class="btn btn-success" href="{{ route('file.anotherFile', [$courrier->id]) }}">Ajouter</a>
				</div>
			</div>
		</div><br>

@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
@endif



<table class="table table-striped table-bordered">
  <thead style="display:none">
    <tr>
      <th scope="col">@</th>
      <th scope="col">Fichier</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
@foreach ($files as $file)
@if ($file->courrier_id == $courrier->id)
    <tr>
      <th scope="row">
      <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-file-text-o"></i></span>
            </div>

            <input type="text" class="form-control" placeholder="{{ $file->nom }}.{{ $file->extension }}" aria-describedby="basic-addon1" disabled>
        </div>
    </th>
	<td>
		<form action="{{ route('file.destroy', $file->id) }}" method="POST">
			@csrf
			@method('DELETE')

			<button type="submit" class="btn btn-danger">Supprimer</button>
		</form>
	</td>
    </tr>
@endif
@endforeach
  </tbody>
</table>

<div class="text-center">
    <a class="btn btn-primary btn-lg" href="{{ route('file.final', [$courrier->id]) }}"> Continuer</a>
</div>

{{ $files->links() }}



  
@endsection

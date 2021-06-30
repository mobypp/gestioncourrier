@extends('theme.admin')

@section('main-content')

@can('create', 'App\Models\Courrier')
    <div class="row">
        <div class="col-lg-12 margin-tb">
			<div class="pull-right">
                <a class="btn btn-success" href="{{ route('courrier.create') }}">Ajouter</a>
            </div>
        </div>
</div><br>
@endcan
@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
@endif

<table class="table table-striped table-bordered table-hover">
  <thead style="display:none">
    <tr>
      <th scope="col" style=" text-align:center;">Courrier</th>
	  <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
@foreach ($courriers as $courrier)
    <tr>
	  <td scope="row" style="vertical-align: middle">
	  <div class="row">
			<div class="col-sm mb-3" >
				<b>Matricule: </b>{{ $courrier->matricule }}
			</div>
			<div class="col-sm mb-3"  style="text-align:center">
				<b>Titre: </b>{{ $courrier->titre }}
			</div>
			<div class="col-sm mb-3" style="text-align:right; color: #A9A9A9">
				<b>{{ date('Y/m/d', strtotime($courrier->created_at)) }}</b>
			</div>
		</div>
		<div class="row">
			<div class="col-10 mb-3">
				<b>Contenu: </b>{{ substr(trim(strip_tags($courrier->contenu)),0,100) }}<span>...</span>
			</div>
			<div class="col-2 mb-3" style="text-align:right">
				<a href="{{ route('courrier.show',$courrier->id) }}" style="color: red">
				<button type="button" class="btn btn-outline-info">Lire plus</button>
				<a>
			</div>
		</div>
		
		
	</td>
@can('viewCrud', 'App\Models\Courrier')
	  <td>
			<form action="{{ route('courrier.destroy', $courrier->id) }}" method="POST">
				<div class="row col-md-4 mb-3">
					<a class="btn btn-primary" href="{{ route('courrier.edit',$courrier->id) }}">‎‎‏‏‎&nbsp;&nbsp;‎‏‏‎‎Editer‏‏‎&nbsp;</a>
				</div>
				
				@csrf
				@method('DELETE')
				<div class="row col-md-4 mb-3">
					<button type="submit" title="delete" class="btn btn-danger">
						Supprimer
					</button>
				</div>
			</form>
		</td>
		@endcan
    </tr>
@endforeach
  </tbody>
</table>

{{ $courriers->links() }}


@endsection

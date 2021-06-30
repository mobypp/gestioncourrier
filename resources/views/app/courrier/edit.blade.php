@extends('theme.admin')

@section('main-content')

<div class="card mt-5">
    <div class="card-header" >
        <h1 style="text-align: center;">Editer Courrier</h1>
    </div>

    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form enctype="multipart/form-data" action="{{ route('courrier.update',$courrier->id) }}" method="POST">
		@csrf
		@method('PUT')
		<div class="form-row">
		  <div class="form-group  col-md-4 mb-3">
			<label for="matricule">Matricule</label>
			<input type="text" class="form-control" value="{{ $courrier->matricule }}" name ="matricule">
		  </div>
		  <div class="form-group  col-md-4 mb-3">
			<label for="titre">Titre</label>
			<input type="text" class="form-control" value="{{ $courrier->titre }}" name ="titre">
		  </div>
		  <div class="form-group  col-md-4 mb-3">
			  <label class="">Destination</label>
				  <select name="organisme_id" class="form-control">
						<option disabled selected>Selectionner la destination</option>
						@foreach(App\Models\Organisme::all() as $organisme)
							<option value="{{ $organisme->id }}" {{ (collect(old('organisme_id'))->contains($organisme->id )) ? 'selected':'' }}>{{ $organisme->nom }}</option>
                       @endforeach
					</select>
			</div>
			</div>
		<div class="form-row">
		  <div class="form-group col-md-8 mb-3">
			<label for="objet">Objet</label>
			<input type="text" class="form-control" value="{{ $courrier->objet }}" name ="objet">
		  </div>
		  
		  </div>
		  
		<div class="form-group">
			<textarea class="ckeditor form-control" name="contenu">{{ $courrier->contenu }}</textarea>
		</div>
		 

            <button type="submit" class="btn btn-block btn-danger">Editer</button>
        </form>
    </div>
</div>

@endsection
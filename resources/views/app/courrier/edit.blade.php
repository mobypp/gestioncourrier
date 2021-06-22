@extends('theme.admin')

@section('main-content')

<div class="card mt-5">
    <div class="card-header">
        Editer Courrier
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
        <form action="{{ route('courrier.update',$courrier->id) }}" method="POST">
		@csrf
		@method('PUT')
		  <div class="form-group">
			<label for="id">Numero du Courrier</label>
			<input type="text" class="form-control" value="{{ $courrier->id }}" placeholder="Entrer Numero" name ="id">
		  </div>
		  <div class="form-group">
			<label for="titre">Titre</label>
			<input type="text" class="form-control" value="{{ $courrier->titre }}" placeholder="Entrer Titre" name ="titre">
		  </div>
		  <div class="form-group">
			<label for="contenu">Countenu</label>
			<input type="text" class="form-control" value="{{ $courrier->contenu }}" placeholder="Entrer Countenu" name ="contenu">
		  </div>
		  <div class="form-group">
			<label for="sens">Sens</label>
			<input type="text" class="form-control" value="{{ $courrier->sens }}" placeholder="Entrer Sens" name ="sens">
		  </div>
		  <div class="form-group">
			<label for="objet">Objet</label>
			<input type="text" class="form-control" value="{{ $courrier->objet }}" placeholder="Entrer Objet" name ="objet">
		  </div>
		<div class="form-group">
			<label for="etat">Etat</label>
			<input type="text" class="form-control" value="{{ $courrier->etat }}" placeholder="Entrer Etat" name ="etat">
		  </div>
		  
		  <div class="form-group">
			  <label class="">Organisme</label>
			  <select name="organisme" class="form-control">
					 <option disabled selected>Select organisme</option>
					 @foreach((App\Models\Organisme::get()) as $organisme)
						 <option value="{{ $organisme->id }}">
							 {{ $organisme->organisme }}
						 </option>
					 @endforeach
				</select>
				</div>

            <button type="submit" class="btn btn-block btn-danger">Editer</button>
        </form>
    </div>
</div>

@endsection
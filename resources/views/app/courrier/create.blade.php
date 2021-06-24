{{-- @extends('theme.admin')

@section('main-content') --}}


<div class="card mt-5">
    <div class="card-header">
        Create Courrier
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
        <form method="post" action="{{ route('courrier.store') }}">
            <div class="form-group">
                @csrf
                 <label for="id">Numero du Courrier</label>
				 <input type="text" class="form-control"  placeholder="Entrer Numero" name ="id">
			  </div>
			  <div class="form-group">
				<label for="titre">Titre</label>
				<input type="text" class="form-control"  placeholder="Entrer Titre" name ="titre">
			  </div>
			  <div class="form-group">
				<label for="contenu">Contenu</label>
				<input type="text" class="form-control"  placeholder="Entrer Contenu" name ="contenu">
			  </div>
			  <div class="form-group">
				<label for="sens">Sens</label>
				<input type="text" class="form-control"  placeholder="Entrer Sens" name ="sens">
			  </div>
			  <div class="form-group">
				<label for="objet">Objet</label>
				<input type="text" class="form-control"  placeholder="Entrer Objet" name ="objet">
			  </div>
			  <div class="form-group">
				<label for="etat">Etat</label>
				<input type="text" class="form-control"  placeholder="Entrer Etat" name ="etat">
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

            <button type="submit" class="btn btn-block btn-primary">Ajouter</button>
        </form>
    </div>
</div>


{{-- @endsection --}}
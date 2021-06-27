@extends('theme.admin')

@section('main-content')


<div class="card mt-5">
    <div class="card-header" >
        <h1 style="text-align: center;">Nouveau Courrier</h1>
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
        <form method="post" enctype="multipart/form-data" action="{{ route('courrier.store') }} ">
		<div class="form-row">
            <div class="form-group col-md-4 mb-3" >
                @csrf
				 <input type="text" class="form-control"  placeholder="Entrer Matricule" name ="matricule">
			  </div>
			  <div class="form-group col-md-4 mb-3">
				<input type="text" class="form-control"  placeholder="Entrer Titre" name ="titre">
			  </div>
			  <div class="form-group col-md-4 mb-3">
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
				<input type="text" class="form-control"  placeholder="Entrer Objet" name ="objet">
			  </div>
			  
			<div class="form-group col-md-4 mb-3">
				<div class="input-group mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text"><i class="fa fa-file-text-o"></i></span>
				  </div>
					  <div class="custom-file">
						<input type="file" class="custom-file-input" id="customFileInput" aria-describedby="customFileInput">
						<label class="custom-file-label" for="customFileInput">Selectionner le fichier</label>
					</div>
				  </div>
				  </div>
            </div>
			  
			<div class="form-group">
				<textarea class="ckeditor form-control" name="contenu"></textarea>
			</div>

			<div class="text-center">
				<a class="btn btn-secondary btn-lg" href="{{ route('courrier.index') }}"> Retour</a>
				<button type="submit" class="btn btn-primary btn-lg">Suivant</button>
			</div>
        </form>
    </div>
</div>



  <script>
	document.querySelector('.custom-file-input').addEventListener('change', function (e) {
	  var name = document.getElementById("customFileInput").files[0].name;
	  var nextSibling = e.target.nextElementSibling
	  nextSibling.innerText = name
	})
  </script>

@endsection
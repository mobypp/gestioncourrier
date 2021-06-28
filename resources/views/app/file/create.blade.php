@extends('theme.admin')

@section('main-content')


<div class="card mt-5">

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
        <form method="post" enctype="multipart/form-data" action="{{ route('file.store') }} ">
                @csrf
			  <div class="form-group" style="display:none">
				  <select name="courrier_id" class="form-control">
							<option value="{{ $courrier->id }}">{{ $courrier->matricule }}</option>
					</select>
				</div>
			  
			<div class="form-group col-md-4 mb-3">
				<div class="input-group mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text"><i class="fa fa-file-text-o"></i></span>
				  </div>
					  <div class="custom-file">
						<input type="file" name="file" class="custom-file-input" id="customFileInput" aria-describedby="customFileInput">
						<label class="custom-file-label" for="customFileInput">Selectionner le fichier</label>
					</div>
				  </div>
				  </div>
            </div>

			<div class="text-center">
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
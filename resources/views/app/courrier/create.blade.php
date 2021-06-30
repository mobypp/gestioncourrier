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
        <form id="form1" method="post" enctype="multipart/form-data" action="{{ route('courrier.storeN',$courrier->id) }} ">
		<div class="form-row">
            	<div class="form-group col-sm mb-3" >
                @csrf
				 <input type="text" class="form-control"  placeholder="Entrer Matricule" name ="matricule">
			  </div>
			  <div class="form-group col-sm mb-3">
				<input type="text" class="form-control"  placeholder="Entrer Titre" name ="titre">
			  </div>
			  <div class="form-group col-sm mb-3">
				  <select name="organisme_id" class="form-control">
						 <option disabled selected>Selectionner la destination</option>
						 @foreach((App\Models\Organisme::get()) as $organisme)
							 <option value="{{ $organisme->id }}">
								 {{ $organisme->nom }}
							 </option>
						 @endforeach
				  <select name="destination" class="form-control">
						@foreach(App\Models\Organisme::all() as $organisme)
							<option value="{{ $organisme->id }}" {{ (collect(old('organisme_id'))->contains($organisme->id )) ? 'selected':'' }}>{{ $organisme->nom }}</option>
                       @endforeach
					</select>
				</div>
			</div>
			<div class="form-row">
			  <div class="form-group col-sm-6 mb-3">
				<input type="text" class="form-control"  placeholder="Entrer Objet" name ="objet">
			  </div>
				<div class="form-group col-sm-5 mb-3">
						@foreach($courrier->files as $file)
							<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fa fa-file-text-o"></i></span>
									</div>
									<input type="text" class="form-control" placeholder="{{ $file->nom }}.{{ $file->extension }}" aria-describedby="basic-addon1" disabled>
								</div>
							@endforeach
						</div>
				@if(count($courrier->files) < 3)
					<div class="form-group col-sm mb-3">
							<a  class="btn btn-success text-light" data-toggle="modal" id="mediumButton" data-target="#mediumModal"
								data-attr="{{ route('file.anotherFile', $courrier->id) }}" title="file">
								<i class="fas fa-plus-circle"></i>
							</a>
					</div>
				@endif
			</div>
			  
			<div class="form-group">
				<textarea class="ckeditor form-control" name="contenu"></textarea>
			</div>

			<div class="text-center">
				<a class="btn btn-secondary btn-lg" href="{{ route('courrier.index') }}"> Retour</a>
				<button type="submit" class="btn btn-primary btn-lg" form="form1">Suivant</button>
			</div>
        </form>
    </div>
</div>

    <!-- medium modal -->
    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="mediumModal">Fichiers</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
            	</div>
                <div class="modal-body" id="mediumBody">
                    <div>
                        <!-- the result to be displayed apply here -->
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>

        // display a modal (medium modal)
        $(document).on('click', '#mediumButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#mediumModal').modal("show");
                    $('#mediumBody').html(result).show();
                },
                complete: function() {
                    $('#loader').hide();
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
        });

    </script>


@endsection
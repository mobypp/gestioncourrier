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

				<a data-toggle="modal" id="smallButton" data-target="#smallModal"
					data-attr="{{ route('courrier.show', $courrier->id) }}" title="show">
					<button class="btn btn-info">
						Montrer
					</button>
				</a>

				<a class="text-secondary" data-toggle="modal" id="mediumButton" data-target="#mediumModal"
					data-attr="{{ route('courrier.edit', $courrier->id) }}">
					<button class="btn btn-info">
						Editer
					</button>
				</a>
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


  
<!-- small modal -->
    <div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="smallBody">
                    <div>
                        <!-- the result to be displayed apply here -->
                    </div>
                </div>
				<div class="modal-footer" id="smallBody">
					<button type="button" class="close" data-dismiss="modal">
				</div>
            </div>
        </div>
    </div>


    <!-- medium modal -->
    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
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
        // display a modal (small modal)
        $(document).on('click', '#smallButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#smallModal').modal("show");
                    $('#smallBody').html(result).show();
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

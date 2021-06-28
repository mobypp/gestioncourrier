{{-- @extends('theme.admin')

@section('main-content') --}}

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
        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Warning!</strong> Please check your fields.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
@endif

<form action="{{ route('organisme.update',$organisme->id) }}" method="POST">
@csrf
@method('PUT')
  <div class="form-group">
    <label for="nom">Nom</label>
    <input type="text" class="form-control" value="{{ $organisme->nom }}" placeholder="Entrer Nom" name ="nom">
  </div>
<div class="form-group">
    <label for="localisation">Localisation</label>
    <input type="text" class="form-control" value="{{ $organisme->localisation }}" placeholder="Entrer Localisation" name ="localisation">
  </div>
  <button type="submit" class="btn btn-primary" style="background-color:rgb(184, 87, 87)">Enregistrer</button>
</form>

{{-- @endsection --}}
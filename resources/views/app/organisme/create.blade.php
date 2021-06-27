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
        <strong>Warning!</strong> Please check your fields<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('organisme.store') }}" method="POST">
@csrf
  <div class="form-group">
    <label for="organisme">Organisme</label>
    <input type="text" class="form-control"  placeholder="Entrer Organisme" name ="nom">
  </div>
  <div class="form-group">
    <label for="localisation">Localisation</label>
    <input type="text" class="form-control"  placeholder="Entrer Localisation" name ="localisation">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


{{-- @endsection --}}
@extends('theme.admin')

@section('main-content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2></h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-info" href="{{ route('organisme.index') }}"> Back</a>
        </div>
    </div>
</div><br>

<div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Organisme:</strong>
                {{ $organisme->nom }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Localisation:</strong>
                {{ $organisme->localisation }}
            </div>
        </div>
    </div>

@endsection
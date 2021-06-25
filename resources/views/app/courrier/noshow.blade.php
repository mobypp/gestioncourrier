@extends('theme.admin')

@section('main-content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2></h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-info" href="{{ route('courrier.index') }}"> Back</a>
        </div>
    </div>
</div><br>

<div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Numero de Courrier:</strong>
                {{ $courrier->id }}
            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Titre:</strong>
                {{ $courrier->titre }}
            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Contenu:</strong>
                {{ $courrier->contenu }}
            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Sens:</strong>
                {{ $courrier->sens }}
            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Objet:</strong>
                {{ $courrier->objet }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Etat:</strong>
                {{ $courrier->etat }}
            </div>
        </div>
    </div>

{{-- @endsection --}}
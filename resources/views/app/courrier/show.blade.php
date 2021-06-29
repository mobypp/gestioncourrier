@extends('theme.admin')

@section('main-content')


    <div class="container">
        <div class=" courrier-s">
            <div class="row">
                <div class="col-8">
                    <a class="" href="{{ route('app')}}">
                        <img src="{{ asset('theme/img/courrier.png') }}" class="logo"/>
                    </a>
                </div>
                <div class="col-4 align-content-end">
                    <div class="courrier-info ">
                        <p><span><b>Marrakech le: </b></span>{{ date('Y/m/d', strtotime($courrier->created_at)) }}</p>
                        <p><span><b>Titre: </b></span>{{ $courrier->titre }}</p>
                        <p><span><b>Nom d'organisme: </b></span>{{ $courrier->organisme->nom }}</p>
                        <p><span><b>Localisation: </b></span>{{ $courrier->organisme->localisation }}</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-8 objet">
                    <p><span><b>Objet: </b></span>{{ $courrier->objet }}</p>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-12 content">
					{{ strip_tags($courrier->contenu) }}
                </div>
            </div>



            <div class="row">
                <div class="col-6">
                    @foreach($courrier->files as $file)
                    <div class="row">
                    <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-file-text-o"></i></span>
                            </div>

                            <input type="text" class="form-control" placeholder="{{ $file->nom }}.{{ $file->extension }}" aria-describedby="basic-addon1" disabled>
                        </div>
                    </div>
                    @endforeach
                </div>
              <div class="col-12 align-content-end">
                  <div class="courrier-info ">
                      <p><span><b>signature</b></span></p>
                      <p><span><b>{{ Auth::user()->name}} </b></span>{{Auth::user()->prenom}}</p>
                  </div>
              </div>
            </div>
				
            
          </div>
@can('viewCrud', 'App\Models\Courrier')
			<div class="text-center">
				<a class="btn btn-secondary btn-lg" href="{{ route('courrier.edit',$courrier->id) }}">Editer</a>
                <form action="{{ route('enregistrer') }}" method="post" enctype="multipart/form-data">
                    {{-- <form enctype="multipart/form-data" action="{{ route('courrier.update',$courrier->id) }}" method="POST"> --}}
                        @csrf
                        {{-- @method('PUT') --}}
                    <input type="hidden" value="{{$courrier->id}}" name="id_co" />

                    <button type="submit" class="btn btn-primary btn-lg">Enregidtrer</button>
                </form>
			</div><br>
@endcan
{{-- Chef Service va voir ca pour valider le courrier et le transferer vers Chef Division --}}
@can('viewCS', 'App\Models\Courrier')
            <div class="text-center">
				<a class="btn btn-secondary btn-lg" href="{{ route('courrier.edit',$courrier->id) }}"> Accepter</a>
				<a class="btn btn-primary btn-lg" href="{{ route('courrier.index') }}"> Ok</a>
			</div><br>
@endcan
{{-- Chef Division va voir ca pour valider le courrier et le transferer vers Bureau d ordere --}}
@can('viewCD', 'App\Models\Courrier')
            <div class="text-center">
				<a class="btn btn-secondary btn-lg" href="{{ route('courrier.edit',$courrier->id) }}"> Valider</a>
				<a class="btn btn-primary btn-lg" href="{{ route('courrier.index') }}"> Ok</a>
			</div><br>
@endcan

{{-- Bureau d ordere va voir ca pour valider le courrier et le transferer vers Bureau d ordere distinataire par email --}}
@can('viewBO', 'App\Models\Courrier')
            <div class="text-center">
				<a class="btn btn-secondary btn-lg" href="{{ route('courrier.edit',$courrier->id) }}"> Transferer</a>
				<a class="btn btn-primary btn-lg" href="{{ route('courrier.index') }}"> Ok</a>
			</div><br>
@endcan
</div>
@endsection
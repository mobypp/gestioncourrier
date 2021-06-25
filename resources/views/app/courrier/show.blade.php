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
                        <p><span><b>Marrakech le :</b></span>{{ $courrier->created_at }}</p>
                        <p><span><b>Titre :</b></span>{{ $courrier->titre }}}</p>
                        <p><span><b>Nom d'organisme :</b></span>{{ $courrier->organisme }}</p>
                        <p><span><b>Localisation :</b></span>{{ $courrier->organisme }}</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-8 objet">
                    <p><span><b>Objet :</b></span>{{ $courrier->objet }}</p>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-12 content">
					{{($courrier->contenu) }}
                </div>
				<input type="file" value="fichier" />
            </div>

            <div class="row align-content-end">
              <div class="col-12 ">
                  <div class="courrier-info ">
                      <p><span><b>signature</b></span></p>
                      <p><span><b>Nom </b></span>Prenom</p>
                  </div>
              </div>
            </div>
            
          </div>
          <div class="row ">
            <div class="col-6">
                <div class="btn-valider">
                    <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                        Enregistrer
                      </a>
                </div>
            </div>
          </div>
    </div>
@endsection
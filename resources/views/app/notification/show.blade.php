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
                        <p><span><b>Marrakech le :</b></span>{{Date('d-m-Y')}}</p>
                        <p><span><b>Titre :</b></span>{{Date('d-m-Y')}}</p>
                        <p><span><b>Nom d'organisme :</b></span>{{Date('d-m-Y')}}</p>
                        <p><span><b>Localisation :</b></span>{{Date('d-m-Y')}}</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-8 objet">
                    <p><span><b>Objet :</b></span>ooooooooooooooooooooooooooooooooooooooooooooooooooo</p>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-12 content">
                    <p>Content Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus expedita dicta, accusantium asperiores sapiente nam placeat! Odio praesentium inventore, architecto cum voluptatum tenetur minima, dicta, ducimus deleniti facilis a reprehenderit.</p>
                    <p>Content Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus expedita dicta, accusantium asperiores sapiente nam placeat! Odio praesentium inventore, architecto cum voluptatum tenetur minima, dicta, ducimus deleniti facilis a reprehenderit.</p>
                    <p>Content Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus expedita dicta, accusantium asperiores sapiente nam placeat! Odio praesentium inventore, architecto cum voluptatum tenetur minima, dicta, ducimus deleniti facilis a reprehenderit.</p>
                    <p>Content Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus expedita dicta, accusantium asperiores sapiente nam placeat! Odio praesentium inventore, architecto cum voluptatum tenetur minima, dicta, ducimus deleniti facilis a reprehenderit.</p>
                    <input type="file" value="fichier" />
                </div>
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
          <div class="row  justify-content-end">
            <div class="col-3">
                <div class="btn-valider">
                    <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                        Enregistrer
                      </a>
                </div>
            </div>
          </div>
    </div>
@endsection
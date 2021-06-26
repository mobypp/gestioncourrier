@extends('theme.admin')

@section('main-content')


<div class="container">
    <div class=" courrier-s">
        <div class="row">
            <div class="col-8">
                
                <div class="profile-img">
                    <img src="{{ auth()->user()->photo }}" width="40" height="40"
                    class="rounded-circle mr-3" /> 
       </a>

       <div class="profile-head">
                            
                        
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                
            </li>
            
        </ul>
    </div>
                   
                </div>
            </div>
            <div class="col-md-6">
              
            </div>
            <div class="col-md-2">
              
                
            </div>
        </div>
        <div class="row">
        
            <div class="col-md-10">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label >Nom :</label>
                            </div>
                            <div class="col-md-6">
                                <label>{{ auth()->user()->name}}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Prenom:</label>
                            </div>
                            <div class="col-md-6">
                                <label>{{auth()->user()->prenom}}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Adresse:</label>
                            </div>
                            <div class="col-md-6">
                                <label>{{auth()->user()->adresse}}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>E-mail :</label>
                            </div>
                            <div class="col-md-6">
                                <label>{{ auth()->user()->email}}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>téléphone :</label>
                            </div>
                            <div class="col-md-6">
                                <label>{{auth()->user()->telephone}}</label>
                            </div>
                    </div>
                    
                
                    <a href="/editP" class="btn btn-primary  " style="background-color: brown"> Modifier 
                                </a>
               

                                
                                  
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
   	
@endsection
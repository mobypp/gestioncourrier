@extends('theme.admin')

@section('main-content')

<main class="site-content">
  <div class="container" id="app">
      <div class="row">
          <div class="col-12">
          @include('partials.flash')
              <div class="d-flex align-items-center mb-4">
                  <h1 class="text-center">La liste des divisions</h1>
  
                  <div class="btn-group ml-auto">
                      <a href="{{ route('division.create')}}" class="btn btn-primary">
                          Ajouter une division
                      </a>
                  </div>
              </div>
  
              <div class="table-responsive">
              <table class="table table-hover">
                  <thead class="bg-light">
                  <tr>
                      <th scope="col">Division</th>
                      

                      <th scope="col" colspan="2">Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                      @forelse ($divisions as $division)
                      <tr>
                          
                             
                          </td>
                          <td>{{$division->nomdivision}}</td>
                          
                          <td>
                              <a href="{{ route('division.edit',$division->id) }}" role="button"
                                 class="btn btn-info ">
                                  Modifier
                              </a>
                          </td>
                          
                      </tr>
                      @empty
                      @endforelse
                  </tbody>
              </table>
              {{ $divisions->links("pagination::bootstrap-4") }}
              </div>
          </div>
      </div>
  </div>
  </main>
@endsection
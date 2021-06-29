@extends('theme.admin')

@section('main-content')

<main class="site-content">
  <div class="container" id="app">
      <div class="row">
          <div class="col-10">
          @include('partials.flash')
          @include('style')
          <div class="d-flex justify-content-between align-items-center mb-4" >
                  <h1 class="text-center" >La liste des divisions :</h1>
  
                  <div class="btn-group ml-auto">
                  
                    <a href="/createDivision" class="btn btn-primary"   style="background-color: #e09e74de">
                          Ajouter une division
                      </a>
                  </div>
              </div>
  
              <div class="table-center  ">
              <table  class="table table-bordered ">
                  <thead >
                  <tr>
                      <th ><label >Division</label></th>
                      

                      <th ><label >Actions</label></th>
                  </tr>
                  </thead>
                  <tbody>
                      @forelse ($divisions as $division)
                      <tr>
                          
                             
                          </td>
                          <td scope="col">{{$division->nomdivision}}</td>
                          
                          <td scope="col">
                              <a href="{{ route('division.edit',$division->id) }}" role="button"
                                 class="btn btn-info "   style="background-color: #F4C7AB">
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
{{-- @extends('layouts.app')

@section('content') --}}
@extends('theme.admin')

@section('main-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in as!') }}
    <span class="mr-2 d-none d-lg-inline text-gray-600 small"> {{ Auth::user()->name }}</span>
    <span class="mr-2 d-none d-lg-inline text-gray-600 small"> {{ Auth::user()->role->nom }}</span>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

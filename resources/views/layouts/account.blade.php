@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
               @include('layouts.menu-account')
            </div>
            <div class="col-md-8">
                <div class="card">
                   @section('menu-content')
                   @show
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.account')

@section('menu-content')
    <div class="card-header">Settings</div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        your settings
    </div>
@endsection
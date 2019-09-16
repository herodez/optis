@extends('layouts.account')

@section('menu-content')
    <div class="card-header">Profile</div>
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <h5>Your API Token</h5>
        <input type="text" class="form-control" disabled id="basic-url" aria-describedby="basic-addon3" value="{{Auth::user()->api_key}}">
        <p>You can use your API token to interact with the {{ config('app.name', 'Laravel') }} API</p>

        <hr>

        <h5>Your packages</h5>
    </div>
@endsection

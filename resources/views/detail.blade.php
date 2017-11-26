@extends('layouts.app')

@section('content')

    <div class="row text-center">
        <div class="col-md-12">
            <h2 class="text-center">User detail</h2>
        </div>
    </div>

    <div class="well invisible"></div>

    <div class="row text-center">
        <div class="col-md-3"></div>
        <div class="col-md-2">
            <strong>Full name:</strong>
            <h3>{{ $user->full_name }}</h3>
        </div>
        <div class="col-md-2">
            <strong>User name:</strong>
            <h3>{{ $user->user_name }}</h3>
        </div>
        <div class="col-md-2">
            <strong>Mobile phone:</strong>
            <h3>{{ $user->phone }}</h3>
        </div>
    </div>

    <div class="well invisible"></div>

    <div class="row text-center">
        <div class="col-md-3"></div>
        <div class="col-md-2">
            <strong>Birth date:</strong>
            <h3>{{ $user->birth_date }}</h3>
        </div>
        <div class="col-md-2">
            <strong>Account role:</strong>
            <h3>
                @if($user->role_id == 1) employee @else admin @endif
            </h3>
        </div>
        <div class="col-md-2">
            <strong>Account status:</strong>
            <h3>
                @if ($user->is_activated == 1) active @else inactive @endif
            </h3>
        </div>
    </div>

    <div class="well invisible"></div>

    <div class="row text-center">
        <a href="{{ route('settings.index') }}" class="btn btn-default">back</a>
    </div>

@endsection
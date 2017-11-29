@extends('layouts.app')

@section('content')

    <div class="row text-center">
        <div class="col-md-12">
            <h2 class="text-center">Animal detail</h2>
        </div>
    </div>

    <div class="well invisible"></div>

    <div class="row text-center">
        <div class="col-md-3"></div>
        <div class="col-md-2">
            <strong>Full name:</strong>
            <h3>{{ $animal->name }}</h3>
        </div>
        <div class="col-md-2">
            <strong>birth date:</strong>
            <h3>{{ $animal->birth_date }}</h3>
        </div>
        <div class="col-md-2">
            <strong>birth country:</strong>
            <h3>{{ $animal->birth_country }}</h3>
        </div>
    </div>

    <div class="well invisible"></div>

    <div class="row text-center">
        <div class="col-md-3"></div>
        <div class="col-md-2">
            <strong>parent:</strong>
            <h3>{{ $animal->parent }}</h3>
        </div>
        <div class="col-md-2">
            <strong>occurrence place:</strong>
            <h3>
                {{ $animal->occurrence_place }}
            </h3>
        </div>
        <div class="col-md-2">
            <strong>Account status:</strong>
            <h3>
                {{ $animal->description  }}
            </h3>
        </div>
    </div>

    <div class="well invisible"></div>

    <div class="row text-center">
        <div class="col-md-3"></div>
        <div class="col-md-2">
            <strong>outlet:</strong>
            <h3>{{ $animal->outlet->name }}</h3>
        </div>
    </div>


    <div class="well invisible"></div>

    <div class="row text-center">
        <a href="{{ route('animals.index') }}" class="btn btn-default">back</a>
    </div>

@endsection
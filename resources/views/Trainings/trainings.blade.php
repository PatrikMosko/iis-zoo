@extends('layouts.app')

@section('content')
    <h2>hey</h2>
    @foreach ($newExtTraining->trainings as $training)
        <p>
            {{ $training }}
        </p>
    @endforeach
@endsection
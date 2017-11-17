@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit feeding</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('feeding.index') }}"> Back </a>
            </div>
        </div>
    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::model($feeding, ['method' => 'PATCH','route' => ['feeding.update', $feeding->id]]) !!}
    {{csrf_field()}}
    {{ method_field('PATCH') }}

    @include('Feeding/form')
    {!! Form::close() !!}

@endsection
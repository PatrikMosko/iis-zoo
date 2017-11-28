@extends('layouts.app')

@section('content')
    <h1 class="text-center">Update animal type</h1>
{{$animal_type}}
    {!! Form::model($animal_type, ['method' => 'PATCH','route' => ['animals.update_type', $animal_type->id]]) !!}

    {{csrf_field()}}
    {{ method_field('PATCH') }}

    {{--{{ Form::open(array('route' => 'animals.update_type', $animal_type->id)) }}--}}

    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">

            <div class="form-group">
                <strong>Name</strong>
                {!! Form::text('type_name', null, ['placeholder' => 'please enter name...', 'class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                <strong>Description</strong>
                {!! Form::text('description', null, ['placeholder' => 'please enter description...', 'class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

    <div class="row">
        <a href="{{ route('animals.index')  }}" class="btn btn-default pull-right">back</a>
    </div>

    {!! Form::close() !!}

@endsection

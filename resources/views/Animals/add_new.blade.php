@extends('layouts.app')

@section('content')
    <h1 class="text-center">Add new animal</h1>

    {{ Form::open(array('route' => 'animals.store')) }}


    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">

            <div class="form-group">
                <strong>Name</strong>
                {!! Form::text('name', null, ['placeholder' => 'please enter name...', 'class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                <strong>Type:</strong>
                {!! Form::select('animal_types[]', $all_types , null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                <strong>Outlet:</strong>
                {!! Form::select('outlet[]', $all_outlets , null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                <strong>Birth date:</strong>
                <div class='input-group date' id='date_picker'>
                    {!!Form::text('birth_date', null,
                        array('class' => 'form-control', 'placeholder' => 'please enter date...'))
                    !!}
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>

            <div class="form-group">
                <strong>Birth country</strong>
                {!! Form::text('birth_country', null, ['placeholder' => 'please enter country...', 'class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                <strong>Parent:</strong>
                {!! Form::select('parent', array('Unknown' => 'Unknown')+ $all_animals , null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                <strong>Place of animal occurrence</strong>
                {!! Form::text('occurrence', null, ['placeholder' => 'please enter animal occurrence...', 'class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                <strong>Description</strong>
                {!! Form::text('description', null, ['placeholder' => 'please enter description...', 'class' => 'form-control']) !!}
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

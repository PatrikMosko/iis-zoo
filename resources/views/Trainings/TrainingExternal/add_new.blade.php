@extends('layouts.app')

@section('content')
    <div class="row text-center">
        <div class="col-md-12">
            <h1>add new </h1>
        </div>
    </div>

    {{ Form::open(array('route' => ['trainingExternal.store'])) }}

    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="form-group">
                <strong>Date</strong>
                <div class="input-group date" id="date_picker">
                    {!!Form::text('date', null,
                        array('class' => 'form-control', 'placeholder' => 'enter date of cleaning...'))
                    !!}
                    <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
                </div>
            </div>
            <div class="form-group">
                <strong>Time</strong>
                <div class="input-group date" id="time_picker">
                    {!!Form::text('time', null,
                        array('class' => 'form-control', 'placeholder' => 'enter expected cleaning time...'))
                    !!}
                    <span class="input-group-addon">
                    <span class="glyphicon glyphicon-time"></span>
                </span>
                </div>
            </div>
            <div class="form-group">
                <strong>Name</strong>
                {!! Form::text('name', null, ['placeholder' => 'please enter address...', 'class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <strong>Outlet type</strong>
                {!! Form::select('outlet_types[]', $outlet_types + ['none' => 'none'], null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <strong>Animal type</strong>
                {!! Form::select('animal_types[]', $animal_types + ['none' => 'none'], null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <strong>Users</strong>
                {!! Form::select('user[]', $users , null, ['class' => 'selectpicker',
                                                              'multiple' => '',
                                                              'data-live-search' => 'true',
                                                              'data-width' => '100%']) !!}
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
        <a href="{{ route('trainings.index')  }}" class="btn btn-default pull-right">back</a>
    </div>

    {!! Form::close() !!}

@endsection
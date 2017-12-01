@extends('layouts.app')

@section('content')
    <h1 class="text-center">Add new cleaning</h1>

    {{ Form::open(array('route' => 'cleanings.store')) }}

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
                    {!!Form::text('cleaning_time', null,
                        array('class' => 'form-control', 'placeholder' => 'enter expected cleaning time...'))
                    !!}
                    <span class="input-group-addon">
                    <span class="glyphicon glyphicon-time"></span>
                </span>
                </div>
            </div>
            <div class="form-group">
                <strong>Cleaner</strong>
                {!! Form::select('cleaner[]', $users , null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <strong>Outlet</strong>
                {!! Form::select('outlet[]', $outlets, null, ['class' => 'form-control']) !!}
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
        <a href="{{ route('cleanings.index')  }}" class="btn btn-default pull-right">back</a>
    </div>

    {!! Form::close() !!}


@endsection
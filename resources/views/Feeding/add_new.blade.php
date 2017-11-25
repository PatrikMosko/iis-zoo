@extends('layouts.app')

@section('content')
    <h1 class="text-center">Add new feeding</h1>

    {{ Form::open(array('route' => 'feeding.store')) }}

    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="form-group">
                <strong>Date&time:</strong>
                <div class='input-group date' id='datetimepicker1'>
                    {!!Form::text('date_time', null,
                        array('class' => 'form-control', 'placeholder' => 'please enter date and time...'))
                    !!}
                    <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
                </div>
            </div>
            <div class="form-group">
                <strong>Handler:</strong>
                {!! Form::select('handler[]', $users , null, ['class' => 'form-control']) !!}
            </div>
            {{--<div class="form-group">--}}
            {{--<strong>Outlet:</strong>--}}
            {{--{!! Form::text('outlet', , ['class' => 'form-control']) !!}--}}
            {{--</div>--}}
            <strong>Amount of food</strong>
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        {!! Form::text('amount', null, ['placeholder' => 'please enter amount...', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::select('unit', ['g' => 'g', 'kg' => 'kg'], null , ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <strong>Animal</strong>
                {!! Form::select('animal[]', $animals, null, ['class' => 'form-control']) !!}
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
        <a href="{{ route('feeding.index')  }}" class="btn btn-default pull-right">back</a>
    </div>

    {!! Form::close() !!}


@endsection
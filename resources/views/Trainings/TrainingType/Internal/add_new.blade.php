{{--@extends('layouts.app')--}}

{{--@section('content')--}}
    {{--<div class="row text-center">--}}
        {{--<div class="col-md-12">--}}
            {{--<h1>Internal add</h1>--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--{{ Form::open(array('route' => array('trainings.store_type', 'internal' => 'internal'))) }}--}}

    {{--<div class="row">--}}
        {{--<div class="col-md-3"></div>--}}
        {{--<div class="col-md-6">--}}
            {{--<div class="form-group">--}}
                {{--<strong>Place</strong>--}}
                {{--{!! Form::text('place', null, ['placeholder' => 'please enter name of place where will be training...', 'class' => 'form-control']) !!}--}}
            {{--</div>--}}

            {{--<div class="form-group">--}}
                {{--<strong>Outlet Type:</strong>--}}
                {{--{!! Form::select('outlet_types[]', $outlet_types + ['none'=>'none'] , null, ['class' => 'form-control']) !!}--}}
            {{--</div>--}}

            {{--<div class="form-group">--}}
                {{--<strong>Animal type:</strong>--}}
                {{--{!! Form::select('animal_types[]', $animal_types , null, ['class' => 'form-control']) !!}--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-xs-12 col-sm-12 col-md-12 text-center">--}}
            {{--<button type="submit" class="btn btn-primary">Submit</button>--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--<div class="row">--}}
        {{--<a href="{{ route('trainings.index')  }}" class="btn btn-default pull-right">back</a>--}}
    {{--</div>--}}

    {{--{!! Form::close() !!}--}}

{{--@endsection--}}
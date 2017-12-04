@extends('layouts.app')

@section('content')
    <div class="row text-center">
        <div class="col-md-12">
            <h1>External add</h1>
        </div>
    </div>

    {{ Form::open(array('route' => array('trainings.store_type', 'external' => 'external'))) }}

    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="form-group">
                <strong>Company</strong>
                {!! Form::text('name', null, ['placeholder' => 'please enter name ...', 'class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <strong>Address</strong>
                {!! Form::text('address', null, ['placeholder' => 'please enter address...', 'class' => 'form-control']) !!}
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
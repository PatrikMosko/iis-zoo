@extends('layouts.app')

@section('content')
    <div class="row text-center">
        <div class="col-lg-12 margin-tb">
            <h2>Edit my account</h2>
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

    {!! Form::model($user, ['method' => 'PATCH','route' => ['settingsUser.update', $user->id]]) !!}
    {{csrf_field()}}{{ method_field('PATCH') }}

    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="form-group">
                <strong>User name:</strong>
                {!! Form::text('user_name', null, array('placeholder' => 'user_name','class' => 'form-control')) !!}
            </div>
            <div class="form-group">
                <strong>Email:</strong>
                {!! Form::text('email', null, array('placeholder' => 'email','class' => 'form-control')) !!}
            </div>
            <div class="form-group">
                <strong>Full name:</strong>
                {!! Form::text('full_name', null, array('placeholder' => 'full name','class' => 'form-control')) !!}
            </div>
            <div class="form-group">
                <strong>Phone:</strong>
                {!! Form::text('phone', null, array('placeholder' => 'email','class' => 'form-control')) !!}
            </div>
            <span><strong>Birth date</strong></span>
            <div class="form-group input-group date" id="date_picker">
                {!!Form::text('birth_date', null,
                    array('class' => 'form-control', 'placeholder' => 'click to calendar to open dialog...'))
                !!}
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
            </span>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>



    {!! Form::close() !!}


@endsection
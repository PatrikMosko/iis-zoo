@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <h2>cleanings</h2>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('cleanings.create')  }}" class="btn btn-info">
                <span class="glyphicon glyphicon-plus"></span>
                Add new
            </a>
        </div>
    </div>
    @foreach($cleanings as $cleaning)
        <div class="border" style="border: 1px solid lightgray; padding: 30px; margin-top: 20px">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <strong>Date</strong>
                            <h3>{{ $cleaning->date }}</h3>
                        </div>
                        <div class="col-md-4">
                            <strong>Time</strong>
                            <h3>{{ $cleaning->cleaning_time }}</h3>
                        </div>
                        <div class="col-md-4">
                            <strong>Outlet</strong>
                            <h3>{{ $cleaning->outlets->name }}</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <br>
                            <strong>Description:  </strong>
                            {{ $cleaning->description }}
                        </div>
                    </div>
                    <div class="row">
                        @foreach($cleaning->users as $user)
                            <div class="col-md-4" style="margin-top: 40px">
                                <a href="{{ route('settings.show', $user->id) }}" style="display:block;margin-bottom: 10px"> {{ $user->user_name }} </a>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['cleanings.remove', $cleaning->id, $user->id, count($cleaning->users)],
                                                            'style'=>'display:inline',]) !!}
                                {{Form::button('<i class="glyphicon glyphicon-remove"></i>Remove',
                                               array('type'  => 'submit',
                                                     'class' => 'btn btn-danger'))}}
                                {!! Form::close() !!}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-right">
                    {!! Form::open(['method' => 'DELETE', 'route' => ['cleanings.destroy', $cleaning->id],
                                                            'style'=>'display:inline',]) !!}
                    {{Form::button('<i class="glyphicon glyphicon-remove"></i>Delete',
                                               array('type'  => 'submit',
                                                     'class' => 'btn btn-danger'))}}
                    {!! Form::close() !!}
                    {!! Form::open(['method' => 'GET', 'route' => ['cleanings.edit', $cleaning->id],
                                                            'style'=>'display:inline',]) !!}
                    {{Form::button('<i class="glyphicon glyphicon-edit"></i>Edit',
                                               array('type'  => 'submit',
                                                     'class' => 'btn btn-primary'))}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    @endforeach

@endsection
@extends('layouts.app')

@section('content')

    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))

                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
        @endforeach
    </div> <!-- end .flash-message -->

    <div class="row">
        <div class="col-md-6">
            <h2>cleanings</h2>
        </div>
        @if($is_admin)
        <div class="col-md-6 text-right">
            <a href="{{ route('cleanings.create')  }}" class="btn btn-info">
                <span class="glyphicon glyphicon-plus"></span>
                Add new
            </a>
        </div>
        @endif
    </div>
    <div class="row">
    @foreach($cleanings as $cleaning)
        <div class="col-md-6">
            <div class="border" style="border: 1px solid lightgray; padding: 30px; margin-top: 20px">
                <div class="row">
                    <div class="col-md-4">
                        <strong>Date</strong>
                        <h4>{{ $cleaning->date }}</h4>
                    </div>
                    <div class="col-md-4">
                        <strong>Time</strong>
                        <h4>{{ $cleaning->cleaning_time }}</h4>
                    </div>
                    <div class="col-md-4">
                        <strong>Outlet</strong>
                        <h4>{{ $cleaning->outlets->name }}</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <br>
                        <strong>Description:  </strong>
                        {{ $cleaning->description }}
                    </div>
                </div>
                @if($is_admin)
                <hr>
                <div class="row">
                    @foreach($cleaning->users as $user)
                        <div class="col-md-6" style="margin-top: 18px; margin-bottom: 18px">
                            <div class="border" style="border: 1px solid lightgray; padding: 15px;">
                                <p style="display: block">
                                    <strong>User name:</strong>
                                    <a href="{{ route('settings.show', $user->id) }}"
                                       style="margin-bottom: 10px; font-size: 1.1em; margin-top: 0.5em;">
                                       {{ $user->user_name }}
                                    </a>
                                </p>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['cleanings.remove',
                                                $cleaning->id, $user->id, count($cleaning->users)],
                                                            'style'=>'display:inline',]) !!}
                                {{Form::button('<i class="glyphicon glyphicon-remove"></i> Remove',
                                               array('type'  => 'submit',
                                                     'class' => 'btn btn-danger'))}}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    @endforeach
                </div>

                    <div class="flash-message">
                        @if(Session::has('alert-success-'.$cleaning->id))
                            <p class="alert alert-success">{{ Session::get('alert-success-'. $cleaning->id) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                        @endif
                    </div> <!-- end .flash-message -->

                <div class="row" style="margin-top: 20px">
                    <div class="col-md-12 text-right">
                        {!! Form::open(['method' => 'GET', 'route' => ['cleanings.edit', $cleaning->id],
                                            'style'=>'display:inline',]) !!}
                        {{Form::button('<i class="glyphicon glyphicon-edit"></i> Edit',
                                                   array('type'  => 'submit',
                                                         'class' => 'btn btn-primary'))}}
                        {!! Form::close() !!}
                        {!! Form::open(['method' => 'DELETE', 'route' => ['cleanings.destroy', $cleaning->id],
                                                                'style'=>'display:inline',]) !!}
                        {{Form::button('<i class="glyphicon glyphicon-remove"></i> Delete',
                                                   array('type'  => 'submit',
                                                         'class' => 'btn btn-danger'))}}
                        {!! Form::close() !!}
                    </div>
                </div>
                @endif
            </div>
        </div>
    @endforeach

    </div>
    <hr style="height:30px; visibility:hidden;" />
@endsection
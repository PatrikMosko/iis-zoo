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
        @if($is_admin)
        <div class="col-md-6">
            <h2>Feedings</h2>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('feeding.create')  }}" class="btn btn-info">
                <span class="glyphicon glyphicon-plus"></span>
                Add new
            </a>
        </div>
            @else
            <div class="col-md-6">
                <h2>My feedings</h2>
            </div>
        @endif
    </div>
    <div class="row">
    @foreach($all_feedings as $feeding)
        <div class="col-md-6">
            <div class="border" style="border: 1px solid lightgray; padding: 30px; margin-top: 20px">
                <div class="row">
                    <div class="col-md-6">
                        <strong>Date</strong>
                        <h4>{{ $feeding->date }}</h4>
                    </div>
                    <div class="col-md-6">
                        <strong>Time</strong>
                        <h4>{{ $feeding->time }}</h4>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <strong>Feeder</strong>
                        <a href="{{ route('settings.show', $feeding->users->id) }}"
                           style="display:block; font-size: 1.1em; margin-top: 0.5em;">
                           {{ $feeding->users->user_name }}
                        </a>
                    </div>
                    <div class="col-md-6">
                        <strong>Amount of food</strong>
                        <h4>{{ $feeding->amount_of_food }} {{ $feeding->unit }}</h4>
                    </div>
                </div>
            <div class="row">
                <div class="col-md-12">
                    <br>
                    <strong>Description:</strong>
                    {{ $feeding->description }}
                </div>
            </div>
            @if($is_admin)
            <div class="row">
                <hr>
                @foreach($feeding->animals as $animal)
                    <div class="col-md-6" style="margin-top: 18px; margin-bottom: 18px">
                        <div class="border" style="border: 1px solid lightgray; padding: 15px;">
                            <p style="display: block">
                                <strong>Animal: </strong>
                                <a href="{{ route('animals.show', $animal->id) }}"> {{ $animal->name }} </a>
                            </p>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['feeding.remove', $feeding->id, $animal->id, count($feeding->animals)],
                                                        'style'=>'display:inline']) !!}
                            {{Form::button('<i class="glyphicon glyphicon-remove"></i> Remove',
                                           array('type'  => 'submit',
                                                 'class' => 'btn btn-danger'))}}
                            {!! Form::close() !!}
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="flash-message">
                    @if(Session::has('alert-success-'.$feeding->id))
                        <p class="alert alert-success">{{ Session::get('alert-success-'. $feeding->id) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                    @endif
            </div> <!-- end .flash-message -->

            <div class="row" style="margin-top: 20px">
                <div class="col-md-12 text-right">
                    {!! Form::open(['method' => 'GET', 'route' => ['feeding.edit', $feeding->id],
                                        'style'=>'display:inline']) !!}
                    {{Form::button('<i class="glyphicon glyphicon-edit"></i> Edit',
                                               array('type'  => 'submit',
                                                     'class' => 'btn btn-primary'))}}
                    {!! Form::close() !!}
                    {!! Form::open(['method' => 'DELETE', 'route' => ['feeding.destroy', $feeding->id],
                                                            'style'=>'display:inline']) !!}
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
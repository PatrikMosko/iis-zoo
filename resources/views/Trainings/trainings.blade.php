@extends('layouts.app')

@section('content')

    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))

                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
        @endforeach
    </div> <!-- end .flash-message -->

    @if(!$is_admin)
    <div class="row">
        <div class="col-md-12">
            <h2>My Trainings</h2>
        </div>
    </div>
    <div class="row">
        @foreach($logged_user_trainings as $training)
        @if($training->trainingable)
        <div class="col-md-4">
            <div class="border" style="border: 1px solid lightgray; padding: 30px; margin-top: 20px; ">
                @if($training->trainingable->company_name)
                    <h4 class="text-center" style="margin-bottom: 30px"> External company</h4>
                    <p>
                        <strong>Company name:</strong> {{ $training->trainingable->company_name }}
                    </p>
                    <p>
                        <strong>address:</strong> {{ $training->trainingable->company_address }}
                    </p>
                @else
                    <h4 class="text-center" style="margin-bottom: 30px"> Internal</h4>
                    <p>
                        <strong>Place:</strong>
                        <em>{{ $training->trainingable->place }}</em>
                    </p>
                @endif

                <p><strong>Name:</strong> <em>{{$training->name}}</em></p>
                <p><strong>Date:</strong> <em>{{$training->date}}</em></p>
                <p><strong>For outlet type:</strong> <em>{{$training->outlet_types['name']}}</em></p>
                <p><strong>For animal type:</strong> <em>{{$training->animal_types['type_name']}}</em></p>
            </div>
            {{-- add row after each 3 columns --}}
            @if ($loop->iteration % 3 == 0)
                </div>
                <div class="row">
            @endif
        </div>
        @endif
        @endforeach
    </div>

    @endif

    @if($is_admin)

    <div class="row">
        <div class="col-md-12">
            <h2>All available Trainings</h2>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-md-5">
            <div class="border" style="border: 1px solid lightgray; padding: 0 30px 30px; margin-top: 20px">

                <h3 style="margin-bottom: 20px">create new training location</h3>

                <a href="{{ route('trainings.create_type', ['type' => 'external']) }}" class="btn btn-info">
                    <span class="glyphicon glyphicon-plus"></span>
                    External Company
                </a>
                <a href="{{ route('trainings.create_type', ['type' => 'internal']) }}" class="btn btn-info">
                    <span class="glyphicon glyphicon-plus"></span>
                    Internal location
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <h2>External</h2>
            @foreach ($all_external_trainings as $external_collection)
                <div class="border" style="border: 1px solid lightgray; padding: 0 30px 30px; margin-top: 20px">
                    <h3 style="margin-top: 30px;"><strong>Company:</strong> <em>{{$external_collection->company_name}}</em></h3>
                    <hr/>
                    <h4>
                        <strong>Address: </strong>
                    </h4>
                    <em>{{$external_collection->company_address}}</em>

                    <div class="row" style="margin-top: 20px">
                        <div class="col-md-12">
                            <a href="{{ route('trainingExternal.create', $external_collection->id)  }}" class="btn btn-info">
                                <span class="glyphicon glyphicon-plus"></span>
                                add new training
                            </a>
                            {{--<a href="#" class="btn btn-primary">--}}
                                {{--<span class="glyphicon glyphicon-edit"></span>--}}
                                {{--Edit--}}
                            {{--</a>--}}
                            {{--<a href="#" class="btn btn-danger">--}}
                                {{--<span class="glyphicon glyphicon-remove"></span>--}}
                                {{--Remove--}}
                            {{--</a>--}}
                        </div>
                    </div>
                    <hr>
                    <h3 style="margin-top: 30px;">Available Trainings</h3>

                @foreach ($external_collection->trainings as $training_e)
                    @if(!is_null($training_e))
                    <div class="row">
                        <div class="col-md-12">
                            <br>
                            <p><strong>Name:</strong> <em> {{ $training_e->name }} </em></p>
                            <p><strong>Date:</strong> <em> {{ $training_e->date }} </em></p>
                            <p><strong>Time:</strong> <em> {{ $training_e->time }} </em></p>
                            @if($training_e->outlet_types['name'])
                                <p><strong>For outlet type:</strong> <em> {{ $training_e->outlet_types['name']}} </em></p>
                            @endif
                            @if($training_e->animal_types['type_name'])
                                <p><strong>For animal type:</strong> <em> {{ $training_e->animal_types['type_name']}} </em></p>
                            @endif

                            <p><strong>Users in training:</strong>
                                @foreach($training_e->users as $user)
                                    <a href="{{ route('settings.show', $user->id) }}">{{$user->user_name}}  </a>
                                @endforeach
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            {{--<a href="#" class="btn btn-success" style="margin-top: 5px;">--}}
                                {{--<span class="glyphicon glyphicon-ok"></span>--}}
                                {{--Done--}}
                            {{--</a>--}}
                            {{--<a href="#" class="btn btn-primary" style="margin-top: 5px;">--}}
                                {{--<span class="glyphicon glyphicon-edit"></span>--}}
                                {{--Edit--}}
                            {{--</a>--}}
                            @if($is_admin)
                                {!! Form::open(['method' => 'GET', 'route' => ['trainingExternal.edit', $training_e->id], 'style'=>'display:inline']) !!}
                                {{ Form::button('<span class="glyphicon glyphicon-edit"></span> Edit', array('type'  => 'submit','class' => 'btn btn-primary'))}}
                                {!! Form::close() !!}

                                {!! Form::open(['method' => 'DELETE', 'route' => ['trainingExternal.remove', $training_e->id, $loop->count, $external_collection->id], 'style'=>'display:inline']) !!}
                                {{Form::button('<span class="glyphicon glyphicon-remove"></span> Delete',array('type'  => 'submit', 'class' => 'btn btn-danger'))}}
                                {!! Form::close() !!}
                            @endif
                        </div>
                    </div>
                <hr/>
                    @endif
                @endforeach
                </div>
            @endforeach
        </div>

        <div class="col-md-6">

            <h2>Internal</h2>

            @foreach ($all_internal_trainings as $internal_collection)
                <div class="border" style="border: 1px solid lightgray; padding: 0 30px 30px; margin-top: 20px">
                    <h3 style="margin-top: 30px;">
                        <strong>Our zoo</strong>
                    </h3>

                    <h4>
                        <hr/><strong>Location: </strong>
                    </h4>
                    <em>{{$internal_collection->place}}</em>

                    <div class="row" style="margin-top: 20px">
                        <div class="col-md-12">
                            <a href="{{ route('trainingInternal.create', $internal_collection->id) }}" class="btn btn-info">
                                <span class="glyphicon glyphicon-plus"></span>
                                add training
                            </a>
                        </div>
                    </div>
                    <hr/>
                    <h3 style="margin-top: 30px;">Available Trainings</h3>

                @foreach ($internal_collection->trainings as $training_i)
                    <br/>
                    <div class="row">
                        <div class="col-md-12">
                            <p><strong>Name:</strong> <em>{{ $training_i->name }}</em></p>
                            <p><strong>Date:</strong> <em>{{ $training_i->date }}</em></p>
                            <p><strong>Time:</strong> <em>{{ $training_i->time }}</em></p>
                            @if($training_i->outlet_types['name'])
                                <p><strong>For outlet type:</strong> <em> {{ $training_i->outlet_types['name']}} </em></p>
                            @endif
                            @if($training_i->animal_types['type_name'])
                                <p><strong>For animal type:</strong> <em> {{ $training_i->animal_types['type_name']}} </em></p>
                            @endif
                            <p><strong>Users in training:</strong>
                            @foreach($training_i->users as $user)
                                    <a href="{{ route('settings.show', $user->id) }}">{{$user->user_name}} </a>
                            @endforeach
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('trainingInternal.edit', $training_i->id) }}" class="btn btn-primary">
                                <span class="glyphicon glyphicon-edit"></span>
                                Edit
                            </a>

                                {!! Form::open(['method' => 'DELETE', 'route' => ['trainingInternal.remove', $training_i->id, $loop->count, $internal_collection->id], 'style'=>'display:inline']) !!}
                                    {{Form::button('<span class="glyphicon glyphicon-remove"></span> Delete',array('type'  => 'submit', 'class' => 'btn btn-danger'))}}
                                {!! Form::close() !!}
                        </div>
                    </div>
                    <hr/>
                @endforeach

                </div>
            @endforeach
        </div>
    </div>
    <hr style="height:30px; visibility:hidden;" />
    @endif

    @if($is_admin)
        <div class="row">
            <div class="col-md-12">
                <h2>My Trainings</h2>
            </div>
        </div>
        <div class="row">
{{--         @if(!$logged_user_trainings)--}}
            @foreach($logged_user_trainings as $training)
                @if($training->trainingable)
                <div class="col-md-4">
                    <div class="border" style="border: 1px solid lightgray; padding: 30px; margin-top: 20px; ">
                                @if($training->trainingable->company_name)
                                    <h4 class="text-center" style="margin-bottom: 30px"> External company</h4>
                                    <p>
                                        <strong>Company name:</strong> {{ $training->trainingable->company_name }}
                                    </p>
                                    <p>
                                        <strong>address:</strong> {{ $training->trainingable->company_address }}
                                    </p>
                                @else
                                    <h4 class="text-center" style="margin-bottom: 30px"> Internal</h4>
                                    <p>
                                        <strong>Place:</strong>
                                        <em>{{ $training->trainingable->place }}</em>
                                    </p>
                                @endif

                                <p><strong>Name:</strong> <em>{{$training->name}}</em></p>
                                <p><strong>Date:</strong> <em>{{$training->date}}</em></p>
                                <p><strong>For outlet type:</strong> <em>{{$training->outlet_types['name']}}</em></p>
                                <p><strong>For animal type:</strong> <em>{{$training->animal_types['type_name']}}</em></p>
                            </div>
                            {{-- add row after each 3 columns --}}
                            @if ($loop->iteration % 3 == 0)
                        </div>
                        <div class="row">
                            @endif
                        </div>
                    @endif
                    @endforeach
                     {{--@endif--}}
                </div>

                <hr/>
            @endif
        @endsection

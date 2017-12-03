@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>My Trainings</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="border" style="border: 1px solid lightgray; padding: 30px; margin-top: 20px">
                <p>
                    <strong>Company:</strong> <em>SolarWinds</em>
                    <span>- external</span>
                </p>
                <p><strong>Name:</strong> <em>Training for Bird outlets</em></p>
                <p><strong>Date:</strong> <em>2017-12-01</em></p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h2>All available Trainings</h2>
        </div>
    </div>
    @if($is_admin)
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
    @endif

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
                        @if($is_admin)
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
                        @endif
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
                            {!! Form::open(['method' => 'DELETE', 'route' => ['trainingExternal.destroy', $training_e->id], 'style'=>'display:inline',]) !!}
                                {{Form::button('<span class="glyphicon glyphicon-remove"></span> Delete',array('type'  => 'submit', 'class' => 'btn btn-danger'))}}
                            {!! Form::close() !!}

                            {!! Form::open(['method' => 'GET', 'route' => ['trainingExternal.edit', $training_e->id], 'style'=>'display:inline']) !!}
                                {{ Form::button('<span class="glyphicon glyphicon-edit"></span> Edit', array('type'  => 'submit','class' => 'btn btn-primary'))}}
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
                        @if($is_admin)
                        <div class="col-md-12">
                            <a href="{{ route('trainingInternal.create')  }}" class="btn btn-info">
                                <span class="glyphicon glyphicon-plus"></span>
                                add training
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
                        @endif
                    </div>
                    <hr/>
                    <h3 style="margin-top: 30px;">Available Trainings</h3>

                @foreach ($internal_collection->trainings as $training_i)
                    <br/>
                    <div class="row">
                        <div class="col-md-12">
                            <p><strong>Name:</strong> <em>{{ $training_i->name }}</em></p>
                            <p><strong>Date:</strong> <em>{{ $training_i->date }}</em></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            {{--<a href="#" class="btn btn-success" style="margin-top: 5px;">--}}
                                {{--<span class="glyphicon glyphicon-ok"></span>--}}
                                {{--Done--}}
                            {{--</a>--}}
                            @if($is_admin)
                            <a href="#" class="btn btn-primary" style="margin-top: 5px;">
                                <span class="glyphicon glyphicon-edit"></span>
                                Edit
                            </a>
                            <a href="#" class="btn btn-danger" style="margin-top: 5px;">
                                <span class="glyphicon glyphicon-remove"></span>
                                Remove
                            </a>
                            @endif
                        </div>
                    </div>
                    <hr/>
                @endforeach

                </div>
            @endforeach
        </div>
    </div>
    <hr style="height:30px; visibility:hidden;" />
@endsection

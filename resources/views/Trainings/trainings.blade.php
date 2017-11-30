@extends('layouts.app')

@section('content')
    <div class="row">
        <h1>My Finished Trainings</h1>
    </div>
    <hr/>

    <div class="well invisible"></div>

    <div class="row">
        <h1>All available Trainings</h1>
    </div>
    <hr/>

    <div class="row">
        <div class="col-md-5">
            <h1>external</h1>
            @foreach ($all_external_trainings as $external_collection)
                <h3 style="margin-top: 60px;"><strong>Company:</strong> <em>{{$external_collection->company_name}}</em></h3>
                <hr/>
                <p>
                    <strong>Address: </strong>{{$external_collection->company_address}}
                </p>

                <hr/>

                <h4 style="margin-top: 30px;">Available Trainings</h4>

                @foreach ($external_collection->trainings as $training_e)
                    <div class="row">
                        <div class="col-md-8">
                            <strong>Name:</strong> {{ $training_e->name }}
                            <strong>Date:</strong> {{ $training_e->date }}

                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-default" style="margin-top: 5px; display: block;">Done</button>
                            <button class="btn btn-default" style="margin-top: 5px; display: block;">Edit</button>
                            <button class="btn btn-default" style="margin-top: 5px; display: block;">Remove</button>
                        </div>
                    </div>
                <hr/>
                @endforeach

                <a href="#" class="btn btn-default">add new training in {{$external_collection->company_name}} </a>

                <hr/>
            @endforeach
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-5">

            <h1>internal</h1>

            @foreach ($all_internal_trainings as $internal_collection)
                <h3 style="margin-top: 60px;">Our zoo</h3>

                <hr/><strong>location: </strong>{{$internal_collection->place}}<hr/>

                <h4 style="margin-top: 30px;">Available Trainings</h4>

                @foreach ($internal_collection->trainings as $training_i)

                <div class="row">
                    <div class="col-md-8">
                        <strong>Name:</strong> {{ $training_e->name }}
                        <strong>Date:</strong> {{ $training_e->date }}
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-default" style="margin-top: 5px; display: block;">Done</button>
                        <button class="btn btn-default" style="margin-top: 5px; display: block;">Edit</button>
                        <button class="btn btn-default" style="margin-top: 5px; display: block;">Remove</button>
                    </div>
                </div>
                <hr/>
                @endforeach

                <a href="#" class="btn btn-default">add new </a> internal training in {{$internal_collection->place}}

                <hr/>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>create new training type</h3>
            <a href="#" class="btn btn-default">External Company</a>
            <a href="#" class="btn btn-default">Internal location</a>
        </div>
    </div>
@endsection

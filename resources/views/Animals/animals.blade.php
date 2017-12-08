@extends('layouts.app')

@section('content')

    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))

                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
        @endforeach
    </div> <!-- end .flash-message -->

    <h2>animals</h2><br>

    <!-- Table -->
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Outlet</th>
            <th>Birth Date</th>
            <th>Birth Country</th>
            <th>Parent</th>
            <th>Place of animal occurrence</th>
            <th>Decription</th>
            <th>Action</th>
        </tr>
        @if($animals->count())
            @foreach($animals as $animal)
                <tr>
                    <td>{{ $animal->name }}</td>
                    <td>{{ $animal->animal_types->type_name }}</td>
                    <td>{{ $animal->outlet->name }}</td>
                    <td>{{ $animal->birth_date }}</td>
                    <td>{{ $animal->birth_country }}</td>
                    <td>{{ $animal->parent }}</td>
                    <td>{{ $animal->occurrence_place }}</td>
                    <td>{{ $animal->description }}</td>
                    <td>
                        <a class="btn btn-default" href="{{ route('animals.show',$animal->id) }}">Detail</a>
                        <a href="{{ route('animals.edit', $animal->id) }}" class="btn btn-primary">Edit</a>

                        {!! Form::open(['method' => 'DELETE','route' => ['animals.destroy', $animal->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}

                    </td>
                </tr>
            @endforeach
        @else
        <tr>
            <td colspan="9">Result not found.</td>
        </tr>
        @endif
    </table>

    <div class="row">
        <div class="col-md-6">
            <form method="GET" action="{{ route('animals.index') }}" style="margin-bottom: 30px;">
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="search" class="form-control" placeholder="Search" value="{{ $searched_value }}">
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-success">Search</button>
                        <a href="{{ url('/Animals/animals') }}" class="btn btn-info">
                            Show all
                        </a>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <div class="pull-right">
                <a href="{{ route('animals.create')  }}" class="btn btn-default">
                    <span class="glyphicon glyphicon-plus"></span>
                    Add new
                </a>
            </div>
        </div>
    </div>

    @include('Animals/AnimalType/animal_type')

    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <a href="{{ route('animals.create_type')  }}" class="btn btn-default">
                    <span class="glyphicon glyphicon-plus"></span>
                    Add new
                </a>
            </div>
        </div>
    </div>

    <div class="well invisible"></div>

@endsection
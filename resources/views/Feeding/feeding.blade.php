@extends('layouts.app')

@section('content')
    <h2>feeding</h2>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <!-- Table -->
    <table class="table table-bordered">
        <tr>
            <th>Date&time</th>
            <th>Handler</th>
            <th>Outlet</th>
            <th>Amount of food</th>
            <th>Animal</th>
            <th>Decription</th>
            <th>Action</th>
        </tr>
        @foreach($all_feedings as $feeding)
            @foreach($feeding->animals as $animal)
            <tr>
                <td>{{ $feeding->date_time }}</td>
                <td>{{ $feeding->users->user_name }}</td>
                <td>{{ $animal->outlet->name }}</td>
                <td>{{ $feeding->amount_of_food }} {{ $feeding->unit }}</td>
                <td>{{ $animal->name }}</td>
                <td>{{ $feeding->description  }}</td>
                <td>
                    <a href="{{ route('feeding.edit', $feeding->id) }}" class="btn btn-primary">Edit</a>

                    {!! Form::open(['method' => 'DELETE','route' => ['feeding.destroy', $feeding->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        @endforeach
    </table>
    <div class="pull-right">
        <a href="{{ route('feeding.create')  }}" class="btn btn-default">
            <span class="glyphicon glyphicon-plus"></span>
            Add new
        </a>
    </div>
@endsection
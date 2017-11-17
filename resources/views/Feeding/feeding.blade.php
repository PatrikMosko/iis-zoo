@extends('layouts.app')

@section('content')
    <h2>feeding</h2>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <!-- Table -->
    <table class="table">
        <tr>
            <th>Date&time</th>
            <th>Handler</th>
            <th>Outlet</th>
            <th>Amount of food</th>
            <th>Animal</th>
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
                <td>
                    <a href="{{ route('feeding.edit', $feeding->id) }}" class="btn btn-default">Edit</a>
                    <a href="#" class="btn btn-default">Delete</a>
                </td>
            </tr>
            @endforeach
        @endforeach

    </table>
@endsection
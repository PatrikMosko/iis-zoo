@extends('layouts.app')

@section('content')


    <h2 style="font-family: 'Utopia'">cleanings</h2><br>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Date</th>
                <th>Cleaning time</th>
                <th>Cleaner</th>
                <th>Outlet</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        @foreach($cleanings as $cleaning)
            @foreach($cleaning->users as $user)
                <tr>
                    <td>
                        {{ $cleaning->date }}
                    </td>
                    <td>
                        {{ $cleaning->cleaning_time }}
                    </td>
                    <td>
                        <a href="{{ route('settings.show', $user->id) }}"> {{ $user->user_name }} </a>
                    </td>
                    <td>
                        {{ $cleaning->outlets->name }}
                    </td>
                    <td>
                        {{ $cleaning->description }}
                    </td>
                    <td>
                        <a href="{{ route('cleanings.edit', $cleaning->id) }}" class="btn btn-primary">Edit</a>

                        {!! Form::open(['method' => 'DELETE','route' => ['cleanings.destroy', $cleaning->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        @endforeach
    </table>

    <div class="pull-right">
        <a href="{{ route('cleanings.create')  }}" class="btn btn-default">
            <span class="glyphicon glyphicon-plus"></span>
            Add new
        </a>
    </div>


@endsection
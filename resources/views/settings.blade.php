@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Settings</h2>
            </div>

        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if ($message = Session::get('failed'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Username</th>
            <th>Role</th>
            <th>Email</th>
            <th>Full name</th>
            <th>Phone</th>
            <th>Date</th>
            <th>Account status</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->user_name}}</td>
                <td>
                    @if($user->role_id == 1) employee @else admin @endif
                </td>
                <td> {{ $user->email  }}</td>
                <td> {{ $user->full_name  }}</td>
                <td> {{ $user->phone }}</td>
                <td> {{ $user->birth_date }}</td>
                <td>
                    @if ($user->is_activated == 1) active @else inactive @endif
                </td>
                <td>
                    <a class="btn btn-default" href="{{ route('settings.show',$user->id) }}">Show detail</a>
                    <a class="btn btn-primary" href="{{ route('settings.edit',$user->id) }}">Edit</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['settings.destroy', $user->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>

    {{--{!! $users->links() !!}--}}
@endsection
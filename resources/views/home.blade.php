@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Dashboard</div>
            <div class="panel-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="panel panel-success">

                    @if(Auth::check())
                        <div class="panel-heading">List</div>
                        <!-- Table -->
                        <table class="table">
                            <tr>
                                <th>col 1</th>
                                <th>col 2</th>
                            </tr>
                        </table>
                    @endif

                </div>

                @if(Auth::guest())
                    <a href="/login" class="btn btn-info"> You need to login to see the content! >></a>
                @endif

                {{--<h2>{{ Auth::user()->user_name  }} You are logged in!</h2>--}}
                {{--<a href="{{ url('/') }}" class="btn btn-default">Go home</a>--}}

            </div>
        </div>
    </div>
</div>

@endsection

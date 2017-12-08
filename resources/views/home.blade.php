@extends('layouts.app')

@section('content')

<div class="row text-center">
    <div class="col-md-12">

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @if(Auth::check())
            <div class="row well">
                <span style="font-size: 20px">
                    Hello
                </span>

                <span style="font-size: 30px">
                    <strong>{{ auth()->user()->user_name }},</strong>
                </span><br>

                <span style="font-size: 20px">
                    today is
                </span>
                <span style="font-size: 30px">
                    <strong>{{ $now }}</strong>
                </span><br>
                <span style="font-size: 20px">
                    have a great day!
                </span>
            </div>
        @endif


        @if(Auth::guest())
            <a href="/login" class="btn btn-info"> You need to login to see the content! >></a>
        @endif

            </div>
        </div>
    </div>
</div>

@endsection

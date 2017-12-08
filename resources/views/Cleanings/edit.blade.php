@extends('layouts.app')

@section('content')
    <div class="row text-center">
        <div class="col-lg-12 margin-tb">
            <h2>Edit cleaning</h2>
        </div>
    </div>

    {!! Form::model($cleaning, ['method' => 'PATCH','route' => ['cleanings.update', $cleaning->id]]) !!}

    {{csrf_field()}}
    {{ method_field('PATCH') }}

    @include('Cleanings/form')

    {!! Form::close() !!}

    <div class="row">
        <div class="pull-right">
            <a class="btn btn-default" href="{{ route('cleanings.index') }}"> Back </a>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.selectpicker').selectpicker('val', {{ json_encode($users_check) }} );
        });
    </script>

@endsection
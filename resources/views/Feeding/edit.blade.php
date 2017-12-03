@extends('layouts.app')

@section('content')
    <div class="row text-center">
        <div class="col-lg-12 margin-tb">
            <h2>Edit feeding</h2>
        </div>
    </div>

    {!! Form::model($feeding, ['method' => 'PATCH','route' => ['feeding.update', $feeding->id]]) !!}

    {{csrf_field()}}
    {{ method_field('PATCH') }}

    @include('Feeding/form')

    {!! Form::close() !!}

    <div class="row">
        <div class="pull-right">
            <a class="btn btn-default" href="{{ route('feeding.index') }}"> Back </a>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.selectpicker').selectpicker('val', {{ json_encode($animals_check) }} );
        });
    </script>

@endsection
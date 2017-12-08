<h2>
    animal types
</h2><br>
<!-- Table -->
<table class="table table-bordered">
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Action</th>
    </tr>
    @foreach($animal_types as $animal_type)
        <tr>
            <td>{{ $animal_type->type_name }}</td>
            <td>{{ $animal_type->description }}</td>
            <td>
                {{--<a class="btn btn-default" href="{{ route('animalType.show',$animal->id) }}">Show detail</a>--}}

                <a href="{{ route('animals.edit_type', $animal_type->id) }}" class="btn btn-primary">Edit</a>

                {!! Form::open(['method' => 'DELETE','route' => ['animals.destroy_type', $animal_type->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
</table>

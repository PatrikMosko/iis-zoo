<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Date&time</strong>
            {{--{!! Form::text('user_name', null, array('placeholder' => 'user_name','class' => 'form-control')) !!}--}}
            todo
        </div>
        <div class="form-group">
            <strong>Handler:</strong>
            {!! Form::select('handler', $all_users , null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            <strong>Outlet:</strong>
            {!! Form::select('outlet', $all_outlet_names, null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            <strong>Amount of food</strong>
            {!! Form::text('amount', null, array('placeholder' => 'number','class' => 'form-control')) !!}
            {!! Form::select('unit', ['g' => 'g', 'kg' => 'kg'], null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <strong>Animal</strong>
            {!! Form::select('animal', $all_animal_names, null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

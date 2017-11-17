<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>User name:</strong>
            {!! Form::text('user_name', null, array('placeholder' => 'user_name','class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            <strong>email:</strong>
            {!! Form::text('email', null, array('placeholder' => 'email','class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            <strong>role:</strong>
            {!! Form::select('role', ['employee','admin'], null, ['class' => 'form-control']) !!}

        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

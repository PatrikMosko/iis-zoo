<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="form-group">
            <strong>Date&time:</strong>
            <div class="input-group date" id="datetimepicker1">
                {!!Form::text('date_time', $feeding->date_time,
                    array('class' => 'form-control', 'placeholder' => 'enter date and time'))
                !!}
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
        <div class="form-group">
            <strong>Handler:</strong>
            {!! Form::select('handler', $all_users, $actual_user, ['class' => 'form-control']) !!}
        </div>
        {{--<div class="form-group">--}}
            {{--<strong>Outlet:</strong>--}}
            {{--{!! Form::text('outlet', , ['class' => 'form-control']) !!}--}}
        {{--</div>--}}
        <strong>Amount of food</strong>
        <div class="row">
            <div class="col-md-9">
                <div class="form-group">
                    {!! Form::text('amount', $feeding->amount_of_food, ['placeholder' => 'please enter amount...', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::select('unit', ['g' => 'g', 'kg' => 'kg'], $feeding->unit , ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <strong>Animal</strong>
            {!! Form::select('animal', $all_animal_names, null, ['class' => 'form-control']) !!}
            {{--todo selected animal rip--}}
        </div>
        <div class="form-group">
            <strong>Description</strong>
            {!! Form::text('description', null, ['placeholder' => 'please enter description...', 'class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

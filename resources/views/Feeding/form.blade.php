<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="form-group">
            <strong>Date</strong>
            <div class="input-group date" id="date_picker">
                {!!Form::text('date', $feeding->date,
                    array('class' => 'form-control', 'placeholder' => 'enter date of cleaning...'))
                !!}
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
        <div class="form-group">
            <strong>Time</strong>
            <div class="input-group date" id="time_picker">
                {!!Form::text('time', $feeding->time,
                    array('class' => 'form-control', 'placeholder' => 'enter expected cleaning time...'))
                !!}
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-time"></span>
                </span>
            </div>
        </div>
        <div class="form-group">
            <strong>Handler:</strong>
            {!! Form::select('feeder[]', $users, $actual_user, ['class' => 'form-control']) !!}
        </div>
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
            <strong>Animals</strong>
            {!! Form::select('animals[]', $animals , null, ['class' => 'selectpicker',
                                                          'data-live-search' => 'true',
                                                          'multiple' => '',
                                                          'data-width' => '100%']) !!}
        </div>
        <div class="form-group">
            <strong>Description</strong>
            {!! Form::text('description', null, ['placeholder' => 'please enter description...', 'class' => 'form-control']) !!}
        </div>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

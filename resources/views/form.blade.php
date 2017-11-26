<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="form-group">
            <strong>User name:</strong>
            {!! Form::text('user_name', null, array('placeholder' => 'user_name','class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            <strong>Email:</strong>
            {!! Form::text('email', null, array('placeholder' => 'email','class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            <strong>Role:</strong>
            {!! Form::select('role', ['employee','admin'], null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            <strong>Full name:</strong>
            {!! Form::text('full_name', null, array('placeholder' => 'full name','class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            <strong>Phone:</strong>
            {!! Form::text('phone', null, array('placeholder' => 'email','class' => 'form-control')) !!}
        </div>
        <span><strong>Birth date</strong></span>
        <div class='form-group input-group date' id='just_date'>
            {!!Form::text('birth_date', null,
                array('class' => 'form-control', 'placeholder' => 'click to calendar to open dialog...'))
            !!}
            <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
            </span>
        </div>
        <div class="form-group">
            <strong>Account status:</strong>
            {!! Form::select('is_active', ['active','inactive'], $account_status+1, array('class' => 'form-control')) !!}
            {{-- $account_status+1 is hack ! because indexing started from 0 and ids are from 1  --}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

{{--<td> {{ $user->email  }}</td>--}}
{{--<td> {{ $user->full_name  }}</td>--}}
{{--<td> {{ $user->phone }}</td>--}}
{{--<td> {{ $user->birth_date }}</td>--}}
{{--<td>--}}
    {{--@if ($user->is_activated == 1) active @else inactive @endif--}}
{{--</td>--}}
{{--<td>--}}
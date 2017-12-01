<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="form-group">
            <strong>Date</strong>
            <div class='input-group date' id='datetimepicker1'>
                {!!Form::text('date', $cleaning->date,
                    array('class' => 'form-control', 'placeholder' => 'enter date of cleaning...'))
                !!}
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
        <div class="form-group">
            <strong>Time</strong>
            <div class='input-group date' id='datetimepicker1'>
                {!!Form::text('cleaning_time', $cleaning->cleaning_time,
                    array('class' => 'form-control', 'placeholder' => 'enter expected cleaning time...'))
                !!}
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-time"></span>
                </span>
            </div>
        </div>
        <div class="form-group">
            <strong>Cleaner</strong>
            {!! Form::select('cleaner[]', $users , null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            <strong>Outlet</strong>
            {!! Form::select('outlet[]', $outlets, null, ['class' => 'form-control']) !!}
        </div>
    </div>
    {{--<script type="text/javascript">--}}
    {{--$(function () {--}}
    {{--$('#datetimepicker3').datetimepicker({--}}
    {{--format: 'LT'--}}
    {{--});--}}
    {{--});--}}
    {{--</script>--}}
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

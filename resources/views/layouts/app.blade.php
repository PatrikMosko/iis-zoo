<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset("bower/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css")}}"/>
</head>
<body>
    <div id="app">
        @include('partials.navigation')
        {{--, array('isUserAdmin'=> $isUserAdmin))--}}
        <div class="container">
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.2/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.2/locale/sk.js"></script>

    {{--http://eonasdan.github.io/bootstrap-datetimepicker/--}}
    <script type="text/javascript" src="{{asset("bower/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js")}}"></script>

    <script type="text/javascript">
        $(function () {
            //http://eonasdan.github.io/bootstrap-datetimepicker/
            $('#datetimepicker1').datetimepicker({
                sideBySide: true,
                locale: 'sk', // sk or en
                //http://momentjs.com/docs/#/displaying/format/
                format: 'YYYY-MM-DD HH:mm:ss'
            });
        });
    </script>

</body>
</html>

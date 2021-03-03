<html lang='pt-br'>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="initial-scale=1, maximum-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Perfect Pay - Teste - @yield('title')</title>
    <link href="{{ asset('/images/brand/favicon.png') }}" rel="icon" type="image/png"/>
    <link rel="stylesheet" href="{{ asset('css/sweetalert.min.css') }}" />
    <link rel='stylesheet' href="{{ url('/css/app.css') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        .wrapper #wrapperContent, .wrapper #wrapperContent.closed {
            padding: 0;
        }
    </style>
</head>
<body>
<!-- NAVBAR TOP -->
@include('layouts.layout_header')
<div class='wrapper'>
    <div id='wrapperContent' class='content container-fluid'>
        <div id='main'>
            @yield('content')
        </div>
    </div>
</div>
<script src="{{ url('/js/app.js') }}"></script>
<script src="{{ asset('js/axios.min.js') }}"></script>
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/messages_pt_BR.min.js') }}"></script>
<script src="{{ asset('js/additional-methods.min.js') }}"></script>
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
<script src="{{ asset('js/jquery.maskMoney.min.js') }}"></script>
<script src="{{ asset('js/jquery.blockUI.min.js') }}"></script>
<script src="{{ asset('js/date_fns.min.js') }}"></script>
<script src="{{ asset('js/jquery.mask.min.js') }}"></script>
<script src="{{ asset('js/functions.js') }}"></script>
<script src="https://kit.fontawesome.com/d712964458.js" crossorigin="anonymous"></script>
@yield('script')
</body>
</html>

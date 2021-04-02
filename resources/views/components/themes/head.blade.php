<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="csrf-content" content="{{ csrf_field() }}" />

<title>{{ config('app.name') }} | {{ $page_name }}</title>

<link href="{{ asset('template/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('template/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
<link href="{{ asset('template/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
@stack('vendor-styles')
<link href="{{ asset('template/build/css/custom.min.css') }}" rel="stylesheet">
@stack('custom-styles')

@extends('theme', ['page_name' => $pageName, 'title' => $title])

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            {{ $slot }}
        </div>
    </div>
@endsection
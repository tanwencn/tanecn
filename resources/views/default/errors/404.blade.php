@extends('app')

@section('title') {{ __('Page not found') }} @endsection

@section('top_bar') true @endsection

@section('content')
    <div id="error-page" class="col-md-8 mx-auto text-center">
        <div class="box">
            <p class="text-center"><a href="{{ route('home') }}"><img
                            src="{{ option('web_log', asset('/vendor/laravel-blog/logo2.png')) }}"></a></p>
            <h3>{{ __('We are sorry - this page is not here anymore') }}</h3>
            <h4 class="text-muted">Error 404 - Page not found</h4>
            <p class="buttons"><a href="{{ route('home') }}" class="btn btn-template-outlined"><i
                            class="fa fa-home"></i> {{ __('Go to Homepage') }}</a></p>
        </div>
    </div>
@endsection
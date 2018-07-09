@extends('app')

@section('content')
        <div class="col-lg-6">
            <div class="box">
                <h2 class="text-uppercase">{{ __('Sign Up') }}</h2>
                <hr>
                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="email-login">{{ __('Email') }}</label>
                        <input id="email-login" type="text" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label for="name-login">{{ __('Name') }}</label>
                        <input id="name-login" type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label for="password-login">{{ __('Password') }}</label>
                        <input id="password-login" type="password" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <label for="password-login">{{ __('Confirm Password') }}</label>
                        <input id="password-login" type="password" class="form-control" name="password_confirmation">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-template-outlined"><i class="fa fa-user-md"></i> {{ __('Sign Up') }}</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="box">
                <h2 class="text-uppercase">{{ __('Log In') }}</h2>
                <hr>
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="email">{{ __('Email') }}</label>
                        <input id="email" type="text" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label for="password">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control" name="password">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-template-outlined"><i class="fa fa-sign-in"></i> {{ __('Log In') }}</button>
                    </div>
                </form>
            </div>
        </div>
@endsection

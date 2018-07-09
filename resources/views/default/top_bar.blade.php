@if(!isset($hide) || empty($hide->toHtml()))
    <!-- Top bar-->
    <div class="top-bar">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-6 d-md-block d-none">
                    {{--<p>Contact us on +000 000 000 000 or 361657055@qq.com.</p>--}}
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-md-end justify-content-between">
                        <ul class="list-inline contact-info d-block d-md-none">
                            <li class="list-inline-item"><a href="#"><i class="fa fa-phone"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-envelope"></i></a></li>
                        </ul>
                        <div class="login">
                            @if (!Auth::check())
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#login-modal" class="login-btn">
                                    <i class="fa fa-sign-in"></i><span class="d-none d-md-inline-block">{{ __('Log In') }}</span>
                                </a>
                                <a href="{{ route('register') }}" class="signup-btn">
                                    <i class="fa fa-user"></i><span class="d-none d-md-inline-block">{{ __('Sign Up') }}</span>
                                </a>
                            @else
                                <form id="logout" method="post" action="{{ route('logout') }}">
                                    <a href="javascript:void(0);" class="login-btn">
                                        <i class="fa fa-user"></i><span class="d-none d-md-inline-block">{{ Auth::user()->name }}</span>
                                    </a>
                                    {{ csrf_field() }}
                                    <a href="javascript:void(0);" onclick="document.getElementById('logout').submit();" class="signup-btn">
                                        <i class="fa fa-sign-in"></i><span class="d-none d-md-inline-block">{{ __('Logout') }}</span>
                                    </a>
                                </form>
                            @endif
                        </div>
                        {{--<ul class="social-custom list-inline">
                            <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-envelope"></i></a></li>
                        </ul>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top bar end-->
    <!-- login Modal-->
    <div id="login-modal" tabindex="-1" role="dialog" aria-labelledby="login-modalLabel" aria-hidden="true"
         class="modal fade">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="login-modalLabel" class="modal-title">{{ __('Log In') }}</h4>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('login') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input id="email_modal" type="text" placeholder="{{ __('Email') }}" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <input id="password_modal" type="password" placeholder="{{ __('Password') }}" class="form-control" name="password">
                        </div>
                        <p class="text-center">
                            <button class="btn btn-template-outlined"><i class="fa fa-sign-in"></i> {{ __('Log In') }}</button>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- login modal end-->
@endempty
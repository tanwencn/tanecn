@if(isset($breadcrumb) && !empty($breadcrumb->toHtml()))
    <div id="heading-breadcrumbs" class="border-top-0 border-bottom-0">
        <div class="container">
            <div class="row d-flex align-items-center flex-wrap">
                <div class="col-md-7">
                    <h1 class="h2">@yield('title')</h1>
                </div>
                <div class="col-md-5">
                    <ul class="breadcrumb d-flex justify-content-end">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                        {{ $breadcrumb }}
                        {{--<li class="breadcrumb-item active">Blog Listing: Medium</li>--}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endif
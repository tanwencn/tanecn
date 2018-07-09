@extends('app')

@section('title'){{ __('Posts') }}@endsection
@section('breadcrumb')<li class="breadcrumb-item active">{{ __('Posts') }}</li>@endsection

@section('content')
        <div id="blog-listing-big" class="col-md-9">
            @foreach ($data as $model)
                <section class="post">
                    <h2><a href="{{ $model->url }}">{{ $model->title }}</a></h2>
                    <div class="row">
                        <div class="col-sm-6">
                            {{--<p class="author-category">By <a href="#">John Snow</a> in <a href="blog.html">Webdesign</a></p>--}}
                            <p class="author-category">
                                @foreach($model->categories as $category)
                                    @if ($loop->first)
                                        IN
                                    @endif
                                    <a href="{{ request()->fullUrlWithQuery(['category' => $category->id, 'page' => null]) }}">{{ $category->title }}</a>
                                    @if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                            </p>
                        </div>
                        <div class="col-sm-6 text-right">
                            <p class="date-comments"><a href="{{ $model->url }}"><i class="fa fa-calendar-o"></i> {{ $model->created_at->format('m-d, Y') }}</a><a href="{{ $model->url }}#comments"><i class="fa fa-comment-o"></i> {{ $model->comments_count }} {{ __('Comments') }}</a></p>
                        </div>
                    </div>
                    @if(!empty($model->image))
                    <div class="image"><a href="{{ $model->url }}"><img src="{{ $model->image }}" alt="{{ $model->title }}" class="img-fluid"></a></div>
                    @endif
                    <p class="intro">{{ $model->excerpt }}</p>
                    <p class="read-more text-right"><a href="{{ $model->url }}" class="btn btn-template-outlined">{{ __('Continue Reading') }}</a></p>
                </section>
            @endforeach
            {{ $data->links() }}
        </div>
        <div class="col-md-3">
            <div class="panel panel-default sidebar-menu">
                <div class="panel-body">
                    <form role="search">
                        <div class="input-group">
                            <input type="text" name="search" placeholder="{{ __('Search') }}" class="form-control" value="{{ request('search') }}"><span class="input-group-btn">
                        <button type="submit" class="btn btn-template-main"><i class="fa fa-search"></i></button></span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="panel panel-default sidebar-menu">
                <div class="panel-heading">
                    <h3 class="h4 panel-title">{{ __('Categories') }}</h3>
                </div>
                <div class="panel-body">
                    <ul class="nav nav-pills flex-column text-sm">
                        @foreach ($categories as $model)
                            <li class="nav-item"><a href="{{ request()->fullUrlWithQuery(['category' => $model->id, 'page' => null]) }}" class="nav-link {{ request('category')==$model->id?'active':'' }}">{{ $model->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="panel sidebar-menu">
                <div class="panel-heading">
                    <h3 class="h4 panel-title">{{ __('Tags') }}</h3>
                </div>
                <div class="panel-body">
                    <ul class="tag-cloud list-inline">
                        @foreach ($tags as $model)
                            <li class="list-inline-item {{ request('tag')==$model->id?'active':'' }}"><a href="{{ request()->fullUrlWithQuery(['tag' => $model->id, 'page' => null]) }}"><i class="fa fa-tags"></i> {{ $model->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
@endsection
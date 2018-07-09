@extends('app')

@section('title'){{ $model->title }}@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">{{ __('Blog') }}</a></li>
    <li class="breadcrumb-item active">{{ $model->title }}</li>
@endsection

@section('content')
    <!-- LEFT COLUMN _________________________________________________________-->
        <div id="blog-post" class="col-md-9">
            <p class="text-muted text-uppercase mb-small text-right text-sm">{{ $model->created_at->format('m-d, Y') }}</p>
            <p class="lead">{{ $model->excerpt }}</p>
            <div id="post-content">
                {!! $model->description !!}
            </div>
            <div id="comments">
                <h4 class="text-uppercase">{{ $comments->total() }} {{__('Comments')}}</h4>
                @foreach ($comments as $comment)
                    <div class="row comment @if ($loop->last) last @endif">
                        <div class="col-sm-3 col-md-1 text-center-xs">
                            <p><img src="{{ $comment->user->avatar }}" alt="" class="img-fluid rounded-circle"></p>
                        </div>
                        <div class="col-sm-9 col-md-10">
                            <h5 class="text-uppercase">{{ $comment->user->name }}</h5>
                            <p class="posted"><i class="fa fa-clock-o"></i> {{ $comment->created_at->format('m-d H:i:s, Y') }}</p>
{{--                            <p>{{ $comment->content }} {{ $replyHistory($comment) }}</p>--}}
                            <p>{{ $comment->content }} {{ $comment->reply_history }}</p>
                            <p class="reply"><a href="javascript:;"><i class="fa fa-reply"></i> 回复</a></p>
                            @auth
                            <form method="post" action="{{ route('posts.comment') }}" style="display: none">
                                {{ csrf_field() }}
                                <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                <input type="hidden" name="slug" value="{{ $model->slug }}">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <textarea name="content" rows="4" class="form-control">{{ old('content') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 text-right">
                                        <button class="btn btn-template-outlined"><i class="fa fa-comment-o"></i> 提交评论</button>
                                    </div>
                                </div>
                            </form>
                            @else
                                <div role="alert" class="alert alert-info" style="display: none">{{ __('Please login to comment') }}. <a href="{{ route('login') }}">{{ __('Log In') }}</a></div>
                            @endauth
                        </div>
                    </div>
                @endforeach

                <nav aria-label="Page navigation example">
                    {{ $comments->links(null, ['size' => 'sm']) }}
                </nav>
            </div>
            <div id="comment-form">
                @foreach($errors->all() as $message)
                <div role="alert" class="alert alert-danger">
                    {{ $message }}
                </div>
                @endforeach
                <h4 class="text-uppercase">{{ __('Leave a Reply') }}</h4>
                    @auth
                        <form method="post" action="{{ route('posts.comment') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="slug" value="{{ $model->slug }}">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <textarea name="content" rows="4" class="form-control">{{ old('content') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <button class="btn btn-template-outlined"><i class="fa fa-comment-o"></i> {{ __('Post Comment') }}</button>
                                </div>
                            </div>
                        </form>
                    @else
                        <div role="alert" class="alert alert-info">{{ __('Please login to comment') }}. <a href="{{ route('login') }}">{{ __('Log In') }}</a></div>
                    @endauth
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-default sidebar-menu">
                <div class="panel-heading">
                    <h3 class="h4 panel-title">{{ __('Related Categories') }}</h3>
                </div>
                <div class="panel-body">
                    <ul class="nav nav-pills flex-column text-sm">
                        @foreach($model->categories as $category)
                            <li class="nav-item"><a href="{{ route('posts.index', ['category' => $category->id]) }}" class="nav-link">{{ $category->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="panel sidebar-menu">
                <div class="panel-heading">
                    <h3 class="h4 panel-title">{{ __('Related Tags') }}</h3>
                </div>
                <div class="panel-body">
                    <ul class="tag-cloud list-inline">
                        @foreach($model->tags as $tag)
                            <li class="list-inline-item"><a href="{{ route('posts.index', ['tag' => $tag->id]) }}"><i class="fa fa-tags"></i> {{ $tag->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
@endsection

@push('scripts')
    <script>
        $(function(){
            $('.reply').click(function(){
                $(this).next().fadeToggle();
            });
        });
    </script>
@endpush
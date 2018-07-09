@extends('app')

@section('title'){{ $model->title }}@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">{{ $model->title }}</li>
@endsection

@section('content')
    <div class="row bar">
        <div class="col-md-12">
            <section>
                <div id="text-page">
                    {!! $model->description !!}
                </div>
            </section>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
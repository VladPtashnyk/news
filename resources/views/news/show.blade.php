@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@lang('show.news')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">@lang('show.home')</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">@lang('show.breadcrumb_news')</a></li>
                        <li class="breadcrumb-item active">@lang('show.breadcrumb_show')</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ $oneNews->title }}</h3>
                        </div>
                        <div class="card-body">
                            @foreach ($images as $image)
                                <img src="{{ asset('storage/' . $image->image_path) }}" class="img-thumbnail mb-3" alt="News Image">
                            @endforeach
                            <p class="lead">{{ $oneNews->description }}</p>
                            <p>{{ $oneNews->quote }}</p>
                            <p><strong>@lang('show.author'):</strong> {{ $oneNews->author->name }}</p>
                            <p><strong>@lang('show.publication_date'):</strong> {{ $oneNews->publication_date }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-black-50">{{ __('index.admin_title') }}</h1>
    </div>
    @if(session('warning'))
        <div class="alert alert-warning">
            {{ session('warning') }}
        </div>
    @endif

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('index.admin_all_news') }}</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row sortable" id="news-container">
                @forelse($news as $item)
                    <div class="col-md-3 mb-4">
                        <div class="card">
                            @if($item->featuredImage)
                                <img src="{{ asset('storage/' . $item->featuredImage->image_path) }}" class="card-img-top w-100" alt="News Image">
                            @elseif($item->firstImage)
                                <img src="{{ asset('storage/' . $item->firstImage->image_path) }}" class="card-img-top w-100" alt="News Image">
                            @else
                                <img src="{{ asset('path/to/placeholder/image.jpg') }}" class="card-img-top w-100" alt="Placeholder Image">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->title }}</h5>
                                <p class="card-text">{{ $item->short_description }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="{{ route('user.show', $item->id) }}" class="btn btn-primary">{{ __('index.see_full_article') }}</a>
                                    <a href="{{ route('user.edit', $item->id) }}" class="btn btn-primary">{{ __('index.edit_article') }}</a>
                                </div>
                                <form method="POST" action="{{ route('admin.deleteNews', $item->id) }}" class="mt-3 text-center">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('{{ __('index.delete_confirmation') }}')">{{ __('index.delete') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p>{{ __('index.no_news_found') }}</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var sortable = new Sortable(document.getElementById('news-container'), {
                animation: 150,
                handle: '.card',
                ghostClass: 'sortable-ghost',
                chosenClass: 'sortable-chosen',
                dragClass: 'sortable-drag',
            });
        });
    </script>
@endsection

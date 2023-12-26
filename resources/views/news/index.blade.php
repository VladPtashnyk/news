@extends(session()->has('user') ? 'layouts.app' : 'layouts.app-home')

@section('content')
    @if(session('warning'))
        <div class="alert alert-warning">
            {{ session('warning') }}
        </div>
    @endif
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@lang('userIndex.news')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">@lang('userIndex.home')</a></li>
                        <li class="breadcrumb-item active">@lang('userIndex.breadcrumb_news')</li>
                    </ol>
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
                                <a href="{{ route('user.show', $item->id) }}" class="btn btn-primary">@lang('userIndex.view_full_article')</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p>@lang('userIndex.no_news_found')</p>
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

@extends('layouts.app')

@section('content')
    <div class="content-header">
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('edit.edit_news') }}</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('user.update', $oneNews->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="title">{{ __('edit.title') }}:</label>
                                    <input type="text" name="title" class="form-control" value="{{ $oneNews->title }}">
                                </div>

                                <div class="form-group">
                                    <label for="publication_date">{{ __('edit.publication_date') }}:</label>
                                    <input type="date" name="publication_date" class="form-control" value="{{ $oneNews->publication_date }}">
                                </div>

                                <div class="form-group">
                                    <label for="short_description">{{ __('edit.short_description') }}:</label>
                                    <textarea name="short_description" class="form-control">{{ $oneNews->short_description }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="description">{{ __('edit.description') }}:</label>
                                    <textarea name="description" class="form-control">{{ $oneNews->description }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="quote">{{ __('edit.quote') }}:</label>
                                    <textarea name="quote" class="form-control">{{ $oneNews->quote }}</textarea>
                                </div>

                                <div class="col-md-2">
                                    <label for="images">{{ __('edit.images') }}:</label>
                                    @foreach ($images as $image)
                                        <div class="form-check mb-3">
                                            <input type="radio" name="featured_image" value="{{ $image->id }}" {{ $image->position === 1 ? 'checked' : '' }} class="form-check-input">
                                            <img src="{{ asset('storage/' . $image->image_path) }}" class="img-thumbnail" alt="News Image">
                                        </div>
                                    @endforeach
                                </div>

                                <button type="submit" class="btn btn-primary">{{ __('edit.update_button') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

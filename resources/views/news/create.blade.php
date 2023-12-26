@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card mx-auto" style="max-width: 400px;">
            <div class="card-header bg-primary text-white">
                <h2 class="text-center">{{ __('create.create_news') }}</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('user.storeNews') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">{{ __('create.news_title') }}</label>
                        <input type="text" name="title" id="title" class="form-control rounded">
                    </div>

                    <div class="mb-3">
                        <label for="short_description" class="form-label">{{ __('create.short_description') }}</label>
                        <textarea name="short_description" id="short_description" class="form-control rounded"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">{{ __('create.full_description') }}</label>
                        <textarea name="description" id="description" class="form-control rounded"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="quote" class="form-label">{{ __('create.quote') }}</label>
                        <textarea name="quote" id="quote" class="form-control rounded"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="images" class="form-label">{{ __('create.images') }}</label>
                        <div class="input-group">
                            <input type="file" name="images[]" id="images" multiple class="form-control rounded">
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">{{ __('create.create_button') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

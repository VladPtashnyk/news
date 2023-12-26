@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-4 mb-4">@lang('allUsers.users_list')</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>@lang('allUsers.name')</th>
                    <th>Email</th>
                    <th>@lang('allUsers.actions')</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <form action="{{ route('admin.deleteUser', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">@lang('allUsers.delete')</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h1 class="mt-4 mb-4">@lang('allUsers.authors_list')</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>UserId</th>
                    <th>@lang('allUsers.name')</th>
                    <th>@lang('allUsers.actions')</th>
                </tr>
            </thead>
            <tbody>
                @foreach($authors as $author)
                    <tr>
                        <td>{{ $author->id }}</td>
                        <td>{{ $author->user_id }}</td>
                        <td>{{ $author->name }}</td>
                        <td>
                            <form action="{{ route('admin.deleteAuthors', $author->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">@lang('allUsers.delete')</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

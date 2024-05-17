@extends('layouts.app')

@section('content')
    @if (Session::has('errors'))
	    {{ Session::get('errors') }}
    @endif

    <h1 class="mb-5">{{ __('views.author.pages.index.title') }}</h1>

    <div>
        @auth
            <a class="btn btn-primary" href="{{ route('authors.create') }}">
                {{ __('views.author.pages.index.new') }}
            </a>
        @endauth
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <table class="table">
                <thead class="border-b-2 border-solid border-black text-left">
                    <tr>
                        <th>{{ __('views.author.fields.id') }}</th>
                        <th>{{ __('views.author.fields.fullName') }}</th>
                        <th>{{ __('views.author.fields.countryOfBirth') }}</th>
                        <th>{{ __('views.author.fields.comment') }}</th>
                        <th>{{ __('views.author.fields.created_at') }}</th>
                        <th>{{ __('views.actions.column_name') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($authors as $author)
                        <tr class="border-b border-dashed text-left">
                            <td>{{ $author->id }}</td>
                            <td>{{ Str::limit($author->fullName, 50, '...') }}</td>
                            <td>{{ Str::limit($author->countryOfBirth, 50, '...') }}</td>
                            <td>{{ Str::limit($author->comment, 65, '...') }}</td>
                            <td>{{ $author->created_at }}</td>
                            <td>
                                <a href="{{ route('authors.edit', $author) }}">{{ __('views.actions.edit') }}</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

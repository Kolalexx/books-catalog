@extends('layouts.app')

@section('content')
    @if (Session::has('errors'))
	    {{ Session::get('errors') }}
    @endif

    <h1 class="mb-5">{{ __('views.book.pages.index.title') }}</h1>

    <div>
        <form>
            <input type="search" class="form-control mb-2" placeholder="Поиск по названию книги" name="searchBook" value="{{ request('searchBook') }}">
            <input type="search" class="form-control mb-2" placeholder="Поиск по автору книги" name="searchAuthor" value="{{ request('searchAuthor') }}">
            <button class="btn btn-primary mb-4">{{ __('views.book.pages.filter.submit') }}</button>
        </form>
        @auth
            <a class="btn btn-primary mb-2" href="{{ route('books.create') }}">
                {{ __('views.book.pages.index.new') }}
            </a>
        @endauth
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <table class="table">
                <thead class="border-b-2 border-solid border-black text-left">
                    <tr>
                        <th>{{ __('views.book.fields.id') }}</th>
                        <th>{{ __('views.book.fields.name') }}</th>
                        <th>{{ __('views.book.fields.yearOfPublication') }}</th>
                        <th>{{ __('views.book.fields.description') }}</th>
                        <th>{{ __('views.book.fields.cover') }}</th>
                        <th>{{ __('views.book.fields.author_id') }}</th>
                        <th>{{ __('views.book.fields.chapter_id') }}</th>
                        <th>{{ __('views.book.fields.created_at') }}</th>
                        <th>{{ __('views.actions.column_name') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr class="border-b border-dashed text-left">
                            <td>{{ $book->id }}</td>
                            <td>
                                <a href="{{ route('books.show', $book) }}">{{ Str::limit($book->name, 40, '...') }}</a>
                            </td>
                            <td>{{ $book->yearOfPublication }}</td>
                            <td>{{ Str::limit($book->description, 40, '...') }}</td>
                            <td>{{ Str::limit($book->cover, 40, '...') }}</td>
                            <td>{{ Str::limit($book->author->fullName, 40, '...') }}</td>
                            <td>{{ Str::limit($book->chapter->name, 40, '...') }}</td>
                            <td>{{ $book->created_at }}</td>
                            <td>
                                @auth
                                    <a href="{{ route('books.edit', $book) }}">{{ __('views.actions.edit') }}</a>
                                @endauth
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

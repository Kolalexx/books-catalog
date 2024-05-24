@extends('layouts.app')

@section('content')
    @if (Session::has('errors'))
	    {{ Session::get('errors') }}
    @endif

    <h1 class="mb-5">{{ __('views.book.pages.show.title') }}{{ $book->name }}</h1>

    <div>
        @auth
            <a class="btn btn-primary" href="{{ route('books.edit', $book) }}">{{ __('views.actions.edit') }}</a>
        @endauth
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="border-b-2 border-solid border-black text-left">
                <div>{{ __('views.book.fields.yearOfPublication') }}: {{ $book->yearOfPublication }}</div>
                <div>{{ __('views.book.fields.description') }}: {{ $book->description }}</div>
                <div>{{ __('views.book.fields.cover') }}: {{ $book->cover }}</div>
                <div>{{ __('views.book.fields.author_id') }}: {{ $book->author->fullName }}</div>
                <div>{{ __('views.book.fields.chapter_id') }}: {{ $book->chapter->name }}</div>

                <a class="btn btn-primary" href="{{ route('books.index') }}">{{ __('views.book.pages.show.index') }}</a>

            </div>
        </div>
    </div>
@endsection

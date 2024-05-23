@extends('layouts.app')

@section('content')
    <h1 class="mb-5">{{ __('views.book.pages.edit.title') }}: {{ Str::limit($book->name, 100, '...') }}</h1>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{ $html->form('PUT', route('books.update', $book))->open() }}
    {{ $html->label('Название книги') }}
    {{ $html->text('name')->class('form-control mb-2') }}
    {{ $html->label('Год издания') }}
    {{ $html->number('yearOfPublication')->class('form-control mb-2') }}
    {{ $html->label('Описание') }}
    {{ $html->textarea('description')->class('form-control mb-4') }}
    {{ $html->label('Обложка') }}
    {{ $html->textarea('cover')->class('form-control mb-4') }}
    {{ $html->label('ФИО автора') }}
    {{ $html->select('author', $authors)->class('form-control mb-4') }}
    {{ $html->label('Раздел') }}
    {{ $html->select('chapter', $chapters)->class('form-control mb-4') }}
    {{ $html->submit('Изменить')->class('btn btn-primary') }}
    {{ $html->form()->close() }}
@endsection

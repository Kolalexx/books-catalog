@extends('layouts.app')

@section('content')
    <h1 class="mb-5">{{ __('views.chapter.pages.edit.title') }}: {{ Str::limit($chapter->name, 50, '...') }}</h1>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{ $html->form('PUT', route('chapters.update', $chapter))->open() }}
    {{ $html->label('Название') }}
    {{ $html->text('name')->class('form-control mb-2') }}
    {{ $html->label('Описание раздела') }}
    {{ $html->textarea('description')->class('form-control mb-4') }}
    {{ $html->submit('Изменить')->class('btn btn-primary') }}
    {{ $html->form()->close() }}
@endsection

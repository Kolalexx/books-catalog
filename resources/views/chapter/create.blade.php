@extends('layouts.app')

@section('content')
    <h1 class="mb-5">{{ __('views.chapter.pages.create.title') }}</h1>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{ $html->form('POST', route('chapters.store'))->open() }}
    {{ $html->label('Название') }}
    {{ $html->text('name')->class('form-control mb-2') }}
    {{ $html->label('Описание раздела') }}
    {{ $html->textarea('description')->class('form-control mb-4') }}
    {{ $html->submit('Создать')->class('btn btn-primary') }}
    {{ $html->form()->close() }}
@endsection

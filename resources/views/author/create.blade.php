@extends('layouts.app')

@section('content')
    <h1 class="mb-5">{{ __('views.author.pages.create.title') }}</h1>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{ $html->form('POST', route('authors.store'))->open() }}
    {{ $html->label('ФИО') }}
    {{ $html->text('fullName')->class('form-control mb-2') }}
    {{ $html->label('Страна рождения') }}
    {{ $html->text('countryOfBirth')->class('form-control mb-2') }}
    {{ $html->label('Комментарий') }}
    {{ $html->textarea('comment')->class('form-control mb-4') }}
    {{ $html->submit('Создать')->class('btn btn-primary') }}
    {{ $html->form()->close() }}
@endsection

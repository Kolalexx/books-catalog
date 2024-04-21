@extends('layouts.app')

@section('content')
    @if (Session::has('errors'))
	    {{ Session::get('errors') }}
    @endif

    <h1 class="mb-5">{{ __('views.chapter.pages.index.title') }}</h1>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @auth
                <div class="flex justify-center">
                    <a href="{{ route('chapters.create') }}">
                        <x-primary-button>
                            {{ __('views.chapter.pages.index.new') }}
                        </x-primary-button>
                    </a>
                </div>
            @endauth
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                <div class="max-w-xxl">
                    <table class="w-full">
                        <thead class="border-b-2 border-solid border-black text-left">
                            <tr>
                                <th>{{ __('views.chapter.fields.id') }}</th>
                                <th>{{ __('views.chapter.fields.name') }}</th>
                                <th>{{ __('views.chapter.fields.description') }}</th>
                                <th>{{ __('views.chapter.fields.created_at') }}</th>
                                @auth
                                    <th>{{ __('views.actions.column_name') }}</th>
                                @endauth
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($chapters as $chapter)
                                <tr class="border-b border-dashed text-left">
                                    <td>{{ $chapter->id }}</td>
                                    <td>{{ Str::limit($chapter->name, 50, '...') }}</td>
                                    <td>{{ Str::limit($chapter->description, 65, '...') }}</td>
                                    <td>{{ $chapter->created_at }}</td>
                                    @auth
                                        <td>
                                            <a data-confirm="{{ __('views.actions.confirmation') }}" data-method="delete"
                                                class="text-red-600 hover:text-red-900"
                                                href="{{ route('chapters.destroy', $chapter->id) }}">
                                                {{ __('views.actions.delete') }} </a>
                                            <a href="{{ route('chapters.edit', ['chapter' => $chapter->id]) }}">{{ __('views.actions.edit') }}</a>
                                        </td>
                                    @endauth

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

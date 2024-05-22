@extends('layouts.app')

@section('content')
    @if (Session::has('errors'))
	    {{ Session::get('errors') }}
    @endif

    <h1 class="mb-5">{{ __('views.chapter.pages.index.title') }}</h1>

    <div>
        <a class="btn btn-primary" href="{{ route('chapters.create') }}">
            {{ __('views.chapter.pages.index.new') }}
        </a>
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <table class="table">
                <thead class="border-b-2 border-solid border-black text-left">
                    <tr>
                        <th>{{ __('views.chapter.fields.id') }}</th>
                        <th>{{ __('views.chapter.fields.name') }}</th>
                        <th>{{ __('views.chapter.fields.description') }}</th>
                        <th>{{ __('views.chapter.fields.created_at') }}</th>
                        <th>{{ __('views.actions.column_name') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($chapters as $chapter)
                        <tr class="border-b border-dashed text-left">
                            <td>{{ $chapter->id }}</td>
                            <td>{{ Str::limit($chapter->name, 50, '...') }}</td>
                            <td>{{ Str::limit($chapter->description, 65, '...') }}</td>
                            <td>{{ $chapter->created_at }}</td>
                            <td>
                                <a href="{{ route('chapters.destroy', $chapter) }}"
                                    data-method="DELETE" data-confirm="{{ __('views.actions.confirmation') }}"
                                    class="text-red-600 hover:text-red-900">
                                    {{ __('views.actions.delete') }}</a>
                                <a href="{{ route('chapters.edit', $chapter) }}">{{ __('views.actions.edit') }}</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

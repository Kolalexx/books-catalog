<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Chapter;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request('searchBook')) {
            $books = Book::where('name', 'like', '%' . request('searchBook') . '%')->get();
        } elseif (request('searchAuthor')) {
            $authors = Author::where('fullName', 'like', '%' . request('searchAuthor') . '%')->pluck('id');
            $books = Book::whereIn('author_id', $authors)->get();
        } else {
            $books = Book::paginate(5);
        }
        return view('book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $book = new Book();
        $html = html()->model($book);
        $authors = collect(Author::all())
            ->mapWithKeys(function ($item) {
                return [$item->id => [$item->id => $item->fullName]];
            })->all();
        $chapters = collect(Chapter::all())
            ->mapWithKeys(function ($item) {
                return [$item->id => [$item->id => $item->name]];
            })->all();
        return view('book.create', compact('html', 'authors', 'chapters'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'name.required' => 'Название книги - это обязательное поле',
            'name.max' => 'Название книги не может превышать 150 символов',
            'name.unique' => 'Раздел с таким именем уже существует',
            'yearOfPublication.required' => 'Год издания - это обязательное поле',
            'yearOfPublication.max' => 'Год издания не может превышать 4 символа',
            'description.required' => 'Описание книги - это обязательное поле',
            'description.max' => 'Описание книги не может превышать 2000 символов',
            'cover.max' => 'Обложка не может превышать 500 символов'
        ];
        $data = $this->validate($request, [
            'name' => 'required|max:150|unique:books',
            'yearOfPublication' => 'required|max:4',
            'description' => 'required|max:2000',
            'cover' => 'max:500',
        ], $messages);

        $book = new Book();
        $book->fill($data);
        $book->author_id = $request->author;
        $book->chapter_id = $request->chapter;
        $book->save();

        flash(__('views.book.flash.store'));
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $html = html()->model($book);
        $authors = collect(Author::all())
            ->mapWithKeys(function ($item) {
                return [$item->id => [$item->id => $item->fullName]];
            })->all();
        $chapters = collect(Chapter::all())
            ->mapWithKeys(function ($item) {
                return [$item->id => [$item->id => $item->name]];
            })->all();
        return view('book.edit', compact('book', 'html', 'authors', 'chapters'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $messages = [
            'name.required' => 'Название книги - это обязательное поле',
            'name.max' => 'Название книги не может превышать 150 символов',
            'name.unique' => 'Раздел с таким именем уже существует',
            'yearOfPublication.required' => 'Год издания - это обязательное поле',
            'yearOfPublication.max' => 'Год издания не может превышать 4 символа',
            'description.required' => 'Описание книги - это обязательное поле',
            'description.max' => 'Описание книги не может превышать 2000 символов',
            'cover.max' => 'Обложка не может превышать 500 символов'
        ];
        $data = $this->validate($request, [
            'name' => 'required|max:150|unique:books,name,' . $book->id,
            'yearOfPublication' => 'required|max:4',
            'description' => 'required|max:2000',
            'cover' => 'max:500',
        ], $messages);

        $book->fill($data);
        $book->author_id = $request->author;
        $book->chapter_id = $request->chapter;
        $book->save();

        flash(__('views.book.flash.update'));
        return redirect()->route('books.index');
    }
}

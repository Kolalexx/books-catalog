<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::all();
        return view('author.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $author = new Author();
        $html = html()->model($author);
        return view('author.create', compact('html'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'fullName.required' => 'ФИО - это обязательное поле',
            'fullName.max' => 'ФИО не может превышать 150 символов',
            'fullName.unique' => 'Автор с таким ФИО уже существует',
            'countryOfBirth.required' => 'Страна рождения - это обязательное поле',
            'countryOfBirth.max' => 'Название страны не может превышать 100 символов',
            'comment.max' => 'Комментаний не может превышать 500 символов'
        ];
        $data = $this->validate($request, [
            'fullName' => 'required|max:150|unique:authors',
            'countryOfBirth' => 'required|max:100',
            'comment' => 'max:500',
        ], $messages);

        $author = new Author();
        $author->fill($data)->save();

        flash(__('views.author.flash.store'));
        return redirect()->route('authors.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        $html = html()->model($author);
        return view('author.edit', compact('author', 'html'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        $messages = [
            'fullName.required' => 'ФИО - это обязательное поле',
            'fullName.max' => 'ФИО не может превышать 150 символов',
            'fullName.unique' => 'Автор с таким ФИО уже существует',
            'countryOfBirth.required' => 'Страна рождения - это обязательное поле',
            'countryOfBirth.max' => 'Название страны не может превышать 100 символов',
            'comment.max' => 'Комментаний не может превышать 500 символов'
        ];
        $data = $this->validate($request, [
            'fullName' => 'required|max:150|unique:authors,fullName,' . $author->id,
            'countryOfBirth' => 'required|max:100',
            'comment' => 'max:500',
        ], $messages);

        $author->fill($data)->save();

        flash(__('views.author.flash.update'));
        return redirect()->route('authors.index');
    }
}

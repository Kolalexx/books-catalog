<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chapters = Chapter::all();
        return view('chapter.index', compact('chapters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $chapters = new Chapter();
        $html = html()->model($chapters);
        return view('chapter.create', compact('html'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'name.required' => 'Это обязательное поле',
            'name.unique' => 'Статус с таким именем уже существует',
            'description.required' => 'Это обязательное поле'
        ];
        $data = $this->validate($request, [
            'name' => 'required|max:150|unique:chapters',
            'description' => 'required|max:500',
        ], $messages);

        $chapters = new Chapter();
        $chapters->fill($data)->save();

        flash(__('views.chapter.flash.store'));
        return redirect()->route('chapters.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chapter $chapter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chapter $chapter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chapter $chapter)
    {
        //
    }
}

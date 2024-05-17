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
        $chapter = new Chapter();
        $html = html()->model($chapter);
        return view('chapter.create', compact('html'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'name.required' => 'Название раздела - это обязательное поле',
            'name.max' => 'Название раздела не может превышать 150 символов',
            'name.unique' => 'Раздел с таким именем уже существует',
            'description.required' => 'Описание раздела - это обязательное поле',
            'description.max' => 'Описание раздела не может превышать 500 символов'
        ];
        $data = $this->validate($request, [
            'name' => 'required|max:150|unique:chapters',
            'description' => 'required|max:500',
        ], $messages);

        $chapter = new Chapter();
        $chapter->fill($data)->save();

        flash(__('views.chapter.flash.store'));
        return redirect()->route('chapters.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chapter $chapter)
    {
        $html = html()->model($chapter);
        return view('chapter.edit', compact('chapter', 'html'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chapter $chapter)
    {
        $messages = [
            'name.required' => 'Название раздела - это обязательное поле',
            'name.max' => 'Название раздела не может превышать 150 символов',
            'name.unique' => 'Раздел с таким именем уже существует',
            'description.required' => 'Описание раздела - это обязательное поле',
            'description.max' => 'Описание раздела не может превышать 500 символов'
        ];
        $data = $this->validate($request, [
            'name' => 'required|max:150|unique:chapters,name,' . $chapter->id,
            'description' => 'required|max:500',
        ], $messages);

        $chapter->fill($data)->save();

        flash(__('views.chapter.flash.update'));
        return redirect()->route('chapters.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chapter $chapter)
    {
        $chapter->delete();
        flash(__('views.chapter.flash.destroy.success'));
        return redirect()->route('chapters.index');
    }
}

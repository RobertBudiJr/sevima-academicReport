<?php

namespace App\Http\Controllers;

use App\Models\ArticleModel;
use App\Models\ClassModel;
use App\Models\TeacherModel;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = ArticleModel::with('teacher', 'class')->get();
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        $teachers = TeacherModel::all();
        $classes = ClassModel::all();
        return view('articles.create', compact('teachers', 'classes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_teacher' => 'required',
            'id_class' => 'required',
            'title' => 'required',
            'content' => 'required',
            'published_at' => 'required|date'
        ]);

        ArticleModel::create([
            'id_teacher' => $request->input('id_teacher'),
            'id_class' => $request->input('id_class'),
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'published_at' => $request->input('published_at'),
            'subject' => $request->input('subject')
        ]);

        return redirect()->route('articles.index')->with('success', 'Article created successfully.');
    }

    public function show(ArticleModel $article)
    {
        return view('articles.show', compact('article'));
    }

    public function edit(ArticleModel $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, ArticleModel $article)
    {
        $request->validate([
            'id_teacher' => 'required',
            'id_class' => 'required',
            'title' => 'required',
            'content' => 'required',
            'published_at' => 'required|date'
        ]);

        $article->update([
            'id_teacher' => $request->input('id_teacher'),
            'id_class' => $request->input('id_class'),
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'published_at' => $request->input('published_at'),
            'subject' => $request->input('subject')
        ]);

        return redirect()->route('articles.index')->with('success', 'Article updated successfully.');
    }

    public function destroy(ArticleModel $article)
    {
        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Article deleted successfully.');
    }
}
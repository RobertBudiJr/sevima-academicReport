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
        $title = $request->input('title');
        $idTeacher = $request->input('id_teacher');
        $idClass = $request->input('id_class');
        $publishedAt = $request->input('published_at');
        $subject = $request->input('subject');

        // Generate article content using OpenAI API
        $articleContent = $this->generateArticleContent($title);

        // Save the generated content and other fields to the database
        $article = new Article();
        $article->title = $title;
        $article->content = $articleContent;
        $article->id_teacher = $idTeacher;
        $article->id_class = $idClass;
        $article->published_at = $publishedAt;
        $article->subject = $subject;
        $article->save();

        return redirect()->route('articles.index')->with('success', 'Article created successfully.');
    }

    public function generateArticle(Request $request)
    {
        $title = $request->input('title');

        // Make a request to the OpenAI API
        $response = Http::withHeaders([
            'Authorization' => 'Bearer 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',
            'Content-Type' => 'application/json',
        ])->post('https://api.openai.com/v1/engines/text-davinci-003/completions', [
            'prompt' => 'Title: ' . $title . '\nGenerate article:',
            'max_tokens' => 200,
        ]);

        $content = $response->json('choices.0.text');

        return response()->json([
            'generatedContent' => $content,
        ]);
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
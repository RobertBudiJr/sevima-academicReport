<!-- resources/views/articles/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Create Article</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('articles.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="id_teacher">Teacher</label>
        <select name="id_teacher" id="id_teacher" class="form-control">
            @foreach($teachers as $teacher)
                <option value="{{ $teacher->id }}">{{ $teacher->teacher_name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="id_class">Class</label>
        <select name="id_class" id="id_class" class="form-control">
            @foreach($classes as $class)
                <option value="{{ $class->id }}">{{ $class->class_name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control">
    </div>

    <button type="button" class="btn btn-primary" onclick="generateArticle()">Generate Article</button>

    <div class="form-group">
        <label for="content">Content</label>
        <textarea name="content" id="content" class="form-control" rows="6"></textarea>
    </div>

    <div class="form-group">
        <label for="published_at">Published At</label>
        <input type="datetime-local" name="published_at" id="published_at" class="form-control">
    </div>

    <div class="form-group">
        <label for="subject">Subject</label>
        <input type="text" name="subject" id="subject" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/guzzle.js/0.14.0/guzzle.min.js"></script>
<script>
    function generateArticle() {
        const title = document.getElementById('title').value;

        // Make a request to the server-side endpoint
        fetch('/generate-article', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ title })
        })
        .then(response => response.json())
        .then(data => {
            document.getElementById('content').value = data.generatedContent;
        })
        .catch(error => console.error(error));
    }
</script>

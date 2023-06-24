<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <span class="navbar-brand">Welcome, {{ $student->student_name }}</span>
                <span class="navbar-text">Class: {{ $class->class_name }}</span>
            </div>
        </nav>
    </header>

    <div class="container mt-3">
        <h2>Articles</h2>
        <hr>

        @foreach ($articles as $article)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $article->title }}</h5>
                    <p class="card-text">{{ $article->content }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
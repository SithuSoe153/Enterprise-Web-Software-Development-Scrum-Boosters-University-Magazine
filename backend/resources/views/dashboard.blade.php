<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</head>

<body>

    {{ auth()->user()->name }}
    {{ auth()->user()->id }}


    @if (!auth()->check())
        <a href="/login" class="nav-link">login</a>
        <a href="/register" class="nav-link">register</a>
    @else
        <form action="/logout" method="POST">
            @csrf
            <button class="btn btn-link">logout</button>
        </form>
    @endif


    @if (auth()->user()->hasRole(['Marketing Manager']))

        @foreach ($faculties as $faculty)
            <p>{{ $faculty->name }}</p>
        @endforeach

    @endif


    @if (session()->has('success'))
        <div class="alert alert-success text-center" role="alert">
            {{ session('success') }}
        </div>
    @endif


    {{-- File Upload --}}
    @if (auth()->user()->hasRole(['Student']))
        <br>
        <form action="/upload" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" name="title" placeholder="Article Title"><br>
            <input type="file" name="article" accept=".doc,.docx"><br>
            <input type="file" name="images[]" accept="image/*" multiple><br>
            <button type="submit">Upload Article</button>
        </form>
    @endif

</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</head>

<body>

    @if (session()->has('success'))
        <div class="alert alert-success text-center" role="alert">
            {{ session('success') }}
        </div>
    @endif


    {{-- Navbar --}}

    @if (!auth()->check())
        <a href="/login" class="nav-link">login</a>
        <a href="/register" class="nav-link">register</a>
    @else
        <form action="/logout" method="POST">
            @csrf
            {{ auth()->user()->name }}
            {{ auth()->user()->id }}

            <button class="btn btn-link">logout</button>
        </form>
    @endif


    @if (request()->cookie('previousLogin'))
        <p>Last login: {{ request()->cookie('previousLogin') }}
            {{ \Carbon\Carbon::parse(request()->cookie('previousLogin'))->diffForHumans() }}
        </p>
    @endif


    {{-- Guest --}}
    @hasRole(['Guest'])


        <br>
        <h1>Articles</h1>
        @foreach ($articles as $article)
            <p>{{ $article->title }}</p>

            <p>Article Files:</p>
            <div class="container">



                <div class="container text-center">
                    <div class="row row-cols-4">
                        @foreach ($article->files as $file)
                            @php
                                // Replace 'public/' with 'storage/' in the file path
                                $filePath = str_replace('public/', 'storage/', $file->file_path);
                            @endphp

                            <div class="col">
                                @if (Str::endsWith($file->file_path, ['.doc', '.docx']))
                                    <a href="{{ asset($filePath) }}" target="_blank">
                                        {{ basename($file->file_path) }}
                                    </a>
                                @else
                                    {{-- <img src="{{ asset($filePath) }}" class="img-fluid"> --}}
                                    <img src="{{ asset($filePath) }}" class="img-fluid"
                                        style="object-fit: cover; width: 100%; height: 100%;" alt="Image">
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>

            <br>
            <hr>
        @endforeach


    @endhasRole



    @hasRole(['Admin'])
        {{-- Most Visit --}}
        <hr>
        <h1>Most visit</h1>
        @foreach ($mostActiveUsers as $user)
            User: {{ $user->user_name }}, Role: {{ $user->role_name }}, Faculty: {{ $user->faculty_name }}, Visits:
            {{ $user->visit_count }},
            <br>
        @endforeach

        <hr>
        @foreach ($mostVisitedUrls as $mostVisitedUrl)
            @if ($mostVisitedUrl->url != '')
                URL: {{ $mostVisitedUrl->url }}
                <br>
            @endif
        @endforeach

        <hr>
        @foreach ($mostUsedBrowsers as $browser)
            @if ($browser->browser != '')
                Browser: {{ $browser->browser }}
                <br>
            @endif
        @endforeach
    @endhasRole

    {{-- Marketing Manager --}}

    {{-- Faculty List --}}
    @hasRole(['Marketing Manager'])

        <br>
        <hr>
        <h1>Faculties</h1>
        @foreach ($faculties as $faculty)
            <p>{{ $faculty->name }}</p>
        @endforeach

        <h1>Articles</h1>
        @foreach ($articles as $article)
            <p>{{ $article->title }}</p>
        @endforeach

    @endhasRole


    @hasRole(['Marketing Coordinator'])

        <hr>
        <h1>Articles</h1>
        @foreach ($articles as $article)
            <p><input type="checkbox" class="article-checkbox" id="article-{{ $article->id }}"
                    value="{{ $article->id }}">
                {{ $article->title }}
            </p>
        @endforeach


        <script>
            $(document).ready(function() {
                $('.article-checkbox').change(function() { // Use 'change' instead of 'click' for checkboxes
                    var articleId = $(this).val();
                    var isChecked = $(this).is(':checked'); // Get the checked status

                    $.ajax({
                        url: '/article/toggle-selected/' + articleId,
                        method: 'POST', // Ensure method is POST
                        data: {
                            _token: '{{ csrf_token() }}',
                            is_selected: isChecked // Send the status of the checkbox
                        },
                        success: function(response) {
                            console.log("success", response); // Log success with response data
                        },
                        error: function(xhr, status, error) {
                            console.error("Error", status, error);
                        }
                    });
                });
            });
        </script>




        <hr>
        <h1>Guest List</h1>
        @foreach ($guests as $guest)
            {{-- @dd($browser) --}}
            <p>
                Guest name: {{ $guest->name }}
                <br>
                Guest email: {{ $guest->email }}
            </p>
            <br>
        @endforeach


    @endhasRole


    {{-- Student --}}
    {{-- File Upload --}}
    @hasRole(['Student'])
        <br>
        <form action="/upload" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" name="title" placeholder="Article Title"><br>
            <input type="file" name="articles[]" accept=".doc,.docx" multiple>
            @error('articles')
                <p class="text-danger">{{ $message }}</p>
            @enderror <!-- Display validation error for 'articles' input -->
            <br>
            <input type="file" name="images[]" accept="image/*" multiple><br>
            <button type="submit">Upload Article</button>
        </form>
    @endhasRole

    {{-- Contributions --}}
    @hasRole(['Student'])

        {{-- Viewer --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.7.0/viewer.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.7.0/viewer.min.js"></script>


        {{-- Viewer End --}}



        <br>
        <h1>Articles</h1>
        @foreach ($articles as $article)
            <p>{{ $article->title }}</p>

            <p>Article Files:</p>
            <div class="container">



                <div class="container text-center">
                    <div class="row row-cols-4">
                        @foreach ($article->files as $file)
                            @php
                                // Replace 'public/' with 'storage/' in the file path
                                $filePath = str_replace('public/', 'storage/', $file->file_path);
                            @endphp
                            {{-- @if (!Str::endsWith($file->file_path, ['.doc', '.docx'])) --}}

                            {{-- <img src="{{ asset($filePath) }}" class="img-fluid"
                            style="object-fit: cover; width: 100%; height: 100%;" alt="Image"> --}}

                            @if (Str::endsWith($file->file_path, ['.doc', '.docx']))
                                <div class="col">
                                    <a href="{{ asset($filePath) }}" target="_blank">
                                        {{ basename($file->file_path) }}
                                    </a>

                                    {{-- <a href="{{ route('view.word', ['filename' => $file->file_path]) }}">View Word File</a> --}}


                                    <button class="btn btn-primary" onclick="openDocument('{{ asset($filePath) }}')">Open
                                        Document</button>
                                    <br>

                                </div>
                                <div class="w-100 d-none d-md-block"></div>
                                <br>

                                <script>
                                    function openDocument(filePath) {
                                        const encodedFilePath = encodeURIComponent(filePath);
                                        const viewerUrl = `https://view.officeapps.live.com/op/embed.aspx?src=${encodedFilePath}`;
                                        window.open(viewerUrl, '_blank');
                                    }
                                </script>
                            @else
                                <div class="col">
                                    {{-- <img src="{{ asset($filePath) }}" class="img-fluid"> --}}
                                    <img src="{{ asset($filePath) }}" class="img-fluid"
                                        style="object-fit: cover; width: 100%; height: 100%;" alt="Image">
                                </div>
                            @endif
                            {{-- @endif

                        @if (Str::endsWith($file->file_path, ['.doc', '.docx']))
                            <div class="w-100 d-none d-md-block"></div>
                            <div class="col">

                                <a href="{{ asset($filePath) }}" target="_blank">
                                    {{ basename($file->file_path) }}
                                </a>
                            </div>
                        @endif --}}
                        @endforeach
                    </div>
                </div>

            </div>
            <br>
            <hr>
        @endforeach





    @endhasRole

</body>

</html>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>



<div class="container m-4">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $article->title }}</h5>

            <div class="container text-center">
                <div class="row row-cols-4">
                    @foreach ($article->files as $file)
                        @php
                            // Replace 'public/' with 'storage/' in the file path
                            $filePath = str_replace('public/', 'storage/', $file->file_path);
                        @endphp

                        @if (Str::endsWith($file->file_path, ['.doc', '.docx']))
                            <div class="col">
                                <a href="{{ asset($filePath) }}" target="_blank">
                                    {{ basename($file->file_path) }}
                                </a>

                                <br>

                            </div>
                            <div class="w-100 d-none d-md-block"></div>
                            <br>
                        @endif

                        {{-- Check if the file is a .doc or .docx and skip it --}}
                        @if (Str::endsWith($file->file_path, ['.doc', '.docx']))
                            @continue
                        @endif

                        <div class="col">
                            {{-- Display image --}}
                            <img src="{{ asset($filePath) }}" class="img-fluid"
                                style="object-fit: cover; width: 100%; height: 100%;" alt="Image">
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="container mt-4">

                <a href="/article/{{ $article->id }}/edit" class="btn btn-primary">Edit</a>
            </div>



        </div>
    </div>

    @php
        $canComment =
            auth()
                ->user()
                ->hasRole(['Student', 'Marketing Coordinator']) || auth()->user()->id == $article->user_id;
    @endphp

    @if ($canComment)
        <div class="container">

            <form class="container col-md-6 mx-auto" action="/article/{{ $article->id }}/comments" method="post">
                @csrf

                <div class="input-group mt-4">
                    <span class="input-group-text">Comment</span>
                    <textarea class="form-control" aria-label="With textarea" name="comment"></textarea>
                    @error('comment')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <button class="btn btn-primary mt-4" type="submit">Submit</button>

            </form>
    @endif

</div>


{{-- Comments --}}
<div class="" style="width: 450px;margin:auto;">
    <h3 style="color: rgba(0, 0, 0,0.5)">Comments ({{ $article->comments->count() }})</h3>

    @foreach ($article->comments()->latest()->get() as $comment)
        {{-- Single Comment --}}

        <div class="card px-3 py-1 shadow-sm my-2">
            <div class="card-title d-flex gap-3 justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-3">
                    <img src="{{ asset('storage/images/default.jpg') }}" alt=""
                        style="width: 40px;height:40px;border-radius:50%; ">


                    <div class="d-flex flex-column">
                        <span>{{ $comment->user->name }}</span>
                        {{-- {{ \Carbon\Carbon::parse(request()->cookie('previousLogin'))->diffForHumans() }} --}}

                        <span>{{ \Carbon\Carbon::parse($comment->timestamp)->diffForHumans() }}</span>
                    </div>
                </div>
                <div class="comment d-flex flex-column gap-2">

                    @php
                        $canDelete =
                            auth()
                                ->user()
                                ->hasRole(['Student', 'Marketing Coordinator']) &&
                            auth()->user()->id == $comment->user_id;
                    @endphp

                    @php
                        $canView = auth()
                            ->user()
                            ->hasRole(['Student', 'Marketing Coordinator', 'Marketing Manager']);
                    @endphp





                    @if ($canDelete)
                        <form action="/article/comment/delete/{{ $comment->id }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">
                                Delete
                            </button>
                        </form>
                    @endif

                </div>
            </div>
            <div class="card-content my-3">
                {{ $comment->comment }}
            </div>
        </div>
    @endforeach
    <div class="d-flex justify-content-center">
        {{-- {{ $comments->links() }} --}}
    </div>

</div>


</div>

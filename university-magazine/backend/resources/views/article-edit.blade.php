<form action="/article/{{ $article->id }}/update" method="POST" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <input type="text" name="title" placeholder="Article Title" value="{{ old('title', $article->title) }}"><br>
    <input type="file" name="articles[]" accept=".doc,.docx" multiple>
    @if ($article->files->isNotEmpty())
        <p>Selected files:</p>
        <ul>

            @foreach ($article->files as $file)
                @if (Str::endsWith($file->file_path, ['.doc', '.docx']))
                    <li>{{ basename($file->file_path) }}</li>
                @endif
            @endforeach
        </ul>
    @endif
    @error('articles')
        <p class="text-danger">{{ $message }}</p>
    @enderror <!-- Display validation error for 'articles' input -->
    <br>

    <input type="file" id="imageUpload" name="images[]" accept="image/*" multiple><br>
    <div id="image-preview"></div>



    <button type="submit">Upload Article</button>
</form>

<div id="stored-image-preview">
    @foreach ($article->files as $file)
        @php
            $filePath = str_replace('public/', 'storage/', $file->file_path);
        @endphp

        @if (Str::endsWith($file->file_path, ['.doc', '.docx']))
            @continue
        @endif

        <img src="{{ asset($filePath) }}" style="width: 100px; height: 100px; object-fit: cover; margin-right: 10px;">
    @endforeach
</div>


<script>
    document.getElementById('imageUpload').addEventListener('change', function() {
        var imagePreview = document.getElementById('image-preview');
        var stored = document.getElementById('stored-image-preview');
        imagePreview.innerHTML = ''; // Optionally clear existing preview images
        // stored.innerHTML = '';

        for (let i = 0; i < this.files.length; i++) {
            const file = this.files[i];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.width = '100px';
                    img.style.height = '100px';
                    img.style.objectFit = 'cover';
                    img.style.marginRight = '10px';
                    imagePreview.appendChild(img);
                };

                reader.readAsDataURL(file);
            }
        }
    });
</script>

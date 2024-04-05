<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Basic Form Element | Kiaalap - Kiaalap Admin Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
  ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
  ============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
  ============================================ -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <!-- Bootstrap CSS
  ============================================ -->
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <!-- owl.carousel CSS
  ============================================ -->
    <link rel="stylesheet" href="/css/owl.carousel.css">
    <link rel="stylesheet" href="/css/owl.theme.css">
    <link rel="stylesheet" href="/css/owl.transitions.css">
    <!-- animate CSS
  ============================================ -->
    <link rel="stylesheet" href="/css/animate.css">
    <!-- normalize CSS
  ============================================ -->
    <link rel="stylesheet" href="/css/normalize.css">
    <!-- meanmenu icon CSS
  ============================================ -->
    <link rel="stylesheet" href="/css/meanmenu.min.css">
    <!-- main CSS
  ============================================ -->
    <link rel="stylesheet" href="/css/main.css">
    <!-- educate icon CSS
  ============================================ -->
    <link rel="stylesheet" href="/css/educate-custon-icon.css">
    <!-- morrisjs CSS
  ============================================ -->
    <link rel="stylesheet" href="/css/morris/js/morris.css">
    <!-- mCustomScrollbar CSS
  ============================================ -->
    <link rel="stylesheet" href="/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
  ============================================ -->
    <link rel="stylesheet" href="/css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="/css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
  ============================================ -->
    <link rel="stylesheet" href="/css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="{{ asset('css/calendar/fullcalendar.print.min.css') }}">
    <!-- modals CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/modals.css') }}">
    <!-- forms CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/form/all-type-forms.css') }}">
    <!-- style CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <!-- responsive CSS
  ============================================ -->
    <link rel="stylesheet" href="/css/responsive.css">
    <!-- modernizr JS
  ============================================ -->
    <script src="/js/vendor/modernizr-2.8.3.min.js"></script>

    <style>
        .btn-spacing {
            margin-right: 10px;
        }
    </style>

</head>

<body>
    @include('frontend/Marketing Coordinator/coordinator-slidebar')


    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <br>
                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n">

                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">


                                                <li class="nav-item">
                                                    <a href="#" role="button" class="nav-link dropdown-toggle">
                                                        <span class="admin-name">Welcome
                                                            {{ auth()->user()->name }}</span>
                                                        <img
                                                            src="{{ asset('storage/' . auth()->user()->profile) }}"alt="">

                                                    </a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <form action="/article/{{ $article->id }}/update" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')

            <!-- Single pro tab review Start-->
            <div class="single-pro-review-area mt-t-30 mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
                            <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
                                <ul id="myTabedu1" class="tab-review-design">
                                    <h1>Edit Contribution</h1>

                                </ul>
                                <div id="myTabContent" class="tab-content custom-product-edit st-prf-pro">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="">Submissio Date</label>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                    value="{{ $article->created_at->format('d M Y') }}"
                                                                    disabled>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="">Student Name</label>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                    value="{{ $article->user->name }}" disabled>
                                                            </div>
                                                        </div>


                                                    </div>
                                                    @php

                                                        use App\Models\AssignedRole;
                                                        use App\Models\Faculty;

                                                        $facultyId = $article->user->assignedRoles
                                                            ->where('user_id', $article->user->id)
                                                            ->first()->faculty_id;

                                                        $facultyName = Faculty::find($facultyId)->name;

                                                    @endphp

                                                    <div class="col-lg-6">
                                                        <label for="">Faculty</label>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                value="{{ $facultyName }}" disabled>
                                                        </div>
                                                        <label for="">Title</label>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="title"
                                                                placeholder="Give contribution a title"
                                                                value="{{ old('title', $article->title) }}">

                                                            @error('title')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Description</label>
                                                    <textarea type="text" name="description" class="form-control" placeholder="Subject">{{ old('title', $article->description) }}</textarea>
                                                    @error('description')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Attach your Contribution file</label>
                                                    <div class="file-upload-inner ts-forms">
                                                        <div class="input prepend-big-btn">
                                                            <label class="icon-right" for="prepend-big-btn">
                                                                <i class="fa fa-download"></i>
                                                            </label>
                                                            <div class="file-button">
                                                                Choose file
                                                                <input type="file" name="articles[]"
                                                                    accept=".doc,.docx" multiple
                                                                    onchange="document.getElementById('prepend-big-btn').value = this.value;">
                                                            </div>
                                                            <input type="text" id="prepend-big-btn"
                                                                placeholder="no file selected">
                                                            @error('articles')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>


                                                {{-- Selected files --}}
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



                                                <br>
                                                <div class="form-group">
                                                    <label for="">Attach photos</label>
                                                    <div class="file-upload-inner ts-forms">
                                                        <div class="input prepend-big-btn">
                                                            <label class="icon-right" for="prepend-big-btn">
                                                                <i class="fa fa-download"></i>
                                                            </label>
                                                            <div class="file-button">
                                                                Choose file
                                                                <input type="file" name="images[]"
                                                                    accept="image/*" multiple
                                                                    onchange="document.getElementById('prepend-big-btn').value = this.value;">
                                                                @error('images')
                                                                    <p class="text-danger">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                            <input type="text" id="prepend-big-btn"
                                                                placeholder="no file selected">
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- Images preview --}}

                                                <div id="stored-image-preview">
                                                    @foreach ($article->files as $file)
                                                        @php
                                                            $filePath = str_replace(
                                                                'public/',
                                                                'storage/',
                                                                $file->file_path,
                                                            );
                                                        @endphp

                                                        @if (Str::endsWith($file->file_path, ['.doc', '.docx']))
                                                            @continue
                                                        @endif

                                                        <img src="{{ asset($filePath) }}"
                                                            style="width: 100px; height: 100px; object-fit: cover; margin-right: 10px;">
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

                                                <br>
                                                <div class="i-checks pull-left">
                                                    <input type="checkbox" name="terms" id="terms">
                                                    <label for="checkboxTerms">Agree <a href="#"
                                                            class="zoomInDown mg-t text-center" href="#"
                                                            data-toggle="modal" data-target="#zoomInDown2">Terms and
                                                            Conditions</a> </label>
                                                    @error('terms')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>




                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="login-horizental cancel-wp pull-left form-bc-ele">
                                                            <button type="submit"
                                                                class="btn btn-custon-four btn-primary zoomInDown mg-t text-center">
                                                                <i class="fa fa-check edu-checked-pro"
                                                                    aria-hidden="true"></i>
                                                                Update Article
                                                            </button>

                                                            <button type="reset"
                                                                class="btn btn-custon-four btn-danger">
                                                                <i class="fa fa-times edu-danger-error"
                                                                    aria-hidden="true"></i> Cancel</button>
                                                        </div>
                                                        <div class="sparkline11-graph">
                                                            <div class="basic-login-form-ad">
                                                                <div class="row">
                                                                    <div class="col-lg-12 text-center">
                                                                        <div id="zoomInDown1"
                                                                            class="modal modal-edu-general modal-zoomInDown fade"
                                                                            role="dialog">
                                                                            <div
                                                                                class=" modal-dialog modal-dialog-centered">
                                                                                <div class="modal-content">
                                                                                    <div
                                                                                        class="modal-close-area modal-close-df">
                                                                                        <a class="close"
                                                                                            data-dismiss="modal"
                                                                                            href="#"><i
                                                                                                class="fa fa-close"></i></a>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <div
                                                                                            class="modal-login-form-inner">
                                                                                            <div class="row">
                                                                                                <div
                                                                                                    class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="row">
                                                                                                <div
                                                                                                    class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                                    <div
                                                                                                        class="basic-login-inner modal-basic-inner">
                                                                                                        <div
                                                                                                            class="container">
                                                                                                            <div
                                                                                                                class="row justify-content-center">
                                                                                                                <div
                                                                                                                    class="col-lg-6 col-md-8 col-sm-10 col-xs-12">
                                                                                                                    <form
                                                                                                                        action="#">
                                                                                                                        <div
                                                                                                                            class="login-btn-inner">
                                                                                                                            <div
                                                                                                                                class="row">
                                                                                                                                <div
                                                                                                                                    class="col-lg-12 col-md-8 col-sm-8 col-xs-12 text-center">
                                                                                                                                    <div
                                                                                                                                        class="login-horizental">
                                                                                                                                        <button
                                                                                                                                            class="btn btn-sm btn-primary login-submit-cs"
                                                                                                                                            type="submit">Confirm</button>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </form>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
















                                                </div>














                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="containet">
                        <br>
                        <br>
                        {{-- Footer Start --}}
                        {{-- @include('frontend.footer') --}}
                    </div>
                </div>
            </div>

        </form>

        <!-- jquery
  ============================================ -->
        <script src="../js/vendor/jquery-1.12.4.min.js"></script>
        <!-- bootstrap JS
  ============================================ -->
        <script src="../js/bootstrap.min.js"></script>
        <!-- wow JS
  ============================================ -->
        <script src="../js/wow.min.js"></script>
        <!-- price-slider JS
  ============================================ -->
        <script src="../js/jquery-price-slider.js"></script>
        <!-- meanmenu JS
  ============================================ -->
        <script src="../js/jquery.meanmenu.js"></script>
        <!-- owl.carousel JS
  ============================================ -->
        <script src="../js/owl.carousel.min.js"></script>
        <!-- sticky JS
  ============================================ -->
        <script src="../js/jquery.sticky.js"></script>
        <!-- scrollUp JS
  ============================================ -->
        <script src="../js/jquery.scrollUp.min.js"></script>
        <!-- mCustomScrollbar JS
  ============================================ -->
        <script src="../js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="../js/scrollbar/mCustomScrollbar-active.js"></script>
        <!-- metisMenu JS
  ============================================ -->
        <script src="../js/metisMenu/metisMenu.min.js"></script>
        <script src="../js/metisMenu/metisMenu-active.js"></script>
        <!-- morrisjs JS
  ============================================ -->
        <script src="../js/sparkline/jquery.sparkline.min.js"></script>
        <script src="../js/sparkline/jquery.charts-sparkline.js"></script>
        <!-- calendar JS
  ============================================ -->
        <script src="../js/calendar/moment.min.js"></script>
        <script src="../js/calendar/fullcalendar.min.js"></script>
        <script src="../js/calendar/fullcalendar-active.js"></script>
        <!-- tab JS
  ============================================ -->
        <script src="../js/tab.js"></script>
        <!-- plugins JS
  ============================================ -->
        <script src="../js/plugins.js"></script>
        <!-- main JS
  ============================================ -->
        <script src="../js/main.js"></script>
</body>

</html>

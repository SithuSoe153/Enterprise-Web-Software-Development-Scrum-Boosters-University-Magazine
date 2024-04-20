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

    @hasRole(['Marketing Coordinator'])
        @include('frontend/Marketing Coordinator/coordinator-slidebar')
    @endhasRole
    @hasRole(['Marketing Manager'])
        @include('frontend/Marketing Manager/manager-slidebar')
    @endhasRole

    @php
        use App\Models\Magazine;
        $cd = Magazine::latest()->get()->first()->finalclosure_date;

    @endphp

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
                                                        <img src="{{ asset('storage/' . auth()->user()->profile) }}"
                                                            alt="">
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
        <form action="">
            <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
                <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
                    <div class="row">
                        <div class="single-review-st-item res-mg-t-30 table-mg-t-pro-n">
                            <div class="single-review-st-text">
                                <img src="/img/notification/1.jpg" alt="">
                                <div class="review-ctn-hf">
                                    <h1 class="col-lg-12"><small><b>
                                                {{ $article->user->name }}
                                            </b><b> - </b><b>
                                                {{ $article->user->assignedRoles->first()->faculty->name }}

                                            </b></small> </h1>
                                    <b
                                        class="col-lg-5 col-md-8 col-sm-8 col-xs-12">{{ $article->created_at->diffForHumans() }}</b>
                                </div>
                            </div>
                            <div class="review-content-section col-sm-12">
                                <h1><small>Final Closure Date</small><small><b><b> -
                                            </b></b></small><small>{{ $cd }}</small></h1>
                            </div>
                        </div>
                    </div>
                    <ul class="text-left main-sparkline12-hd col-xs-12">
                        <h1>{{ $article->title }}</h1>
                    </ul>
                    <ul class=" main-sparkline12-hd col-sm-8">
                        <h1>Description</h1>
                    </ul>
                    <div id="myTabContent" class="tab-content custom-product-edit st-prf-pro">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="review-content-section col-sm-12">
                                    <p>{{ $article->description }}</p>
                                </div>
                            </div>


                            {{-- Start --}}

                            @foreach ($article->files as $file)
                                @php
                                    // Replace 'public/' with 'storage/' in the file path
                                    $filePath = str_replace('public/', 'storage/', $file->file_path);
                                @endphp

                                @if (Str::endsWith($file->file_path, ['.doc', '.docx']))
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="review-content-section col-sm-12">
                                            <a href="{{ asset($filePath) }}"
                                                class="col-lg-4 col-md-12 col-sm-12 col-xs-12 btn btn-custon-four btn-primary btn-lg">
                                                <i class="fa fa-file-word-o" style="font-size:18px">
                                                    <span>Contribution file as a Word Document</span></i></a>
                                        </div>
                                    </div>
                                @endif

                                {{-- Check if the file is a .doc or .docx and skip it --}}
                                {{-- @if (Str::endsWith($file->file_path, ['.doc', '.docx']))
                                @continue
                            @endif --}}
                            @endforeach



                        </div>
                    </div>
                </div>
            </div>
            {{-- Attached Photos --}}
            <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
                <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
                    <ul class="main-sparkline12-hd col-sm-8">
                        <h1>Attached Photos</h1>
                    </ul>
                    <div id="myTabContent" class="tab-content custom-product-edit st-prf-pro">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <!-- <div class="review-content-section" cellspacing="5" cellpadding="5"> -->
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="col-lg-12 custom-pro-edt-ds">
                                            <div class="review-content-section">
                                                @foreach ($article->files as $file)
                                                    @php
                                                        // Replace 'public/' with 'storage/' in the file path
                                                        $filePath = str_replace(
                                                            'public/',
                                                            'storage/',
                                                            $file->file_path,
                                                        );
                                                    @endphp

                                                    {{-- Check if the file is a .doc or .docx and skip it --}}
                                                    @if (Str::endsWith($file->file_path, ['.doc', '.docx']))
                                                        @continue
                                                    @endif

                                                    {{-- Display image --}}

                                                    <img class="main-logo btn-spacing" src="{{ asset($filePath) }}"
                                                        width="250px" />
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-10 col-sm-10 col-xs-12">
                                        <div class="review-content-section">
                                            <div class="login-horizental cancel-wp pull-left form-bc-ele col-lg-12">
                                                <div class="button-ap-list responsive-btn">
                                                    <div class="button-style-four btn-mg-b-10">

                                                        @hasRole(['Marketing Coordinator'])
                                                            @php

                                                                $closureDate = App\Models\Magazine::where(
                                                                    'id',
                                                                    $article->magazine_id,
                                                                )->first()->finalclosure_date;

                                                            @endphp


                                                            @if ($closureDate && now()->lt($closureDate))
                                                                <a href="/article/{{ $article->id }}/edit"><button
                                                                        type="button"
                                                                        class="col-lg-2 btn btn-custon-rounded-four btn-primary btn-spacing">Edit</button></a>
                                                            @endif
                                                        @endhasRole
                                                        {{-- <a href="/download-articles?article={{ $article->id }}"><button --}}
                                                        <a href="/download-articles"><button type="button"
                                                                class="col-lg-2 btn btn-custon-rounded-four btn-primary btn-spacing">Download</button></a>
                                                        {{--
                                                        <button type="button"
                                                            class="col-sm-2 btn btn-custon-rounded-four btn-primary">Download</button> --}}
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
        </form>


        <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">

            @php
                $canComment =
                    auth()
                        ->user()
                        ->hasRole(['Student', 'Marketing Coordinator']) || auth()->user()->id == $article->user_id;
            @endphp


            {{-- <form action="">
                <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn ">
                    <ul class="main-sparkline12-hd">
                        <bold>
                            <h1>------------------------------------------------------------------ Leave a comment
                                -------------------------------------------------------------------</h1>
                        </bold>
                    </ul> --}}
            <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn ">

                @if ($canComment)
                    <ul class="main-sparkline12-hd">
                        <bold>
                            <h1>------------------------------------------------------------------ Leave a comment
                                -------------------------------------------------------------------</h1>
                        </bold>
                    </ul>

                    <div class="p-xs">
                        <form action="/article/{{ $article->id }}/comments" method="post">
                            @csrf

                            <!-- <form method="get" class="form-horizontal"> -->
                            <div>
                                <textarea name="comment" type="text" class="form-control input-sm" placeholder="Comment"></textarea>

                                @error('comment')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="login-horizental cancel-wp pull-left form-bc-ele">
                                <button type="submit" class="btn btn-custon-rounded-four btn-primary">Submit</button>
                                <button type="reset" class="btn btn-custon-rounded-four btn-danger">Cancel</button>
                            </div>
                        </form>
                    </div>
                @endif


                <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
                    <div class="row">

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <br>
                                <ul class="main-sparkline12-hd">
                                    <bold>
                                        @if ($article->comments->count() == 0)
                                            <h1>----------------------------------------------------------------
                                                No Comments
                                                ----------------------------------------------------------------</h1>
                                        @else
                                            <h1>----------------------------------------------------------------
                                                Comments {{ $article->comments->count() }}
                                                ----------------------------------------------------------------</h1>
                                        @endif

                                    </bold>
                                </ul>

                                <br>



                                @foreach ($article->comments()->latest()->get() as $comment)
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

                                    @php
                                        $roleName =
                                            $comment->user->assignedRoles->first()->role->name ==
                                            'Marketing Coordinator';
                                    @endphp

                                    {{-- @dd($roleName); --}}
                                    {{-- @if ($article->comments()->latest()->first()->user->assignedRoles->first()->role->name == 'Marketing Coordinator') --}}
                                    <div
                                        class="alert {{ $roleName ? 'alert-warning' : 'alert-info' }} col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                            <div>
                                                <img src="{{ asset('storage/' . $comment->user->profile) }}"
                                                    width="40px" alt="">
                                                {{ $article->comments()->latest()->first()->user->role }}
                                                <strong>{{ $comment->user->name }}</strong><br><br>
                                                <p><b>{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</b>
                                                </p>

                                                {{ $comment->comment }}

                                            </div>
                                        </div>


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
                                            <form action="/article/comment/delete/{{ $comment->id }}"
                                                method="post">
                                                @csrf
                                                @method('delete')

                                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 text-right">
                                                    <button type="submit" class="btn btn-danger"><i
                                                            class="fa fa-trash-o"
                                                            style="font-size:15px"></i>Delete</button>
                                                </div>
                                            </form>
                                        @endif


                                    </div>
                                    {{-- @endif --}}


                                    {{-- @if ($article->comments()->latest()->first()->user->assignedRoles->first()->role->name == 'Student') --}}
                                    {{-- <div class="alert alert-info col-lg-12 col-md-12 col-sm-12 col-xs-12"
                                                role="alert">

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


                                                <div
                                                    class="d-flex justify-content-between  col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                    <div>
                                                        <img src="../img/notification/2.jpg" width="40px" alt="">
                                                        <strong>{{ $comment->user->name }}</strong><br><br>
                                <p><b>{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</b>
                                </p>
                                {{ $comment->comment }}
                            </div>
                        </div>

                        @if ($canDelete)
                        <form action="/article/comment/delete/{{ $comment->id }}" method="post">
                            @csrf
                            @method('delete')

                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 text-right">
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" style="font-size:15px"></i>Delete</button>
                            </div>
                        </form>
                        @endif
                    </div> --}}
                                    {{-- @endif --}}
                                @endforeach


                            </div>
                        </div>
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
    <!-- jquery
  ============================================ -->
    <script src="/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
  ============================================ -->
    <script src="/js/bootstrap.min.js"></script>
    <!-- wow JS
  ============================================ -->
    <script src="/js/wow.min.js"></script>
    <!-- price-slider JS
  ============================================ -->
    <script src="/js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
  ============================================ -->
    <script src="/js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
  ============================================ -->
    <script src="/js/owl.carousel.min.js"></script>
    <!-- sticky JS
  ============================================ -->
    <script src="/js/jquery.sticky.js"></script>
    <!-- scrollUp JS
  ============================================ -->
    <script src="/js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
  ============================================ -->
    <script src="/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="/js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
  ============================================ -->
    <script src="/js/metisMenu/metisMenu.min.js"></script>
    <script src="/js/metisMenu/metisMenu-active.js"></script>
    <!-- tab JS
  ============================================ -->
    <script src="/js/tab.js"></script>
    <!-- icheck JS
  ============================================ -->
    <script src="/js/icheck/icheck.min.js"></script>
    <script src="/js/icheck/icheck-active.js"></script>
    <!-- plugins JS
  ============================================ -->
    <script src="/js/plugins.js"></script>
    <!-- main JS
  ============================================ -->
    <script src="/js/main.js"></script>
</body>

</html>

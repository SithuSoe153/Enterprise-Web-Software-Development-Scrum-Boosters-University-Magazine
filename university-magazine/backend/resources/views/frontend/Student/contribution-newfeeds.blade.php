<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard V.2 | Kiaalap - Kiaalap Admin Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
  ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico">
    <!-- Google Fonts
  ============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
  ============================================ -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Bootstrap CSS
  ============================================ -->
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <!-- owl.carousel CSS
  ============================================ -->
    <link rel="stylesheet" href="../css/owl.carousel.css">
    <link rel="stylesheet" href="../css/owl.theme.css">
    <link rel="stylesheet" href="../css/owl.transitions.css">
    <!-- animate CSS
  ============================================ -->
    <link rel="stylesheet" href="../css/animate.css">
    <!-- normalize CSS
  ============================================ -->
    <link rel="stylesheet" href="../css/normalize.css">
    <!-- meanmenu icon CSS
  ============================================ -->
    <link rel="stylesheet" href="../css/meanmenu.min.css">
    <!-- main CSS
  ============================================ -->
    <link rel="stylesheet" href="../css/main.css">
    <!-- educate icon CSS
  ============================================ -->
    <link rel="stylesheet" href="../css/educate-custon-icon.css">
    <!-- morrisjs CSS
  ============================================ -->
    <link rel="stylesheet" href="../css/morris../js/morris.css">
    <!-- mCustomScrollbar CSS
  ============================================ -->
    <link rel="stylesheet" href="../css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
  ============================================ -->
    <link rel="stylesheet" href="../css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="../css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
  ============================================ -->
    <link rel="stylesheet" href="../css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="../css/calendar/fullcalendar.print.min.css">
    <!-- style CSS
  ============================================ -->
    <link rel="stylesheet" href="../style.css">
    <!-- responsive CSS
  ============================================ -->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- modernizr JS
  ============================================ -->
    <script src="../js/vendor/modernizr-2.8.3.min.js"></script>

    <!-- <style>
        .btn-spacing {
    margin-right: 40px;
    margin-bottom: 40px;
}
    </style> -->
</head>

<body>
    @include('frontend/Student/student-slidebar')

    <!-- End Header menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
                                                    <a href="#" data-toggle="dropdown" role="button"
                                                        aria-expanded="false" class="nav-link dropdown-toggle">
                                                        <span class="admin-name">Welcome
                                                            {{ auth()->user()->name }}</span>
                                                        <img
                                                            src="{{ asset('storage/' . auth()->user()->profile) }}"alt="">
                                                    </a>
                                                    <ul role="menu"
                                                        class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        <li><a href="student-profile.php"><span
                                                                    class="edu-icon edu-user-rounded author-log-ic"></span>My
                                                                Profile</a>
                                                        </li>
                                                        <li><a href="#"><span
                                                                    class="edu-icon edu-locked author-log-ic"></span>Log
                                                                Out</a>
                                                        </li>
                                                    </ul>
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

        <div class="library-book-area mg-t-30 text-left">
            <h1 class="col-lg-2 text-center">Article Feed</h1>
            @php
                use App\Models\Faculty;

                $facultyId = auth()
                    ->user()
                    ->assignedRoles->where('user_id', auth()->user()->id)
                    ->first()->faculty_id;
                $facultyName = Faculty::find($facultyId)->name;
            @endphp

            @foreach ($articles as $article)
                <div class="library-book-area mg-t-30 text-left">
                    <div class="container-fluid">
                        <div class="col-lg-12 ">
                            <div class="single-review-st-item res-mg-t-30 table-mg-t-pro-n">
                                <div class="single-review-st-text">
                                    <img src="../img/notification/1.jpg" alt="">
                                    <div class="review-ctn-hf">
                                        <h3 class="col-lg-12">{{ $article->user->name }}</h3>
                                        <p class="col-lg-2">{{ $facultyName }}</p>
                                        <li class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
                                            {{ \Carbon\Carbon::parse($article->created_at)->diffForHumans() }}</li>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
                            <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
                                <ul class="text-left main-sparkline12-hd col-xs-12">
                                    <h3>{{ $article->title }}</h3>
                                </ul>
                                <ul class="text-left main-sparkline12-hd col-xs-12">
                                    <h1>Description</h1>
                                </ul>
                                <div id="myTabContent" class="tab-content custom-product-edit st-prf-pro">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section col-sm-12">
                                                <p>{{ $article->description }}
                                                </p>
                                            </div>
                                        </div>
                                        {{-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section col-sm-12">
                                                <a href="#"
                                                    class="col-lg-5 col-md-12 col-sm-12 col-xs-12 btn btn-custon-four btn-primary btn-lg">
                                                    <i class="fa fa-file-word-o" style="font-size:18px"></i>
                                                    <span>Contribution file as a Word
                                                        Document</span> </a>
                                            </div>
                                        </div> --}}



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
                                                                <span>Contribution file as a Word
                                                                    Document</span></i></a>
                                                    </div>
                                                </div>
                                            @endif

                                            {{-- Check if the file is a .doc or .docx and skip it --}}
                                            {{-- @if (Str::endsWith($file->file_path, ['.doc', '.docx']))
                                                @continue
                                            @endif --}}
                                        @endforeach


                                        <div class="">
                                            <div class="review-content-section col-sm-10">
                                                <ul class="text-left main-sparkline12-hd col-xs-12">
                                                    <h1>Attached Photos</h1>
                                                </ul>
                                            </div>
                                        </div>

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



                                                        @if (Str::endsWith($file->file_path, ['.doc', '.docx']))
                                                            @continue
                                                        @else
                                                            <img class="main-logo btn-spacing img-fluid"
                                                                style="object-fit: cover; width: 250px; height: 250px;"
                                                                src="{{ asset($filePath) }}" width="250px" />
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach



        </div>

        <div>
            <!-- Footer Start-->
            <br>
            <br>
            @include('frontend.footer')
        </div>

    </div>

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
    <!-- counterup JS
  ============================================ -->
    <script src="../js/counterup/jquery.counterup.min.js"></script>
    <script src="../js/counterup/waypoints.min.js"></script>
    <script src="../js/counterup/counterup-active.js"></script>
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
    <script src="../js/morris../js/raphael-min.js"></script>
    <script src="../js/morris../js/morris.js"></script>
    <script src="../js/morris../js/morris-active.js"></script>
    <!-- morrisjs JS
  ============================================ -->
    <script src="../js/sparkline/jquery.sparkline.min.js"></script>
    <script src="../js/sparkline/jquery.charts-sparkline.js"></script>
    <script src="../js/sparkline/sparkline-active.js"></script>
    <!-- calendar JS
  ============================================ -->
    <script src="../js/calendar/moment.min.js"></script>
    <script src="../js/calendar/fullcalendar.min.js"></script>
    <script src="../js/calendar/fullcalendar-active.js"></script>
    <!-- plugins JS
  ============================================ -->
    <script src="../js/plugins.js"></script>
    <!-- main JS
  ============================================ -->
    <script src="../js/main.js"></script>
</body>

</html>

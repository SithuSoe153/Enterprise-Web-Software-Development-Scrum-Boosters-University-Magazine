<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Student Dashboard</title>
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
    <link rel="stylesheet" href="../css/morris/js/morris.css">
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
    <!-- x-editor CSS
  ============================================ -->
    <link rel="stylesheet" href="../css/editor/select2.css">
    <link rel="stylesheet" href="../css/editor/datetimepicker.css">
    <link rel="stylesheet" href="../css/editor/bootstrap-editable.css">
    <link rel="stylesheet" href="../css/editor/x-editor-style.css">
    <!-- normalize CSS
  ============================================ -->
    <link rel="stylesheet" href="../css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="../css/data-table/bootstrap-editable.css">
    <!-- style CSS
  ============================================ -->
    <link rel="stylesheet" href="../style.css">
    <!-- responsive CSS
  ============================================ -->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- modernizr JS
  ============================================ -->
    <script src="../js/vendor/modernizr-2.8.3.min.js"></script>

    <style>
        #table th,
        #table td {
            text-align: center;
        }
    </style>
</head>

<body>


    @include('frontend/Guest/guest-slidebar')



    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="index.php"><img class="main-logo" src="../img/scrumlogo.png" width="150px"
                                alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <br>
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


            @php

                use App\Models\AssignedRole;
                use App\Models\Faculty;

                $facultyId = auth()
                    ->user()
                    ->assignedRoles->where('user_id', auth()->user()->id)
                    ->first()->faculty_id;
                // Find the Marketing Coordinator of the specified faculty
                $marketingCoordinator = AssignedRole::where('faculty_id', $facultyId)
                    ->where('role_id', 2) // Assuming 2 represents the Marketing Coordinator role
                    ->first();
                $facultyName = Faculty::find($facultyId)->name;

            @endphp



            <!-- Mobile Menu start -->
            <!-- Mobile Menu end -->
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                            @if (session()->has('success'))
                                <br>
                                <div class="alert alert-success text-center" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif


                            <div class="breadcome-list single-page-breadcome">
                                <div class="row">
                                    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                        <div class="breadcome-heading">
                                            <h1 style="display: inline;"><small>Exploring Student Talent: A Statistical
                                                    Review of University Magazine Submissions from</small></h1>
                                            <h4 style="display: inline;"> {{ $facultyName }} </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Static Table Start -->
        <div class="analytics-sparkle-area">
            <div class="container-fluid">



                @php
                    use App\Models\Article;
                    use App\Models\User;

                    use App\Models\Magazine;
                    $cd = Magazine::latest()->get()->first()->finalclosure_date;

                    $allcontributions = Article::all()->count();

                    $facultyId = auth()
                        ->user()
                        ->assignedRoles->where('user_id', auth()->user()->id)
                        ->first()->faculty_id;

                    $totalArticlesInFaculty = Article::whereHas('user', function ($query) use ($facultyId) {
                        $query->whereHas('assignedRoles', function ($innerQuery) use ($facultyId) {
                            $innerQuery->where('faculty_id', $facultyId);
                        });
                    })
                        ->where('is_selected', 1)
                        ->count();

                    $totalArticlesInFaculty0 = Article::whereHas('user', function ($query) use ($facultyId) {
                        $query->whereHas('assignedRoles', function ($innerQuery) use ($facultyId) {
                            $innerQuery->where('faculty_id', $facultyId);
                        });
                    })->count();

                    // echo $totalArticlesInFaculty;

                    $students = User::whereHas('assignedRoles', function ($query) use ($facultyId) {
                        $query->where('faculty_id', $facultyId)->whereHas('role', function ($subQuery) {
                            $subQuery->where('id', 4); // Assuming you want to match by role ID directly
                            // Or if you want to match by role name
                            // $subQuery->where('name', 'Student');
                        });
                    })->get();

                    $studentsCount = $students->count();

                    $uniqueContributorsCount = Article::whereHas('user', function ($query) use ($facultyId) {
                        $query->whereHas('assignedRoles', function ($innerQuery) use ($facultyId) {
                            $innerQuery->where('faculty_id', $facultyId);
                        });
                    })
                        ->distinct('user_id')
                        ->count('user_id');

                    // $userArticleCount = auth()->user()->articles()->count();
                    $percentage =
                        $totalArticlesInFaculty > 0 ? ($totalArticlesInFaculty / Faculty::all()->count()) * 100 : 0;
                    $percentageunit =
                        $totalArticlesInFaculty0 > 0 ? ($uniqueContributorsCount / $studentsCount) * 100 : 0;
                    $percentage = number_format($percentage, 0);
                    $percentageunit = number_format($percentageunit, 0);
                @endphp


                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30">
                            <div class="analytics-content">
                                <h5>Number of Contrbutions in the Faculty</h5>
                                <h2><span class="counter">{{ $totalArticlesInFaculty }} units</span> <span
                                        class="tuition-fees"></span></h2>
                                <span class="text-success">{{ $percentage }}%</span>
                                <div class="progress m-b-0">
                                    <div class="progress-bar progress-bar-success" role="progressbar"
                                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"
                                        style="width:{{ $percentage }}%;">
                                        <span class="sr-only">20% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30">
                            <div class="analytics-content">
                                <h5>Percentage of Contributions in the Faculty</h5>
                                <h2><span class="counter">{{ $percentage }}%</span> <span
                                        class="tuition-fees"></span></h2>
                                <span class="text-danger">{{ $percentage }}%</span>
                                <div class="progress m-b-0">
                                    <div class="progress-bar progress-bar-danger" role="progressbar"
                                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"
                                        style="width:{{ $percentage }}%;">
                                        <span class="sr-only">230% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30 table-mg-t-pro dk-res-t-pro-30">
                            <div class="analytics-content">
                                <h5>Number of Contributors in the Faculty</h5>
                                <h2><span class="counter">{{ $uniqueContributorsCount }} units</span> <span
                                        class="tuition-fees"></span></h2>
                                <span class="text-info">{{ $percentageunit }}%</span>
                                <div class="progress m-b-0">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50"
                                        aria-valuemin="0" aria-valuemax="100" style="width:{{ $percentageunit }}%;">
                                        <span class="sr-only">20% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <br>


        <div class="breadcome-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <!-- <div class="breadcome-list single-page-breadcome"> -->
                        <!-- <div class="row"> -->
                        <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                            <!-- <div class="breadcome-heading"> -->
                            <small>
                                <h1>Coordinator's Pick: Selected Contributions from {{ $facultyName }}</h1>
                            </small>
                            <!-- </div> -->
                        </div>
                        <!-- </div> -->
                        <!-- </div> -->
                    </div>
                </div>


                @foreach ($articles as $article)
                    <div class="mb-5">


                        <form action="">
                            <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
                                <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
                                    <div class="single-review-st-item res-mg-t-30 table-mg-t-pro-n">
                                        <div class="single-review-st-text">
                                            <img src="{{ asset('storage/' . $article->user->profile) }}"
                                                width="40px" alt="">
                                            <div class="review-ctn-hf">
                                                <h3 class="col-lg-12">{{ $article->user->name }}</h3>
                                                <p class="col-lg-2">
                                                    {{ $article->user->assignedRoles->first()->faculty->name }}

                                                </p>
                                                <li class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
                                                    {{ $article->created_at->diffForHumans() }}</li>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="text-left main-sparkline12-hd col-xs-12">
                                        <h1></h1>
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

                                            <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
                                                <div class="review-content-section col-sm-12">
                                                    <h5>Final Closure Date</h5>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
                                                <div class="review-content-section col-sm-12">
                                                    {{ $cd }}
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

                                        </div>
                                    </div>
                                </div>
                            </div>

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

                                                                    <img class="main-logo btn-spacing"
                                                                        src="{{ asset($filePath) }}"
                                                                        width="250px" />
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-5">
                                    <br>
                                </div>

                            </div>
                        </form>



                    </div>
                @endforeach



            </div>
        </div>
        <br>



        @include('frontend.footer')
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
    <!-- mCustomScrollbar JS
  ============================================ -->
    <script src="../js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
  ============================================ -->
    <script src="../js/metisMenu/metisMenu.min.js"></script>
    <script src="../js/metisMenu/metisMenu-active.js"></script>
    <!-- data table JS
  ============================================ -->
    <script src="../js/data-table/bootstrap-table.js"></script>
    <script src="../js/data-table/tableExport.js"></script>
    <script src="../js/data-table/data-table-active.js"></script>
    <script src="../js/data-table/bootstrap-table-editable.js"></script>
    <script src="../js/data-table/bootstrap-editable.js"></script>
    <script src="../js/data-table/bootstrap-table-resizable.js"></script>
    <script src="../js/data-table/colResizable-1.5.source.js"></script>
    <script src="../js/data-table/bootstrap-table-export.js"></script>
    <!--  editable JS
  ============================================ -->
    <script src="../js/editable/jquery.mockjax.js"></script>
    <script src="../js/editable/mock-active.js"></script>
    <script src="../js/editable/select2.js"></script>
    <script src="../js/editable/moment.min.js"></script>
    <script src="../js/editable/bootstrap-datetimepicker.js"></script>
    <script src="../js/editable/bootstrap-editable.js"></script>
    <script src="../js/editable/xediable-active.js"></script>
    <!-- Chart JS
  ============================================ -->
    <script src="../js/chart/jquery.peity.min.js"></script>
    <script src="../js/peity/peity-active.js"></script>
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

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Data Table | Kiaalap - Kiaalap Admin Template</title>
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
        .breadcome-heading.mgg {
            margin-left: 1.2%;
        }
    </style>


</head>





<body>

    @include('frontend/Marketing Manager/manager-slidebar')


    @php
        use App\Models\Magazine;
        $cd = Magazine::latest()->get()->first()->closure_date;

    @endphp

    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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



            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list single-page-breadcome">
                                <div class="row">
                                    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                        <div class="breadcome-heading">
                                            <h1 style="display: inline;"><small>Exploring Student Talent: A Statistical
                                                    Review of University Magazine Submissions from</small></h1>
                                            <h4 style="display: inline;"> {{ $faculty->name }}</h4>
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


        @php
            use App\Models\Article;
            use App\Models\User;
            use App\Models\Faculty;

            $allcontributions = Article::all()->count();

            $facultyId = $faculty->id;

            $totalArticlesInFaculty = Article::whereHas('user', function ($query) use ($facultyId) {
                $query->whereHas('assignedRoles', function ($innerQuery) use ($facultyId) {
                    $innerQuery->where('faculty_id', $facultyId)->where('is_selected', 1);
                });
            })->count();

            // echo $totalArticlesInFaculty;

            $students = User::whereHas('assignedRoles', function ($query) use ($facultyId) {
                $query->where('faculty_id', $facultyId)->whereHas('role', function ($subQuery) {
                    $subQuery->where('id', 4); // Assuming you want to match by role ID directly
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
            $percentage = $totalArticlesInFaculty > 0 ? ($totalArticlesInFaculty / Faculty::all()->count()) * 100 : 0;
            $percentageunit = $totalArticlesInFaculty > 0 ? ($uniqueContributorsCount / $studentsCount) * 100 : 0;
            $percentage = number_format($percentage, 0);
            $percentageunit = number_format($percentageunit, 0);
        @endphp




        <div class="breadcome-area">
            <div class="container-fluid">


                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30">
                            <div class="analytics-content">
                                <h5>Number of Contrbutions</h5>
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
                                <h5>Percentage of Contributions</h5>
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
                                <h5>Number of Contributors</h5>
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
        <p>


        <div class="container-fluid">
            <div class="data-table-area mg-b-15">

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="breadcome-heading mgg">
                                    <div class="row ms-50">
                                        <div class="col">
                                            <h1 style="display: inline;"><small>Selected Contribution's Picks: Selected
                                                    Contributions from</small></h1>
                                            <h4 style="display: inline;">{{ $faculty->name }}</h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="sparkline13-graph">
                                    <div class="datatable-dashv1-list custom-datatable-overright">
                                        <table id="table" data-toggle="table" data-pagination="true"
                                            data-search="true" data-resizable="true" data-cookie="true"
                                            data-cookie-id-table="saveId" data-click-to-select="true"
                                            data-toolbar="#toolbar">
                                            <thead>
                                                <tr>
                                                    <th data-field="id">ID</th>
                                                    <th>Article</th>
                                                    <th>Submission Date</th>
                                                    <th>Student Name</th>
                                                    <th>Email</th>
                                                    <th>Closure Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>


                                            @php
                                                $i = 1;
                                            @endphp


                                            <tbody>

                                                @foreach ($articles as $article)
                                                    @php
                                                        $canCheck = $article->comments->count() != 0;

                                                        $noComments = $article->comments->count() === 0;
                                                        $createdDate = \Carbon\Carbon::parse($article->created_at);
                                                        $isDelayed =
                                                            $createdDate->diffInDays(\Carbon\Carbon::now()) > 14;
                                                    @endphp
                                                    <tr>
                                                        <td>{{ $i++ }}</td>
                                                        <td>{{ $article->title }}</td>
                                                        <td>{{ $article->created_at->format('d-M-Y') }}</td>
                                                        <td>{{ $article->user->name }}</td>
                                                        <td>{{ $article->user->email }}</td>
                                                        <td>{{ $cd }}</td>
                                                        <td><button class="btn btn-custon-four btn-primary btn-xs">
                                                                <a href="/mc/article-detail/{{ $article->id }}"
                                                                    style="color: white;">See More</a></button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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

        <!-- Charts JS
  ============================================ -->
        <script src="../js/charts/Chart.js"></script>
        <script src="../js/charts/bar-chart.js"></script>

        <!-- tab JS
  ============================================ -->
        <script src="../js/tab.js"></script>
        <!-- plugins JS
  ============================================ -->
        <script src="../js/plugins.js"></script>
        <!-- main JS
  ============================================ -->
        <script src="../js/main.js"></script>

        <script src="../js/charts/Chart.js"></script>
        <script src="../js/charts/rounded-chart.js"></script>
</body>

</html>

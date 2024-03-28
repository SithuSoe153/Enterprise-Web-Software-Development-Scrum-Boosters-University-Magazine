<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Student Profile | Kiaalap - Kiaalap Admin Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
  ============================================ -->
    <link rel="shortcut icon" type="../image/x-icon" href="../img/favicon.ico">
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
    <link rel="stylesheet" href="../css/morrisjs/morris.css">
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
    <!-- forms CSS
  ============================================ -->
    <link rel="stylesheet" href="../css/form/all-type-forms.css">
    <!-- style CSS
  ============================================ -->
    <link rel="stylesheet" href="../style.css">
    <!-- responsive CSS
  ============================================ -->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- modernizr JS
  ============================================ -->
    <script src="../js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>

    @include('frontend/Marketing Manager/manager-slidebar')


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
            @if (session()->has('success'))
                <br>
                <div class="alert alert-success text-center" role="alert">
                    {{ session('success') }}
                </div>
            @endif
        </div>



        <!-- Single pro tab review Start-->
        <div class="single-pro-review-area mt-t-30 mg-b-15">

            <div class="breadcome-area">
                <div class="container-fluid">


                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                <h1>Download University Magazines</h1>
                            </div>


                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <select id="magazineSelect" class="form-control"
                                    placeholder="University Magazines - Academic year">
                                    @foreach ($magazines as $magazine)
                                        <option value="{{ $magazine->id }}">{{ $magazine->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <form action="/download-articles" method="get">
                                @csrf
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <button id="downloadButton" type="submit"
                                        class="btn btn-custon-four btn-primary btn-lg">Download</button>
                                </div>
                            </form>

                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    var selectElement = document.getElementById("magazineSelect");
                                    var downloadButton = document.getElementById("downloadButton");

                                    // Add change event listener to the select element
                                    selectElement.addEventListener("change", function() {
                                        var selectedIndex = selectElement.selectedIndex;
                                        var closureDate = @json($magazines->pluck('finalclosure_date'));

                                        // Check if closure date is beyond today's date for the selected magazine
                                        if (closureDate[selectedIndex] && new Date(closureDate[selectedIndex]) < new Date()) {
                                            downloadButton.disabled = false; // Enable the button
                                        } else {
                                            downloadButton.disabled = true; // Disable the button
                                        }
                                    });
                                });
                            </script>

                            {{--
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <select name="" id="" class="form-control"
                                    placeholder="University Magazines - Academic year">
                                    @foreach ($magazines as $magazine)
                                        @php
                                            $closureDate = App\Models\Magazine::latest()->first()->closure_date;
                                            // @dd($closureDate)
                                        @endphp

                                        @if ($closureDate && now()->gt($closureDate))
                                        @endif


                                        <option>{{ $magazine->title }}</option>
                                        <button type="button"
                                            class="btn btn-custon-four btn-primary btn-lg">Download</button>
                                    @endforeach

                                </select>
                                <!-- <input type="text" class="form-control" placeholder="University Magazines - Academic year"> -->
                            </div> --}}
                            <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                <br>
                                <br>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <!-- <div class="breadcome-list single-page-breadcome"> -->
                            <!-- <div class="row"> -->
                            <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                <!-- <div class="breadcome-heading"> -->
                                <h1>Faculty Directory</h1>
                                <!-- </div> -->
                            </div>
                            <!-- </div> -->
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">



                        @foreach ($faculties as $faculty)
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div
                                    class="breadcome-list single-page-breadcome col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <img src="../img/profile/1.jpg" alt="" class="col-lg-5" />
                                    <h2><small><b>{{ $faculty->name }}</b> </small></h2>

                                    @php
                                        $users = App\Models\User::whereHas('assignedRoles', function ($query) use (
                                            $faculty,
                                        ) {
                                            $query->where('faculty_id', $faculty->id)->where('role_id', 2);
                                        })->get();
                                    @endphp

                                    @if ($users->isNotEmpty())
                                        <h3><small><b>Marketing Coordinator</b><span> -
                                                </span><span>{{ $users[0]->name }}</span></small></h3>
                                    @else
                                        <p>No user found.</p>
                                    @endif

                                    <div>
                                        <b hidden> </b> <br>
                                    </div>
                                    <a href="/dashboard?faculty={{ $faculty->id }}"><button
                                            class="btn btn-custon-four btn-primary">Explore
                                            Contribution</button></a>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
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

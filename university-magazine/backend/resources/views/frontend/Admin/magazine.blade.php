<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Magazine</title>
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

    <style>
        .btn-spacing {
            margin-right: 10px;
        }

        .rounded {
            border-radius: 50px;
            /* Adjust the value as per your preference */
        }
    </style>
</head>

<body>




    @include('frontend/Admin/admin-slidebar')



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
            @if (session()->has('success'))
                <div class="alert alert-danger text-center" role="alert">
                    {{ session('success') }}
                </div>
            @endif


        </div>
        <!-- Single pro tab review Start-->
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
                            <ul id="myTabedu1" class="tab-review-design">
                                <h1>Create New Magazine</h1>

                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit st-prf-pro">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <form action="/magazine/store" method="POST">
                                            @csrf
                                            @method('POST')

                                            <div class="review-content-section">
                                                <div class="row">
                                                    <div class="col-lg-6">

                                                        <label for="">Magazine Title</label>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="title"
                                                                placeholder="Magazine Title">
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="">Submission Date</label>
                                                            <div class="form-group">
                                                                <link rel="stylesheet"
                                                                    href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
                                                                <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
                                                                <input type="text" class="form-control rounded"
                                                                    name="open_date" id="datePicker"
                                                                    placeholder="DD/MM/YYYY">
                                                                <script>
                                                                    flatpickr("#datePicker", {
                                                                        altInput: true,
                                                                        altFormat: "d/m/Y",
                                                                        dateFormat: "Y-m-d",
                                                                    });
                                                                </script>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="">Closure Date</label>
                                                            <div class="form-group">
                                                                <link rel="stylesheet"
                                                                    href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
                                                                <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
                                                                <input type="text" class="form-control rounded"
                                                                    name="closure_date" id="datePicker"
                                                                    placeholder="DD/MM/YYYY">
                                                                <script>
                                                                    flatpickr("#datePicker", {
                                                                        altInput: true,
                                                                        altFormat: "d/m/Y",
                                                                        dateFormat: "Y-m-d",
                                                                    });
                                                                </script>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="">SubmissionFinal Closure Date</label>
                                                            <div class="form-group">
                                                                <link rel="stylesheet"
                                                                    href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
                                                                <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
                                                                <input type="text" class="form-control rounded"
                                                                    name="finalclosure_date" id="datePicker"
                                                                    placeholder="DD/MM/YYYY">
                                                                <script>
                                                                    flatpickr("#datePicker", {
                                                                        altInput: true,
                                                                        altFormat: "d/m/Y",
                                                                        dateFormat: "Y-m-d",
                                                                    });
                                                                </script>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <!-- <div class="login-horizental cancel-wp pull-left form-bc-ele"> -->
                                                        <button type="submit"
                                                            class="btn btn-custon-four btn-primary rounded col-lg-2 btn-spacing">
                                                            <i class="fa fa-check edu-checked-pro"
                                                                aria-hidden="true"></i>
                                                            <a href="#" data-toggle="modal"
                                                                data-target="#zoomInDown1"
                                                                style="color: white;">Create</a></button>
                                                        <button type="reset"
                                                            class="btn btn-custon-four btn-danger rounded col-lg-2">
                                                            <i class="fa fa-times edu-danger-error"
                                                                aria-hidden="true"></i> Cancel</button>
                                                        <!-- </div> -->

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

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>User enroll</title>
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



    @include('frontend/Admin/admin-slidebar')

    @php

        use App\Models\Faculty;

        $faculties = Faculty::all();

    @endphp

    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                    <img class="main-logo" src="../img/scrumlogo.png" width="150px" alt="" />
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
        <br>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                    <h1>Create User Account Here</h1>
                </div>
            </div>
        </div>
        <!-- Single pro tab review Start-->
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#reviews">Marketing Manager</a></li>
                                <li><a href="#description">Marketing Coordinator</a></li>
                                <li><a href="#INFORMATION">Student</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="reviews">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <form action="/submit-form" method="post"
                                                class="dropzone dropzone-custom needsclick add-professors"
                                                id="demo1-upload">
                                                @csrf

                                                <input type="hidden" name="role" value="3">

                                                <h1><small><b><label for="">Create Marketing Manager
                                                                Account</label></b></small></h1>

                                                <div class="row">


                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="form-group">
                                                            <input name="name" type="text" class="form-control"
                                                                placeholder="Marketing Manager Name" required
                                                                value="{{ old('name') }}">

                                                            @error('name')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror


                                                        </div>
                                                        <div class="form-group">
                                                            <input name="email" type="email" class="form-control"
                                                                placeholder="Email Address" required
                                                                value="{{ old('email') }}">

                                                            @error('email')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <input name="password" type="password"
                                                                class="form-control" placeholder="Password" required>
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="login-horizental cancel-wp pull-left form-bc-ele">
                                                            <button type="submit"
                                                                class="btn btn-custon-four btn-primary">Create
                                                                Account</button>
                                                            <button type="reset"
                                                                class="btn btn-custon-four btn-danger">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-tab-list tab-pane fade" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <form action="/submit-form" method="post"
                                                class="dropzone dropzone-custom needsclick add-professors"
                                                id="demo1-upload">

                                                @csrf

                                                <h1><small><b><label for="">Create Marketing Coordinator
                                                                Account</label></b></small></h1>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group">

                                                            <input type="hidden" name="role" value="2">


                                                            <input name="name" type="text" class="form-control"
                                                                placeholder="Marketing Coordinator Name"
                                                                value="{{ old('name') }}">
                                                            @error('name')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <input name="email" type="email" class="form-control"
                                                                placeholder="Email Address"
                                                                value="{{ old('email') }}">
                                                            @error('email')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <input name="password" type="password"
                                                                class="form-control" placeholder="Password">
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-12 col-md-9 col-sm-9 col-xs-12">
                                                                    <div class="form-select-list">
                                                                        <label for="">Choose faculty</label>
                                                                        <select required
                                                                            class="form-control custom-select-value"
                                                                            name="faculty_id">
                                                                            <option value="">Select Faculty
                                                                            </option>
                                                                            @foreach ($faculties as $faculty)
                                                                                <option value="{{ $faculty->id }}">
                                                                                    {{ $faculty->name }}</option>
                                                                            @endforeach
                                                                        </select>



                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="login-horizental cancel-wp pull-left form-bc-ele">
                                                            <button type="submit"
                                                                class="btn btn-custon-four btn-primary">
                                                                <i class="fa fa-check edu-checked-pro"
                                                                    aria-hidden="true"></i>Create Account</button>
                                                            <button type="reset"
                                                                class="btn btn-custon-four btn-danger">
                                                                <i class="fa fa-times edu-danger-error"
                                                                    aria-hidden="true"></i> Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-tab-list tab-pane fade" id="INFORMATION">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <form action="/submit-form" method="post"
                                                class="dropzone dropzone-custom needsclick add-professors"
                                                id="demo1-upload">
                                                @csrf

                                                <h1><small><b><label for="">Create Student
                                                                Account</label></b></small></h1>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group">

                                                            <input type="hidden" name="role" value="4">


                                                            <input name="name" type="text" class="form-control"
                                                                placeholder="Student Name"
                                                                value="{{ old('name') }}">
                                                            @error('name')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror

                                                        </div>


                                                        <div class="form-group">
                                                            <input name="email" type="email" class="form-control"
                                                                placeholder="Email Address"
                                                                value="{{ old('email') }}">
                                                            @error('email')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>


                                                        <div class="form-group">
                                                            <input name="password" type="password"
                                                                class="form-control" placeholder="Password">
                                                        </div>


                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-lg-12 col-md-9 col-sm-9 col-xs-12">
                                                                    <div class="form-select-list">


                                                                        <label for="">Choose faculty</label>
                                                                        <select required
                                                                            class="form-control custom-select-value"
                                                                            name="faculty_id">
                                                                            <option value="">Select Faculty
                                                                            </option>
                                                                            @foreach ($faculties as $faculty)
                                                                                <option value="{{ $faculty->id }}">
                                                                                    {{ $faculty->name }}</option>
                                                                            @endforeach
                                                                        </select>


                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="form-group-inner">
                                                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="file-upload-inner ts-forms">
                                                                <div class="input prepend-small-btn">
                                                                    <div class="file-button">
                                                                        Browse
                                                                        <input type="file" onchange="document.getElementById('prepend-small-btn').value = this.value;">
                                                                    </div>
                                                                    <input type="text" id="prepend-small-btn" placeholder="no file selected">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="login-horizental cancel-wp pull-left form-bc-ele">
                                                            <button type="submit"
                                                                class="btn btn-custon-four btn-primary">
                                                                <i class="fa fa-check edu-checked-pro"
                                                                    aria-hidden="true"></i> Create Account</button>
                                                            <button type="reset"
                                                                class="btn btn-custon-four btn-danger">
                                                                <i class="fa fa-times edu-danger-error"
                                                                    aria-hidden="true"></i> Cancel</button>
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

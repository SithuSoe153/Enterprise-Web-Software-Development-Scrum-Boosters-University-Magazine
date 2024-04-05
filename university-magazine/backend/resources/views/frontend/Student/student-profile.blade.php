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

    @hasRole(['Marketing Manager'])
        @include('frontend/Marketing Manager/manager-slidebar')
    @endhasRole
    @hasRole(['Marketing Coordinator'])
        @include('frontend/Marketing Coordinator/coordinator-slidebar')
    @endhasRole
    @hasRole(['Student'])
        @include('frontend/Student/student-slidebar')
    @endhasRole
    @hasRole(['Guest'])
        @include('frontend/Guest/guest-slidebar')
    @endhasRole
    @hasRole(['Admin'])
        @include('frontend/Admin/admin-slidebar')
    @endhasRole



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

        @if (session()->has('success'))
            <div class="alert alert-success text-center" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <form action="/student/{{ auth()->user()->id }}/update" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <!-- Single pro tab review Start-->
            <div class="single-pro-review-area mt-t-30 mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="breadcome-area">
                            <div class="container-fluid">


                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="col-lg-7 col-md-6 col-sm-6 col-xs-12">
                                            <h1>Profile Settings: Manage Your Information</h1>
                                        </div>
                                        <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12">
                                            <h1><small><span>Your Last Login: <span>
                                                            {{ request()->cookie('previousLogin') }}</span> |
                                                        <span>
                                                            {{ \Carbon\Carbon::parse(request()->cookie('previousLogin'))->diffForHumans() }}</span>
                                                    </span></small></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <br>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-left">

                            <div class="profile-info-inner">
                                <!-- <ul id="myTabedu1" class="tab-review-design"> -->
                                <h3>Your Profile</h3>
                                <!-- </ul> -->
                                <div class="text-left">
                                    <img src="{{ asset('storage/' . auth()->user()->profile) }}" width="310px"
                                        alt="" />

                                </div>

                                @php
                                    use App\Models\Faculty;
                                    $facultyId = auth()
                                        ->user()
                                        ->assignedRoles->where('user_id', auth()->user()->id)
                                        ->first()->faculty_id;
                                    if ($facultyId !== null) {
                                        $facultyName = Faculty::find($facultyId)->name;
                                    }

                                @endphp


                                <div class="profile-details-hr">
                                    <div class="text-left">
                                        <div>
                                            <b>Student Name: </b> {{ auth()->user()->name }}<br>
                                            @if (!auth()->user()->hasRole(['Marketing Manager', 'Admin']))
                                                <b>Faculty Name: </b> {{ $facultyName }}<br>
                                            @endif
                                            <b>Email Address: </b>{{ auth()->user()->email }} <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
                                <ul id="myTabedu1" class="tab-review-design">
                                    <h1><small><b>Update Details</b></small> </h1>
                                </ul>
                                <div id="myTabContent" class="tab-content custom-product-edit st-prf-pro">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="row">
                                                    <div class="form-group col-lg-12 ">
                                                        <input type="text" name="name" class="form-control"
                                                            placeholder="Student Name"
                                                            value="{{ old('name', auth()->user()->name) }}">
                                                        @error('name')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                name="old_password" placeholder="Old Password">
                                                        </div>

                                                        @error('old_password')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                name="password" placeholder="Enter New Password">
                                                            @error('password')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                        <label class="">
                                                                Upload your profile
                                                            </label>
                                                        </div>
                                                    </div>
                                                
                                                    <div class="form-group col-lg-12 ">
                                                        <div class="file-upload-inner ts-forms">
                                                            <div class="input prepend-big-btn">
                                                                <label class="icon-right" for="prepend-big-btn">
                                                                    <i class="fa fa-download"></i>
                                                                </label>
                                                                <div class="file-button">
                                                                    Browse
                                                                    <input type="file" name="profile"
                                                                        accept="image/*"
                                                                        onchange="document.getElementById('prepend-big-btn').value = this.value;">
                                                                </div>
                                                                <input type="text" id="prepend-big-btn"
                                                                    placeholder="no file selected">
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
                                                                    aria-hidden="true"></i> Save Changes</button>
                                                            <button type="reset"
                                                                class="btn btn-custon-four btn-danger">
                                                                <i class="fa fa-times edu-danger-error"
                                                                    aria-hidden="true"></i> Cancel</button>
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


        </form>

        @hasRole(['Guest'])
            <div class="single-pro-review-area mt-t-30 mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <br>
                        <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
                            <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn col-lg-7">
                                <br>
                                <br>
                                <h1>
                                    <h1 class="col-lg-12 col-md-8 col-sm-8 col-xs-12 text-left"><b>A Fresh Start:</b></h1>
                                    <h1 class="col-lg-12 col-md-8 col-sm-8 col-xs-12"><b>Meet Our New Faculty</b> </h1>
                                    <br>
                                </h1>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                            </div>

                            <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn col-lg-5">

                                <form action="/guest/{{ auth()->user()->id }}/update" method="POST">

                                    @csrf
                                    @method('PATCH')

                                    <div class="review-content-section">
                                        <div class="row">
                                            <div class="form-group col-lg-12">



                                                <select id="faculitySelect" class="form-control" name="faculitySelect"
                                                    placeholder="University Magazines - Academic year">
                                                    @foreach ($faculties as $faculty)
                                                        <option value="{{ $faculty->id }}"
                                                            {{ $faculty->id == $facultyId ? 'selected' : '' }}>
                                                            {{ $faculty->name }}</option>
                                                    @endforeach

                                                </select>


                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="login-horizental cancel-wp pull-left form-bc-ele text-5">
                                                    <button type="submit" class="btn btn-custon-four btn-primary">
                                                        <i class="fa fa-check edu-checked-pro" aria-hidden="true"></i>
                                                        Save
                                                        Changes</button>
                                                    <button type="reset" class="btn btn-custon-four btn-danger">
                                                        <i class="fa fa-times edu-danger-error" aria-hidden="true"></i>
                                                        Cancel</button>
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
        @endhasRole


        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-left">


                    </div>
                </div>
            </div>

            <!-- Footer Start-->
            @include('frontend.footer')

        </div>

        <!-- <div class="footer-copyright-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="footer-copy-right">
                </div>
            </div>
        </div>
    </div>
</div> -->





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

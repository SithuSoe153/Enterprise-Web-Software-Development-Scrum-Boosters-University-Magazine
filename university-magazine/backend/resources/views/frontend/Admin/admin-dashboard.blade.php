<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin Dashboard</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-jvpbz8/0wYX18zWzJ4j/zDQDFYsCKNC4Vz/w+JS6fJ/6+/+G3S9PvLVt1pyVpEza1zLOJ+jdxB9XZ+0snCzC9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="../js/vendor/modernizr-2.8.3.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <style>
        .breadcome-heading.mgg {
            margin-left: 1.2%;
        }

        #table th,
        #table td {
            text-align: center;
        }
    </style>


</head>

<body>


    @include('frontend/Admin/admin-slidebar')



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

        <!-- <div class="breadcome-area"> -->
        <!-- <div class="container-fluid"> -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">


                <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">

                    @if (session()->has('success'))
                        <br>
                        <div class="alert alert-success text-center" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <h1>Website Analytics Overview</h1>
                </div>
            </div>
        </div>
        <!-- </div> -->
        <!-- </div> -->
        <!-- Static Table Start -->
        <div class="analytics-sparkle-area">
            <div class="container-fluid">
                <div class="row">


                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30">
                            <div class="analytics-content">
                                <h5>Most Active Users</h5>

                                @foreach ($mostActiveUsers as $user)
                                    @php
                                        $maxVisits = $mostActiveUsers->max('visit_count'); // Get the maximum visit count among all users
                                        $widthPercentage = ($user->visit_count / $maxVisits) * 100; // Calculate width percentage
                                    @endphp

                                    {{-- {{ $user->visit_count }}, --}}
                                    {{-- <br> --}}

                                    <h2><small><b> {{ $user->user_name }},
                                                ({{ $user->role_name }})
                                                from
                                                {{ $user->faculty_name }}</b></small>
                                    </h2>
                                    <div class="progress m-b-0">
                                        <div class="progress-bar progress-bar-danger" role="progressbar"
                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"
                                            style="width:{{ $widthPercentage }}%;">
                                            {{-- <span class="sr-only">230% Complete</span> --}}
                                        </div>
                                    </div>
                                    {{-- <h6 class="col-lg-12 col-md-6 col-sm-6 col-xs-12 text-center"><small><b>Visit
                                                Times</b></small></h6> --}}
                                    <br>
                                @endforeach


                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30">
                            <div class="analytics-content">
                                <h5>Most Viewed Page</h5>


                                @foreach ($mostVisitedUrls as $mostVisitedUrl)
                                    @php
                                        $maxVisits = $mostVisitedUrls->max('visit_count'); // Get the maximum visit count among all users
                                        $widthPercentage = ($mostVisitedUrl->visit_count / $maxVisits) * 100; // Calculate width percentage
                                    @endphp


                                    @if ($mostVisitedUrl->url != '')
                                        <br>

                                        <h2><small><b>{{ $mostVisitedUrl->url }}</b></small></h2>
                                        <div class="progress m-b-0">
                                            <div class="progress-bar progress-bar-success" role="progressbar"
                                                aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"
                                                style="width:{{ $widthPercentage }}%;">
                                                <span class="sr-only">20% Complete</span>
                                            </div>
                                        </div>

                                        <br>
                                    @endif
                                @endforeach




                            </div>
                        </div>
                    </div>





                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30 table-mg-t-pro dk-res-t-pro-30">
                            <div class="analytics-content">
                                <h5>Browse Usage</h5>



                                @foreach ($mostUsedBrowsers as $browser)
                                    @php
                                        $widthPercentage = rand(80, 100);
                                    @endphp

                                    @if ($browser->browser != '')
                                        <h2><small><b>{{ $browser->browser }}</b></small></h2>
                                        <div class="progress m-b-0">
                                            <div class="progress-bar progress-bar-info" role="progressbar"
                                                aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"
                                                style="width:{{ $widthPercentage }}%;"> <span class="sr-only">20%
                                                    Complete</span> </div>
                                        </div>

                                        <br>
                                    @endif
                                @endforeach



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="container-fluid">
            <div class="data-table-area mg-b-15">

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="breadcome-heading mgg">
                                    <div class="row ms-50">
                                        <div class="col">
                                            <h1 style="display: inline;"><small>Closure Dates for Previous
                                                    Magazines</small></h1>
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
                                                    <th class="text-center">ID</th>
                                                    <th class="text-center">Magazine</th>
                                                    <th class="text-center">Open Date</th>
                                                    <th class="text-center">Closure Date</th>
                                                    <th class="text-center">Final Closure Date</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>

                                            @php
                                                $i = 1;
                                            @endphp

                                            <tbody>

                                                @foreach ($magazines as $magazine)
                                                    <tr>
                                                        <td>{{ $i++ }}</td>
                                                        <td>{{ $magazine->title }}</td>
                                                        <td>{{ $magazine->open_date }}</td>
                                                        <td>{{ $magazine->closure_date }}</td>
                                                        <td>{{ $magazine->finalclosure_date }}</td>

                                                        <td><a href="/magazine-profile/{{ $magazine->id }}"><button
                                                                    class="btn-custon-rounded btn-primary btn-xs"
                                                                    style="color: white; font-size: 16px;"><i
                                                                        class="fa fa-info-circle edu-informatio"></i>See
                                                                    more</button></a> |

                                                            <a href="#">
                                                                <form action="/magazine/{{ $magazine->id }}/destroy"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')

                                                                    <button type="submit"
                                                                        class="btn-custon-rounded btn-danger btn-xs"
                                                                        style="color: white; font-size: 16px;"><i
                                                                            class="fa fa-trash-o"
                                                                            style="font-size:16px"></i>Delete
                                                                    </button>

                                                                </form>
                                                            </a>

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
        </div>

        <!-- <div class="single-pro-review-area mt-t-30 mg-b-15">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="product-payment-inner-st">
              <h1><small><b>Closure Dates Settings</b></small></h1>
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="review-content-section">
                    <div id="dropzone1" class="pro-ad">
                      <form action="/upload" class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload">
                        <div class="row">
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                              <h3><small>Submission Open Date</small></h3>
                            </div>

                            <div class="form-group">
                              <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
                              <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

                              <input type="text" class="form-control" id="datePicker" placeholder="DD/MM/YYYY">
                              <i class='fas fa-calendar-alt' style='font-size:24px'></i>

                              <script>
                                  flatpickr("#datePicker", {
                                      altInput: true,
                                      altFormat: "d/m/Y",
                                      dateFormat: "Y-m-d",
                                  });
                              </script>
                            </div>


                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                              <h3><small>Submission Closure Date</small></h3>
                              <div class="form-group">
                                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
                                <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

                                <input type="text" class="form-control" id="datePicker" placeholder="DD/MM/YYYY">
                                <i class='fas fa-calendar-alt' style='font-size:24px'></i>

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
                            <div class="login-horizental cancel-wp pull-left form-bc-ele">
                              <button type="submit" class="btn btn-custon-four btn-primary">
                                <i class="fa fa-check edu-checked-pro" aria-hidden="true"></i> Save Changes</button>
                              <button type="reset" class="btn btn-custon-four btn-danger">
                                <i class="fa fa-times edu-danger-error" aria-hidden="true"></i> Cancel</button>
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
    </div> -->
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

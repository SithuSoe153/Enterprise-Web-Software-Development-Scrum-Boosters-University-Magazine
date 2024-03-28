<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Lists of Users</title>
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

                                                    <a href="#" data-toggle="dropdown" role="button"
                                                        aria-expanded="false" class="nav-link dropdown-toggle">
                                                        <span class="admin-name">Welcome
                                                            {{ auth()->user()->name }}</span>
                                                        <img src="{{ asset('storage/' . auth()->user()->profile) }}"
                                                            alt="" />
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
                    @if (session()->has('success'))
                        <div class="alert alert-success text-center" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <h1>List of User Account</h1>
                </div>
            </div>
        </div>
        <div class="analytics-sparkle-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                        <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#manager">Marketing Manager</a></li>
                                <li><a href="#coordinator">Marketing Coordinator</a></li>
                                <li><a href="#student">Students</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="manager">
                                    <div class="sparkline13-hd">
                                        <div class="sparkline13-graph">
                                            <h1><small><b><label for="">Marketing Manager
                                                            List</label></b></small></h1>
                                            <form action=""
                                                class="dropzone dropzone-custom needsclick add-professors"
                                                id="demo1-upload">
                                                <table id="table" data-toggle="table" data-pagination="true"
                                                    data-search="true" data-resizable="true" data-cookie="true"
                                                    data-cookie-id-table="saveId" data-click-to-select="true"
                                                    data-toolbar="#toolbar">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">No</th>
                                                            <th class="text-center">Marketing Manager Name</th>
                                                            <th class="text-center">Email</th>
                                                            <th class="text-center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        @php
                                                            $i1 = 1;

                                                            use App\Models\User;

                                                            $managers = User::whereHas('roles', function ($query) {
                                                                $query->where('name', 'Marketing Manager');
                                                            })->get();

                                                        @endphp

                                                        @foreach ($managers as $manager)
                                                            <tr>
                                                                <td>{{ $i1++ }}</td>
                                                                <td>{{ $manager->name }}</td>
                                                                <td>{{ $manager->email }}</td>
                                                                <td><button
                                                                        class="btn-custon-rounded btn-primary btn-xs"><a
                                                                            href="/user-profile/{{ $manager->id }}"
                                                                            style="color: white; font-size: 16px;"><i
                                                                                class="fa fa-info-circle edu-informatio"></i>See
                                                                            more</button></a> |
                                                                    <a href="#">
                                                                        <form
                                                                            action="/user/{{ $manager->id }}/destroy"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button
                                                                                class="btn-custon-rounded btn-danger btn-xs"
                                                                                style="color: white; font-size: 16px;"><i
                                                                                    class="fa fa-trash-o"
                                                                                    style="font-size:16px"></i>Delete</button>
                                                                        </form>

                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-tab-list tab-pane fade" id="coordinator">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <h1><small><b><label for="">Marketing Coordinator
                                                            List</label></b></small>
                                            </h1>
                                            <form action=""
                                                class="dropzone dropzone-custom needsclick add-professors"
                                                id="demo1-upload">
                                                <table id="table" data-toggle="table" data-pagination="true"
                                                    data-search="true" data-resizable="true" data-cookie="true"
                                                    data-cookie-id-table="saveId" data-click-to-select="true"
                                                    data-toolbar="#toolbar">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">No</th>
                                                            <th class="text-center">Marketing Coordinator Name</th>
                                                            <th class="text-center">Faculty</th>
                                                            <th class="text-center">Email</th>
                                                            <th class="text-center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $i2 = 1;

                                                            $coordinators = User::whereHas('roles', function ($query) {
                                                                $query->where('name', 'Marketing Coordinator');
                                                            })->get();

                                                        @endphp
                                                        @foreach ($coordinators as $coordinator)
                                                            <tr>
                                                                <td>{{ $i2++ }}</td>
                                                                <td>{{ $coordinator->name }}</td>
                                                                <td>{{ $coordinator->assignedRoles->first()->faculty->name }}
                                                                </td>
                                                                <td>{{ $coordinator->email }}</td>
                                                                <td><button
                                                                        class="btn-custon-rounded btn-primary btn-xs"><a
                                                                            href="user-profile.php"
                                                                            style="color: white; font-size: 16px;"><i
                                                                                class="fa fa-info-circle edu-informatio"></i>See
                                                                            more</button></a> |
                                                                    <a href="#">
                                                                        <form
                                                                            action="/user/{{ $coordinator->id }}/destroy"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button
                                                                                class="btn-custon-rounded btn-danger btn-xs"
                                                                                style="color: white; font-size: 16px;"><i
                                                                                    class="fa fa-trash-o"
                                                                                    style="font-size:16px"></i>Delete</button>
                                                                        </form>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-tab-list tab-pane fade" id="student">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <h1><small><b><label for="">Student List</label></b></small></h1>
                                            <form action=""
                                                class="dropzone dropzone-custom needsclick add-professors"
                                                id="demo1-upload">
                                                <table id="table" data-toggle="table" data-pagination="true"
                                                    data-search="true" data-resizable="true" data-cookie="true"
                                                    data-cookie-id-table="saveId" data-click-to-select="true"
                                                    data-toolbar="#toolbar">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">No</th>
                                                            <th class="text-center">Student Name</th>
                                                            <th class="text-center">Faculty</th>
                                                            <th class="text-center">Email</th>
                                                            <th class="text-center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $i3 = 1;

                                                            $students = User::whereHas('roles', function ($query) {
                                                                $query->where('name', 'Student');
                                                            })->get();

                                                        @endphp
                                                        @foreach ($students as $student)
                                                            <tr>
                                                                <td>{{ $i3++ }}</td>
                                                                <td>{{ $student->name }}</td>
                                                                <td>{{ $student->assignedRoles->first()->faculty->name }}
                                                                </td>
                                                                <td>{{ $student->email }}</td>
                                                                <td><button
                                                                        class="btn-custon-rounded btn-primary btn-xs"><a
                                                                            href="user-profile.php"
                                                                            style="color: white; font-size: 16px;"><i
                                                                                class="fa fa-info-circle edu-informatio"></i>See
                                                                            more</button></a> |
                                                                    <a href="#">

                                                                        <form
                                                                            action="/user/{{ $student->id }}/destroy"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button
                                                                                class="btn-custon-rounded btn-danger btn-xs"
                                                                                style="color: white; font-size: 16px;"><i
                                                                                    class="fa fa-trash-o"
                                                                                    style="font-size:16px"></i>Delete</button>
                                                                        </form>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
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

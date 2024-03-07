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

</head>

<body>
    <!--[if lt IE 8]>
  <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
 <![endif]-->
    <!-- Start Left menu area -->
    @include('frontend/Student/student-slidebar')


    <!-- End Left menu area -->
    <!-- Start Welcome area -->
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
                                    <!-- <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
             <i class="educate-icon educate-nav"></i>
            </button>
                                        </div>
                                    </div> -->
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
                                                        <span class="admin-name">Welcome Student Name</span>
                                                        <img src="../img/product/pro4.jpg" alt="" />
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
            <!-- Mobile Menu start -->
            <!-- Mobile Menu end -->

        </div>
        <!-- Static Table Start -->
        <div class="analytics-sparkle-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30">
                            <div class="analytics-content">
                                <h5>Number of Contrbutions</h5>
                                <h2>$<span class="counter">5000</span> <span class="tuition-fees"></span></h2>
                                <span class="text-success">20%</span>
                                <div class="progress m-b-0">
                                    <div class="progress-bar progress-bar-success" role="progressbar"
                                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:20%;">
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
                                <h2>$<span class="counter">3000</span> <span class="tuition-fees"></span></h2>
                                <span class="text-danger">30%</span>
                                <div class="progress m-b-0">
                                    <div class="progress-bar progress-bar-danger" role="progressbar"
                                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:30%;">
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
                                <h2>$<span class="counter">2000</span> <span class="tuition-fees"></span></h2>
                                <span class="text-info">60%</span>
                                <div class="progress m-b-0">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50"
                                        aria-valuemin="0" aria-valuemax="100" style="width:60%;"> <span
                                            class="sr-only">20% Complete</span> </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <br>
        <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Contribution <span class="table-project-n">Data</span> Table</h1>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <form action="">
                                    <div class="datatable-dashv1-list custom-datatable-overright">
                                        <div id="toolbar">
                                            <select class="form-control dt-tb">
                                                <option value="">Export All</option>
                                                <option value="all">Export Selected</option>
                                                <option value="selected">Export Delayed Comment</option>
                                            </select>
                                        </div>
                                        <table id="table" data-toggle="table" data-pagination="true"
                                            data-search="true" data-key-events="true" data-cookie-id-table="saveId"
                                            data-toolbar="#toolbar">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th data-field="id">Article Title</th>
                                                    <th>Submission Date</th>
                                                    <th>Comment Status</th>
                                                    <th>Publication Status</th>
                                                    <th>Close Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Article</td>
                                                    <td>DD/MM/YYYY</td>
                                                    <td>Commented</td>
                                                    <td>Selected</td>
                                                    <td>DD/MM/YYYY</td>
                                                    <td><button class="btn btn-custon-four btn-primary btn-xs"><a
                                                                href="contribution-detail.php"
                                                                style="color: white;">See More</a></button></td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Article</td>
                                                    <td>DD/MM/YYYY</td>
                                                    <td>Comment Delayed</td>
                                                    <td>Selected</td>
                                                    <td>DD/MM/YYYY</td>
                                                    <td><button class="btn btn-custon-four btn-primary btn-xs"><a
                                                                href="contribution-detail.php"
                                                                style="color: white;">See More</a></button></td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Article</td>
                                                    <td>DD/MM/YYYY</td>
                                                    <td>Commented</td>
                                                    <td>-</td>
                                                    <td>DD/MM/YYYY</td>
                                                    <td><button class="btn btn-custon-four btn-primary btn-xs"><a
                                                                href="contribution-detail.php"
                                                                style="color: white;">See More</a></button></td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>Article</td>
                                                    <td>DD/MM/YYYY</td>
                                                    <td>Commented</td>
                                                    <td>-</td>
                                                    <td>DD/MM/YYYY</td>
                                                    <td><button class="btn btn-custon-four btn-primary btn-xs"><a
                                                                href="contribution-detail.php"
                                                                style="color: white;">See More</a></button></td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td>Article</td>
                                                    <td>DD/MM/YYYY</td>
                                                    <td>Comment Delayed</td>
                                                    <td>Selected</td>
                                                    <td>DD/MM/YYYY</td>
                                                    <td><button class="btn btn-custon-four btn-primary btn-xs"><a
                                                                href="contribution-detail.php"
                                                                style="color: white;">See More</a></button></td>
                                                </tr>
                                                <tr>
                                                    <td>6</td>
                                                    <td>Article</td>
                                                    <td>DD/MM/YYYY</td>
                                                    <td>Commented</td>
                                                    <td>-</td>
                                                    <td>DD/MM/YYYY</td>
                                                    <td><button class="btn btn-custon-four btn-primary btn-xs"><a
                                                                href="contribution-detail.php"
                                                                style="color: white;">See More</a></button></td>
                                                </tr>
                                                <tr>
                                                    <td>7</td>
                                                    <td>Article</td>
                                                    <td>DD/MM/YYYY</td>
                                                    <td>Commented</td>
                                                    <td>-</td>
                                                    <td>DD/MM/YYYY</td>
                                                    <td><button class="btn btn-custon-four btn-primary btn-xs"><a
                                                                href="contribution-detail.php"
                                                                style="color: white;">See More</a></button></td>
                                                </tr>
                                                <tr>
                                                    <td>8</td>
                                                    <td>Article</td>
                                                    <td>DD/MM/YYYY</td>
                                                    <td>Commented</td>
                                                    <td>-</td>
                                                    <td>DD/MM/YYYY</td>
                                                    <td><button class="btn btn-custon-four btn-primary btn-xs"><a
                                                                href="contribution-detail.php"
                                                                style="color: white;">See More</a></button></td>
                                                </tr>
                                                <tr>
                                                    <td>9</td>
                                                    <td>Article</td>
                                                    <td>DD/MM/YYYY</td>
                                                    <td>Commented</td>
                                                    <td>-</td>
                                                    <td>DD/MM/YYYY</td>
                                                    <td><button class="btn btn-custon-four btn-primary btn-xs"><a
                                                                href="contribution-detail.php"
                                                                style="color: white;">See More</a></button></td>
                                                </tr>
                                                <tr>
                                                    <td>10</td>
                                                    <td>Article</td>
                                                    <td>DD/MM/YYYY</td>
                                                    <td>Commented</td>
                                                    <td>-</td>
                                                    <td>DD/MM/YYYY</td>
                                                    <td><button class="btn btn-custon-four btn-primary btn-xs"><a
                                                                href="contribution-detail.php"
                                                                style="color: white;">See More</a></button></td>
                                                </tr>
                                                <tr>
                                                    <td>11</td>
                                                    <td>Article</td>
                                                    <td>DD/MM/YYYY</td>
                                                    <td>Commented</td>
                                                    <td>-</td>
                                                    <td>DD/MM/YYYY</td>
                                                    <td><button class="btn btn-custon-four btn-primary btn-xs"><a
                                                                href="contribution-detail.php"
                                                                style="color: white;">See More</a></button></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Static Table End -->
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

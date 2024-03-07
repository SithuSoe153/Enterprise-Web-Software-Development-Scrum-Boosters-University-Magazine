<?php
session_start();
$currentURL = $_SERVER['PHP_SELF'];
?>

<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="sidebar-header">
            <a href="student-dashboard.php"><img class="main-logo" src="../img/scrumlogo.png" width="200px"
                    alt="" /></a>
        </div>
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                <ul class="metismenu" id="menu1">
                    <li>
                        <a href="/dashboard" aria-expanded="false"><span class="educate-icon educate-home icon-wrap"
                                aria-hidden="true"></span> <span class="mini-click-non">Dashboard</span></a>
                    </li>
                    <li>
                        <a href="/submit-contributions" aria-expanded="false"><span
                                class="educate-icon educate-student icon-wrap" aria-hidden="true"></span> <span
                                class="mini-click-non">Submit Article</span></a>
                    </li>
                    <li>
                        <a href="contribution-newfeeds.php" aria-expanded="false"><span
                                class="educate-icon educate-apps icon-wrap" aria-hidden="true"></span> <span
                                class="mini-click-non">Article Feed</span></a>
                    </li>
                    <li>
                        <a href="student-mail.php" aria-expanded="false"><span
                                class="educate-icon educate-message icon-wrap" aria-hidden="true"></span> <span
                                class="mini-click-non">Mail</span></a>
                    </li>
                    <li>
                        <a href="student-profile.php" aria-expanded="false"><span
                                class="educate-icon educate-professor icon-wrap" aria-hidden="true"></span> Profile</a>
                    </li>
                    <li>
                        <a href="#" aria-expanded="false"><span class="educate-icon educate-pages icon-wrap"
                                aria-hidden="true"></span>Log Out</a>
                    </li>
                </ul>
            </nav>
        </div>
    </nav>
</div>
<div class="mobile-menu-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="mobile-menu">
                    <nav id="dropdown">
                        <ul class="mobile-menu-nav">
                            <li>
                                <a href="student-dashboard.php" aria-expanded="false"><span
                                        class="educate-icon educate-home icon-wrap" aria-hidden="true"></span> <span
                                        class="mini-click-non">Dashboard</span></a>
                            </li>
                            <li>
                                <a href="submit-contributions.php" aria-expanded="false"><span
                                        class="educate-icon educate-student icon-wrap" aria-hidden="true"></span> <span
                                        class="mini-click-non">Submit Article</span></a>
                            </li>
                            <li>
                                <a href="contribution-newfeeds.php" aria-expanded="false"><span
                                        class="educate-icon educate-apps icon-wrap" aria-hidden="true"></span> <span
                                        class="mini-click-non">Article Feed</span></a>
                            </li>
                            <li>
                                <a href="student-mail.php" aria-expanded="false"><span
                                        class="educate-icon educate-message icon-wrap" aria-hidden="true"></span> <span
                                        class="mini-click-non">Mail</span></a>
                            </li>
                            <li>
                                <a href="student-profile.php" aria-expanded="false"><span
                                        class="educate-icon educate-professor icon-wrap" aria-hidden="true"></span>
                                    Profile</a>
                            </li>
                            <li>
                                <a href="#" aria-expanded="false"><span
                                        class="educate-icon educate-pages icon-wrap" aria-hidden="true"></span>Log
                                    Out</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

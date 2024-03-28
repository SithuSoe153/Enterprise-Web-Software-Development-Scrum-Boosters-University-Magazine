<?php
session_start();
$currentURL = $_SERVER['PHP_SELF'];
?>
<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="sidebar-header">
            <a href="index.php"><img class="main-logo" src="{{ asset('img/scrumlogo.png') }}" width="200px"
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
                        <a href="/guest-profile" aria-expanded="false"><span
                                class="educate-icon educate-student icon-wrap" aria-hidden="true"></span> <span
                                class="mini-click-non">Profile</span></a>
                    </li>

                    <li>
                        <a href="/logout" aria-expanded="false"><span class="educate-icon educate-pages icon-wrap"
                                aria-hidden="true"></span>Log Out</a>
                    </li>

                </ul>
            </nav>
        </div>
    </nav>
</div>

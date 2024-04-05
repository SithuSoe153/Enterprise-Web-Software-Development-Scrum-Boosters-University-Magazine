<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="sidebar-header">
            <a href="/dashboard"><img class="main-logo" src="{{ asset('img/scrumlogo.png') }}" width="200px"
                    alt="" /></a>
        </div>
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                <ul class="metismenu" id="menu1">
                    <li>
                        <a href="/dashboard" aria-expanded="false"><span class="educate-icon educate-home icon-wrap"
                                aria-hidden="true"></span> <span class="mini-click-non">Dashboard</span></a>
                    </li>
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
                    <li>

                        @php
                            $closureDate = App\Models\Magazine::latest()->first()->closure_date;
                            // @dd($closureDate);
                        @endphp



                        @if ($closureDate && now()->gt($closureDate))
                            <a href="#" class="submit-contributions-link" data-toggle="popover"
                                data-placement="top" data-content="The closure date is beyond">
                                <span class="educate-icon educate-student icon-wrap" aria-hidden="true"></span>
                                <span class="mini-click-non">Submit Article</span>
                            </a>
                        @else
                            <a href="/submit-contributions" aria-expanded="false">
                                <span class="educate-icon educate-student icon-wrap" aria-hidden="true"></span>
                                <span class="mini-click-non">Submit Article</span>
                            </a>
                        @endif

                        <script>
                            $(document).ready(function() {
                                // Initialize Bootstrap popover
                                $('[data-toggle="popover"]').popover({
                                    trigger: 'hover', // Show popover on hover
                                });

                                // Prevent default behavior of the link
                                $('.submit-contributions-link').click(function(event) {
                                    event.preventDefault();
                                });
                            });
                        </script>

                        <style>
                            /* Optional CSS styling for the link */
                            .submit-contributions-link {
                                color: #ccc;
                                cursor: not-allowed;
                                text-decoration: none;
                                /* Remove underline */
                                opacity: 0.5;
                                /* Dim the link */
                            }

                            /* Custom CSS to change popover content color */
                            .popover-content {
                                color: black;
                                /* Change to your desired color */
                            }
                        </style>


                    </li>
                    <li>
                        <a href="/contribution-newsfeed" aria-expanded="false"><span
                                class="educate-icon educate-apps icon-wrap" aria-hidden="true"></span> <span
                                class="mini-click-non">Article Feed</span></a>
                    </li>
                    <li>
                        <a href="/student-mail" aria-expanded="false"><span
                                class="educate-icon educate-message icon-wrap" aria-hidden="true"></span> <span
                                class="mini-click-non">Mail</span></a>
                    </li>
                    <li>
                        <a href="/student-profile" aria-expanded="false"><span
                                class="educate-icon educate-professor icon-wrap" aria-hidden="true"></span> Profile</a>
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Include CSS files here -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
    <!-- Remove dark mode CSS -->
    <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" disabled />
    <!-- Include any custom styles or scripts -->
</head>

<body class="loading"
    data-layout-config='{"leftSideBarTheme":"light","layoutBoxed":false,"leftSidebarCondensed":false,"leftSidebarScrollable":false,"darkMode":false,"showRightSidebarOnStart":true}'>
    <div class="wrapper">


        <div class="leftside-menu">

            <a href="{{ route('welcome') }}" class="logo text-center logo-light">
                <span class="logo-lg">
                    <img src="{{ asset('assets/images/logo4.png') }}" alt="" height="34">
                </span>
            </a>

            <div class="h-100" id="leftside-menu-container" data-simplebar>

                <!-- Simple bar -->
                <ul class="side-nav">
                    <!-- Navigation Title -->
                    <li class="side-nav-title side-nav-item">Dashboard</li>

                    <!-- Dashboard Link -->
                    <li class="side-nav-item">
                        <a href="{{ route('welcome') }}" class="side-nav-link">
                            <i class="uil-home-alt"></i>
                            <span>Tableau de bord</span>
                        </a>
                    </li>

                    <!-- Apps Title -->
                    <li class="side-nav-title side-nav-item">Apps</li>

                    <!-- Emails Link -->
                    <li class="side-nav-item">
                        <a href="{{ route('Courrier') }}" class="side-nav-link">
                            <i class="uil-envelope"></i>
                            <span>Courriers</span>
                        </a>
                    </li>

                    <!-- Pages Link -->
                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarPages1" aria-expanded="false"
                            aria-controls="sidebarPages1" class="side-nav-link">
                            <i class="uil-copy-alt"></i>
                            <span>Pages</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarPages1">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="{{ route('ParametrageCourrier') }}">Parametrage Courrier</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- Users Link -->
                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarPages2" aria-expanded="false"
                            aria-controls="sidebarPages2" class="side-nav-link">
                            <i class="uil-copy-alt"></i>
                            <span>Utilisateur</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarPages2">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="{{ route('Ajouter_User') }}">Ajouter Utilisateur</a>
                                </li>
                                <li>
                                    <a href="{{ route('List_User') }}">Liste Utilisateur</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>

            </div>

            <div class="clearfix"></div>
        </div>

        <div class="end-bar">
            <div class="rightbar-title">
                <a href="javascript:void(0);" class="end-bar-toggle float-end">
                    <i class="dripicons-cross noti-icon"></i>
                </a>
                <h5 class="m-0">Settings</h5>
            </div>
            <div class="rightbar-content h-100" data-simplebar>
                <div class="p-3">
                    <div class="alert alert-warning" role="alert">
                        <strong>Customize</strong> the overall color scheme, sidebar menu, etc.
                    </div>
                    <!-- Settings -->
                    <h5 class="mt-3">Color Scheme</h5>
                    <hr class="mt-1" />
                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="light"
                            id="light-mode-check" checked>
                        <label class="form-check-label" for="light-mode-check">Light Mode</label>
                    </div>
                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="dark"
                            id="dark-mode-check">
                        <label class="form-check-label" for="dark-mode-check">Dark Mode</label>
                    </div>
                    <!-- Width -->
                    <h5 class="mt-4">Width</h5>
                    <hr class="mt-1" />
                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="width" value="fluid" id="fluid-check"
                            checked>
                        <label class="form-check-label" for="fluid-check">Fluid</label>
                    </div>
                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="width" value="boxed" id="boxed-check">
                        <label class="form-check-label" for="boxed-check">Boxed</label>
                    </div>
                    <!-- Left Sidebar-->
                    <h5 class="mt-4">Left Sidebar</h5>
                    <hr class="mt-1" />
                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="theme" value="default"
                            id="default-check">
                        <label class="form-check-label" for="default-check">Default</label>
                    </div>
                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="theme" value="light"
                            id="light-check" checked>
                        <label class="form-check-label" for="light-check">Light</label>
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" name="theme" value="dark"
                            id="dark-check">
                        <label class="form-check-label" for="dark-check">Dark</label>
                    </div>
                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="compact" value="fixed"
                            id="fixed-check" checked>
                        <label class="form-check-label" for="fixed-check">Fixed</label>
                    </div>
                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="compact" value="condensed"
                            id="condensed-check">
                        <label class="form-check-label" for="condensed-check">Condensed</label>
                    </div>

                    <div class="d-grid mt-4">
                        <button class="btn btn-primary" id="resetBtn">Reset to Default</button>
                        <a href="https://themes.getbootstrap.com/product/hyper-responsive-admin-dashboard-template/"
                            class="btn btn-danger mt-3" target="_blank"><i class="mdi mdi-basket me-1"></i> Purchase
                            Now</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="rightbar-overlay"></div>
    </div>
    </div>
    <!-- Include any necessary scripts at the end -->

    <!-- Your custom scripts -->
</body>

</html>

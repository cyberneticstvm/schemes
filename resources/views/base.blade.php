<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Suchitwa Mission - Schemes">
    <meta name="keyword" content="Suchitwa Mission - Schemes">
    <title>Schemes</title>
    <link rel="icon" href="{{ public_path().'/assets/images/favicon.png' }}" type="image/x-icon"> <!-- Favicon-->

    <!-- plugin css file  -->
    <link rel="stylesheet" href="{{ public_path().'/assets/css/dataTables.min.css' }}">

    <!-- project css file  -->
    <link rel="stylesheet" href="{{ public_path().'/assets/css/al.style.min.css' }}">

    <!-- project layout css file -->
    <link rel="stylesheet" href="{{ public_path().'/assets/css/layout.l.min.css' }}">
    <link rel="stylesheet" href="{{ public_path().'/assets/css/style.css' }}">
</head>

<body>

<div id="layout-l" class="theme-cyan">

    <!-- Navigation -->
    <div class="header fixed-top py-2 px-lg-5 px-md-2">
        <div class="container">
            <nav class="navbar navbar-light">
                
                <!-- Brand -->
                <a href="/dash/" class="brand-icon d-flex align-items-center me-3 me-lg-4">
                    <!--<img src="{{ public_path().'/assets/images/sm_logo.png' }}" class="img-fluid" />-->
                    <span class="fs-5 text-primary fw-bold d-none d-md-block">SCHEMES</span>
                </a>

                <!-- Search -->
                <div class="h-left flex-grow-1 d-none d-sm-block">
                    <div class="main-search border-start px-3 flex-fill">
                        <input class="form-control" type="text" placeholder="Enter your search key word">
                        <div class="card border-0 shadow rounded-3 search-result slidedown">
                            <div class="card-body text-start">
        
                                <small class="dropdown-header">Recent searches</small>
        
                            </div>
                        </div>
                    </div>
                </div>

                <!-- header rightbar icon -->
                <div class="h-right justify-content-end d-flex align-items-center">
                    <div class="d-flex">
                        <a class="nav-link text-primary p-1 me-lg-3 me-2" href="#" title="Settings" data-bs-toggle="modal" data-bs-target="#SettingsModal"><i class="fa fa-gear fa-lg"></i></a>
                    </div>
                    <div class="dropdown user-profile ms-2">
                        <a class="nav-link dropdown-toggle pulse p-0" href="#" role="button" data-bs-toggle="dropdown">
                            <img class="avatar rounded-circle" src="{{ public_path().'/assets/images/profile_av.png' }}" alt="">
                        </a>
                        <div class="dropdown-menu rounded-lg shadow border-0 dropdown-animation dropdown-menu-end">
                            <div class="card border-0 w240">
                                <div class="card-body border-bottom">
                                    <div class="d-flex py-1">
                                        <img class="avatar rounded-circle" src="{{ public_path().'/assets/images/profile_av.png' }}" alt="">
                                        <div class="flex-fill ms-3">
                                            <p class="mb-0 text-muted"><span class="fw-bold">{{ Auth::user()->name }}</span></p>
                                            <small class="text-muted">{{ Auth::user()->email }}</small>
                                            <div>
                                                <a href="/logout/" class="card-link">Sign out</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="menu-toggle ms-4 text-primary" href="javascript:void(0)">
                        <span>Start</span>
                        <svg class="avatar sm ms-1" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M1 4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V4zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V4zM1 9a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V9zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V9zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V9z"/>
                        </svg>
                    </a>
                </div>
                <div class="card shadow menu slidedown">
                    <div class="card-body p-3">
                        <div class="row">
                        <div class="col-lg-2">
                                <h5 class="text-primary">Dashboard</h5>
                                <ul class="nav flex-column">
                                    <li class="nav-item"><a class="text-dark" href="#">MCF</a></li>
                                    <li class="nav-item"><a class="text-dark" href="#">RRF</a></li>
                                    <li class="nav-item"><a class="text-dark" href="#">HKS</a></li>
                                    <li class="nav-item"><a class="text-dark" href="#">C@SCHOOL</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-2">
                                <h5 class="text-primary">MCF</h5>
                                <ul class="nav flex-column">
                                    <li class="nav-item"><a class="text-dark" href="#">List</a></li>
                                    <li class="nav-item"><a class="text-dark" href="/mcf/update/">Update</a></li>
                                    <li class="nav-item"><a class="text-dark" href="#">Consolidated</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-2">
                                <h5 class="text-primary">RRF</h5>
                                <ul class="nav flex-column">
                                    <li class="nav-item"><a class="text-dark" href="#">List</a></li>
                                    <li class="nav-item"><a class="text-dark" href="#">Update</a></li>
                                    <li class="nav-item"><a class="text-dark" href="#">Consolidated</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-2">
                                <h5 class="text-primary">HKS</h5>
                                <ul class="nav flex-column">
                                    <li class="nav-item"><a class="text-dark" href="#">List</a></li>
                                    <li class="nav-item"><a class="text-dark" href="#">Update</a></li>
                                    <li class="nav-item"><a class="text-dark" href="#">Consolidated</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-2">
                                <h5 class="text-primary">C@SCHOOL</h5>
                                <ul class="nav flex-column">
                                    <li class="nav-item"><a class="text-dark" href="#">List</a></li>
                                    <li class="nav-item"><a class="text-dark" href="#">Update</a></li>
                                    <li class="nav-item"><a class="text-dark" href="#">Consolidated</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-2"></div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <!-- main body area -->
    <div class="main px-lg-5 px-md-2">

        <!-- animation: Header -->
        <div class="bg-animation">
            <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 40" preserveAspectRatio="none" shape-rendering="auto">
                <defs>
                    <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
                </defs>
                <g class="moving-waves">
                    <use style="fill: var(--primary-color); opacity: .1;" xlink:href="#gentle-wave" x="48" y="-1"></use>
                    <use style="fill: var(--primary-color); opacity: .2;" xlink:href="#gentle-wave" x="48" y="3"></use>
                    <use style="fill: var(--primary-color); opacity: .6;" xlink:href="#gentle-wave" x="48" y="5"></use>
                    <use style="fill: var(--primary-color); opacity: .8;" xlink:href="#gentle-wave" x="48" y="8"></use>
                    <use style="fill: var(--primary-color);" xlink:href="#gentle-wave" x="48" y="13"></use>
                    <use style="fill: var(--body-color);" xlink:href="#gentle-wave" x="48" y="16"></use>
                </g>
            </svg>
        </div>

        @yield("content")

        <!-- Body: Footer -->
        <div class="body-footer d-flex">
            <div class="container">
                <div class="col-12">
                    <div class="card mb-3">
                    <div class="card-body">
                        <div class="row justify-content-between align-items-center">
                            <div class="col">
                                <p class="font-size-sm mb-0">© SCHEMES. <span class="d-none d-sm-inline-block"><script>document.write(/\d{4}/.exec(Date())[0])</script> Suchitwa mission.</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Modal: Setting -->
    <div class="modal fade" id="SettingsModal" tabindex="-1">
        <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">AL-UI Setting</h5>
                    </div>
                    <div class="modal-body custom_scroll">
                    <!-- Settings: Font -->
                    <div class="setting-font">
                        <small class="card-title text-muted">Google font Settings</small>
                        <ul class="list-group font_setting mb-3 mt-1">
                            <li class="list-group-item py-1 px-2">
                                <div class="form-check mb-0">
                                    <input class="form-check-input" type="radio" name="font" id="font-opensans" value="font-opensans" checked="">
                                    <label class="form-check-label" for="font-opensans">
                                        Open Sans Google Font
                                    </label>
                                </div>
                            </li>
                            <li class="list-group-item py-1 px-2">
                                <div class="form-check mb-0">
                                    <input class="form-check-input" type="radio" name="font" id="font-quicksand" value="font-quicksand">
                                    <label class="form-check-label" for="font-quicksand">
                                        Quicksand Google Font
                                    </label>
                                </div>
                            </li>
                            <li class="list-group-item py-1 px-2">
                                <div class="form-check mb-0">
                                    <input class="form-check-input" type="radio" name="font" id="font-nunito" value="font-nunito">
                                    <label class="form-check-label" for="font-nunito">
                                        Nunito Google Font
                                    </label>
                                </div>
                            </li>
                            <li class="list-group-item py-1 px-2">
                                <div class="form-check mb-0">
                                    <input class="form-check-input" type="radio" name="font" id="font-Raleway" value="font-raleway">
                                    <label class="form-check-label" for="font-Raleway">
                                        Raleway Google Font
                                    </label>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- Settings: Color -->
                    <div class="setting-theme">
                        <small class="card-title text-muted">Theme Color Settings</small>
                        <ul class="list-unstyled d-flex justify-content-between choose-skin mb-2 mt-1">
                            <li data-theme="indigo"><div class="indigo"></div></li>
                            <li data-theme="blue"><div class="blue"></div></li>
                            <li data-theme="cyan" class="active"><div class="cyan"></div></li>
                            <li data-theme="green"><div class="green"></div></li>
                            <li data-theme="orange"><div class="orange"></div></li>
                            <li data-theme="blush"><div class="blush"></div></li>
                            <li data-theme="red"><div class="red"></div></li>
                            <li data-theme="dynamic"><div class="dynamic"><i class="fa fa-paint-brush"></i></div></li>
                        </ul>
                        <div class="form-check form-switch gradient-switch mb-1">
                                <input class="form-check-input" type="checkbox" id="CheckGradient">
                                <label class="form-check-label" for="CheckGradient">Enable Gradient! ( Sidebar )</label>
                            </div>
                    </div>
                    <!-- Settings: bg image -->
                    <div class="setting-img mb-3">
                        <div class="form-check form-switch imagebg-switch mb-1">
                            <input class="form-check-input" type="checkbox" id="CheckImage">
                            <label class="form-check-label" for="CheckImage">Set Background Image (Sidebar)</label>
                        </div>
                        <div class="bg-images">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li class="sidebar-img-1 sidebar-img-active"><a class="rounded sidebar-img" id="img-1" href="#"><img src="{{ public_path().'/assets/images/sidebar-bg/sidebar-1.jpg' }}" alt="" /></a></li>
                                <li class="sidebar-img-2"><a class="rounded sidebar-img" id="img-2" href="#"><img src="{{ public_path().'/assets/images/sidebar-bg/sidebar-2.jpg' }}" alt="" /></a></li>
                                <li class="sidebar-img-3"><a class="rounded sidebar-img" id="img-3" href="#"><img src="{{ public_path().'/assets/images/sidebar-bg/sidebar-3.jpg' }}" alt="" /></a></li>
                                <li class="sidebar-img-4"><a class="rounded sidebar-img" id="img-4" href="#"><img src="{{ public_path().'/assets/images/sidebar-bg/sidebar-4.jpg' }}" alt="" /></a></li>
                                <li class="sidebar-img-5"><a class="rounded sidebar-img" id="img-5" href="#"><img src="{{ public_path().'/assets/images/sidebar-bg/sidebar-5.jpg' }}" alt="" /></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Settings: Theme dynamics -->
                    <div class="dt-setting">
                        <small class="card-title text-muted">Dynamic Color Settings</small>
                        <ul class="list-group list-unstyled mb-3 mt-1">
                            <li class="list-group-item d-flex justify-content-between align-items-center py-1 px-2">
                                <label>Primary Color</label>
                                <button id="primaryColorPicker" class="btn bg-primary avatar xs border-0 rounded-0"></button>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center py-1 px-2">
                                <label>Secondary Color</label>
                                <button id="secondaryColorPicker" class="btn bg-secondary avatar xs border-0 rounded-0"></button>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center py-1 px-2">
                                <label class="text-muted small">Chart Color 1</label>
                                <button id="chartColorPicker1" class="btn chart-color1 avatar xs border-0 rounded-0"></button>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center py-1 px-2">
                                <label class="text-muted small">Chart Color 2</label>
                                <button id="chartColorPicker2" class="btn chart-color2 avatar xs border-0 rounded-0"></button>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center py-1 px-2">
                                <label class="text-muted small">Chart Color 3</label>
                                <button id="chartColorPicker3" class="btn chart-color3 avatar xs border-0 rounded-0"></button>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center py-1 px-2">
                                <label class="text-muted small">Chart Color 4</label>
                                <button id="chartColorPicker4" class="btn chart-color4 avatar xs border-0 rounded-0"></button>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center py-1 px-2">
                                <label class="text-muted small">Chart Color 5</label>
                                <button id="chartColorPicker5" class="btn chart-color5 avatar xs border-0 rounded-0"></button>
                            </li>
                        </ul>
                    </div>
                    <!-- Settings: Light/dark -->
                    <div class="setting-mode">
                        <small class="card-title text-muted">Light/Dark & Contrast Layout</small>
                        <ul class="list-group list-unstyled mb-0 mt-1">
                            <li class="list-group-item d-flex align-items-center py-1 px-2">
                                <div class="form-check form-switch theme-switch mb-0">
                                    <input class="form-check-input" type="checkbox" id="theme-switch">
                                    <label class="form-check-label" for="theme-switch">Enable Dark Mode!</label>
                                </div>
                            </li>
                            <li class="list-group-item d-flex align-items-center py-1 px-2">
                                <div class="form-check form-switch theme-high-contrast mb-0">
                                    <input class="form-check-input" type="checkbox" id="theme-high-contrast">
                                    <label class="form-check-label" for="theme-high-contrast">Enable High Contrast</label>
                                </div>
                            </li>
                            <li class="list-group-item d-flex align-items-center py-1 px-2">
                                <div class="form-check form-switch theme-rtl mb-0">
                                    <input class="form-check-input" type="checkbox" id="theme-rtl">
                                    <label class="form-check-label" for="theme-rtl">Enable RTL Mode!</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-start text-center">
                    <button type="button" class="btn flex-fill btn-primary lift">Save Changes</button>
                    <button type="button" class="btn flex-fill btn-white border lift" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Jquery Core Js -->
<script src="{{ public_path().'/assets/bundles/libscripts.bundle.js' }}"></script>

<!-- Plugin Js -->
<script src="{{ public_path().'/assets/bundles/apexcharts.bundle.js' }}"></script>
<script src="{{ public_path().'/assets/bundles/dataTables.bundle.js' }}"></script>

<!-- Jquery Page Js -->
<script src="{{ public_path().'/assets/js/template.js' }}"></script>
<script src="{{ public_path().'/assets/js/page/index.js' }}"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="keywords"
          content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template"/>
    <meta name="description"
          content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework"/>
    <meta name="robots" content="noindex,nofollow"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Бошқарув панели' }}</title>

    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/logo.png') }}"/>
    <link rel="stylesheet" href="{{ asset('css/backend/dist/style.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/backend/main.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/backend/libs/float-chart.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/backend/libs/magnific-popup.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/backend/packages/select2.min.css') }}"/>
    <script src="{{ asset('js/backend/libs/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/backend/package/select2.min.js') }}"></script>
    <script src="{{ asset('js/backend/package/ckeditor.js') }}"></script>
</head>

<body>
<!-- Preloader - style you can find in spinners.css -->
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>

<!-- Main wrapper - style you can find in pages.scss -->
<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
     data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
    <!-- Topbar header - style you can find in pages.scss -->
    <header class="topbar" data-navbarbg="skin5">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
            <div class="navbar-header" data-logobg="skin5">
                <!-- Logo -->
                <a class="navbar-brand" href="{{ route('dashboard') }}">
                    <!-- Logo icon -->
                    <b class="logo-icon ps-2">
                        <img
                            src="{{ asset('images/logo.png') }}"
                            alt="homepage"
                            class="light-logo"
                            width="55"
                            style="margin: 10px 0 0 -10px"
                        />
                    </b>
                    <!-- Logo text -->
                    <b class="logo-text ms-1">
                        <img
                            src="{{ asset('images/logo-text.png') }}"
                            alt="homepage"
                            class="light-logo"
                            height="30"
                            width="150"
                            style="margin-top: 15px"
                        />
                    </b>
                </a>

                <!-- Toggle which is visible on mobile only -->
                <a
                    class="nav-toggler waves-effect waves-light d-block d-md-none"
                    href="javascript:void(0)"
                ><i class="ti-menu ti-close"></i
                    ></a>
            </div>
            <!-- End Logo -->
            <div
                class="navbar-collapse collapse"
                id="navbarSupportedContent"
                data-navbarbg="skin5"
            >
                <!-- toggle and nav items -->
                <ul class="navbar-nav float-start me-auto">
                    <li class="nav-item d-none d-lg-block">
                        <a
                            class="nav-link sidebartoggler waves-effect waves-light"
                            href="javascript:void(0)"
                            data-sidebartype="mini-sidebar"
                        ><i class="mdi mdi-menu font-24"></i
                            ></a>
                    </li>
                    <!-- create new -->
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            id="navbarDropdown"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                        >
                      <span class="d-none d-md-block"
                      >Янги яратиш <i class="fa fa-angle-down"></i
                          ></span>
                            <span class="d-block d-md-none"
                            ><i class="fa fa-plus"></i
                                ></span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('order.create') }}">Буюртма</a></li>
                            <li><a class="dropdown-item" href="{{ route('product.create') }}">Маҳсулот</a></li>
                            <li><a class="dropdown-item" href="{{ route('category.create') }}">Категория</a></li>
                            <li>
                                <hr class="dropdown-divider"/>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('user.create') }}">Мижоз</a>
                            </li>
                        </ul>
                    </li>
                    <!-- Search -->
                    <li class="nav-item search-box">
                        <a
                            class="nav-link waves-effect waves-dark"
                            href="javascript:void(0)"
                        ><i class="mdi mdi-magnify fs-4"></i
                            ></a>
                        <form class="app-search position-absolute">
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Search &amp; enter"
                            />
                            <a class="srh-btn"><i class="mdi mdi-window-close"></i></a>
                        </form>
                    </li>
                </ul>
                <!-- Right side toggle and nav items -->
                <ul class="navbar-nav float-end">
                    <!-- Comment -->
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            id="navbarDropdown"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                        >
                            <i class="mdi mdi-bell font-24"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider"/>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </li>
                        </ul>
                    </li>

                    <!-- Messages -->
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle waves-effect waves-dark"
                            href="#"
                            id="2"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                        >
                            <i class="font-24 mdi mdi-comment-processing"></i>
                        </a>
                        <ul
                            class="
                        dropdown-menu dropdown-menu-end
                        mailbox
                        animated
                        bounceInDown
                      "
                            aria-labelledby="2"
                        >
                            <ul class="list-style-none">
                                <li>
                                    <div class="">
                                        <!-- Message -->
                                        <a href="javascript:void(0)" class="link border-top">
                                            <div class="d-flex no-block align-items-center p-10">
                                <span
                                    class="
                                    btn btn-success btn-circle
                                    d-flex
                                    align-items-center
                                    justify-content-center
                                  "
                                ><i class="mdi mdi-calendar text-white fs-4"></i
                                    ></span>
                                                <div class="ms-2">
                                                    <h5 class="mb-0">Event today</h5>
                                                    <span class="mail-desc"
                                                    >Just a reminder that event</span
                                                    >
                                                </div>
                                            </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="javascript:void(0)" class="link border-top">
                                            <div class="d-flex no-block align-items-center p-10">
                                <span
                                    class="
                                    btn btn-info btn-circle
                                    d-flex
                                    align-items-center
                                    justify-content-center
                                  "
                                ><i class="mdi mdi-settings fs-4"></i
                                    ></span>
                                                <div class="ms-2">
                                                    <h5 class="mb-0">Settings</h5>
                                                    <span class="mail-desc"
                                                    >You can customize this template</span
                                                    >
                                                </div>
                                            </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="javascript:void(0)" class="link border-top">
                                            <div class="d-flex no-block align-items-center p-10">
                                <span
                                    class="
                                    btn btn-primary btn-circle
                                    d-flex
                                    align-items-center
                                    justify-content-center
                                  "
                                ><i class="mdi mdi-account fs-4"></i
                                    ></span>
                                                <div class="ms-2">
                                                    <h5 class="mb-0">Pavan kumar</h5>
                                                    <span class="mail-desc"
                                                    >Just see the my admin!</span
                                                    >
                                                </div>
                                            </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="javascript:void(0)" class="link border-top">
                                            <div class="d-flex no-block align-items-center p-10">
                                <span
                                    class="
                                    btn btn-danger btn-circle
                                    d-flex
                                    align-items-center
                                    justify-content-center
                                  "
                                ><i class="mdi mdi-link fs-4"></i
                                    ></span>
                                                <div class="ms-2">
                                                    <h5 class="mb-0">Luanch Admin</h5>
                                                    <span class="mail-desc"
                                                    >Just see the my new admin!</span
                                                    >
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </ul>
                    </li>

                    <!-- User profile and search -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#"
                           id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img
                                src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : asset('images/users/1.jpg') }}"
                                alt="{{ Auth::user()->username }}" class="rounded-circle" width="30"/>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="javascript:void(0)">
                                <i class="mdi mdi-account me-1 ms-1"></i>{{ Auth::user()->username .' '.'('. (Auth::user()->role->title) .')' }}
                            </a>
                            <a class="dropdown-item" href="javascript:void(0)">
                                <i class="mdi mdi-wallet me-1 ms-1"></i>{{ Auth::user()->debt }}
                            </a>
                            <a class="dropdown-item" href="javascript:void(0)">
                                <i class="mdi mdi-email me-1 ms-1"></i>Хабарлар
                            </a>
                            <a class="dropdown-item" href="{{ route('user.update', Auth::user()->id) }}">
                                <i class="mdi mdi-settings me-1 ms-1"></i>Профилни таҳрирлаш
                            </a>
                            <div class="dropdown-divider"></div>

                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="fa fa-power-off me-1 ms-1"></i> Чиқиш
                                </button>
                            </form>

                            <div class="dropdown-divider"></div>
                            <div class="ps-4 p-10">
                                <a href="{{ route('user.edit', Auth::user()->id) }}"
                                   class="btn btn-sm btn-success btn-rounded text-white">Профилни кўриш</a>
                            </div>
                        </ul>
                    </li>
                    <!-- User profile and search -->
                </ul>
            </div>
        </nav>
    </header>
    <!-- End Topbar header -->

    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <aside class="left-sidebar" data-sidebarbg="skin5">
        <div class="scroll-sidebar">
            <nav class="sidebar-nav">
                <ul id="sidebarnav" class="pt-4">

                    @can ('fullAccess')
                        @php // General @endphp
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                               aria-expanded="false">
                                <svg height="25px" width="25px" version="1.1" id="Layer_1"
                                     xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 512 512" xml:space="preserve" class="me-2">
                                <polygon style="fill:#D8D8DA;"
                                         points="18.285,176.821 146.286,166.263 274.285,324.623 274.285,472.424 18.285,324.623 "/>
                                    <polygon style="fill:#003169;"
                                             points="229.107,446.264 63.465,350.63 63.465,202.901 229.107,298.534 "/>
                                    <polygon style="fill:#013F8A;"
                                             points="54.858,197.936 237.715,303.508 237.715,288.428 54.858,182.856 "/>
                                    <polygon style="fill:#C6C5CB;"
                                             points="274.285,472.424 493.715,345.737 493.715,197.936 274.285,324.623 "/>
                                    <polygon style="fill:#003169;"
                                             points="146.286,166.263 365.715,39.576 512,220.545 292.572,347.232 "/>
                                    <polygon style="fill:#013F8A;"
                                             points="146.286,166.263 0,178.394 219.429,51.707 365.715,39.576 "/>
                                    <polygon style="fill:#ACABB1;"
                                             points="73.143,356.294 73.143,208.492 219.429,292.95 219.429,440.752 "/>
                                    <path style="fill:#898890;"
                                          d="M73.143,312.825l146.286,84.458v2.414L73.143,315.239C73.143,315.239,73.143,312.825,73.143,312.825z M219.429,418.381L73.143,333.923v2.414l146.286,84.458V418.381z M73.143,294.141L219.429,378.6v-2.414L73.143,291.728C73.143,291.728,73.143,294.141,73.143,294.141z M73.143,252.409l146.286,84.458v-2.414L73.143,249.995C73.143,249.995,73.143,252.409,73.143,252.409z M73.143,229.362v2.414l146.286,84.458v-2.414L73.143,229.362z M73.143,273.043l146.286,84.458v-2.414L73.143,270.629C73.143,270.629,73.143,273.043,73.143,273.043z"/>
                                    <g>
                                        <polygon style="fill:#2487FF;"
                                                 points="310.887,345.754 347.428,324.623 347.428,366.852 310.887,388.049 	"/>
                                        <polygon style="fill:#2487FF;"
                                                 points="365.743,314.082 402.286,292.95 402.286,335.179 365.743,356.378 	"/>
                                        <polygon style="fill:#2487FF;"
                                                 points="420.601,282.411 457.144,261.279 457.144,303.508 420.601,324.706 	"/>
                                    </g>
                            </svg>
                                <span class="hide-menu">Асосий</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level ps-3">
                                @can ('hasAccess')
                                    @php // Organization @endphp
                                    <li class="sidebar-item">
                                        <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                           href="{{ route('organization.index') }}" aria-expanded="false">
                                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 512 512"
                                                 xml:space="preserve" width="25px" height="25px" fill="#000000"
                                                 class="me-2">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                   stroke-linejoin="round"/>
                                                <g id="SVGRepo_iconCarrier">
                                                    <rect x="38.4" y="12.8" style="fill:#6FB0B6;" width="51.2"
                                                          height="486.4"/>
                                                    <rect x="89.6" y="396.8" style="fill:#FEDEA1;" width="76.8"
                                                          height="102.4"/>
                                                    <rect x="89.6" y="12.8" style="fill:#6FB0B6;" width="76.8"
                                                          height="384"/>
                                                    <g>
                                                        <rect x="268.8" y="192" style="fill:#538489;" width="102.4"
                                                              height="102.4"/>
                                                        <rect x="371.2" y="396.8" style="fill:#538489;" width="102.4"
                                                              height="102.4"/>
                                                    </g>
                                                    <rect x="166.4" y="12.8" style="fill:#6FB0B6;" width="51.2"
                                                          height="486.4"/>
                                                    <g>
                                                        <rect x="371.2" y="294.4" style="fill:#538489;" width="102.4"
                                                              height="102.4"/>
                                                        <rect x="268.8" y="294.4" style="fill:#538489;" width="102.4"
                                                              height="102.4"/>
                                                        <rect x="268.8" y="396.8" style="fill:#538489;" width="102.4"
                                                              height="102.4"/>
                                                        <rect x="371.2" y="192" style="fill:#538489;" width="102.4"
                                                              height="102.4"/>
                                                    </g>
                                                    <path style="fill:#3d3846;"
                                                          d="M499.2,486.4h-12.8V179.2H256v307.2h-25.6V0H25.6v486.4H12.8c-7.074,0-12.8,5.726-12.8,12.8 c0,7.074,5.726,12.8,12.8,12.8h486.4c7.074,0,12.8-5.726,12.8-12.8C512,492.126,506.274,486.4,499.2,486.4z M76.8,486.4H51.2V25.6 h25.6V486.4z M153.6,486.4h-51.2v-76.8h51.2V486.4z M153.6,384h-51.2V25.6h51.2V384z M204.8,486.4h-25.6V25.6h25.6V486.4z M358.4,486.4h-76.8v-76.8h76.8V486.4z M358.4,384h-76.8v-76.8h76.8V384z M358.4,281.6h-76.8v-76.8h76.8V281.6z M460.8,486.4H384 v-76.8h76.8V486.4z M460.8,384H384v-76.8h76.8V384z M460.8,281.6H384v-76.8h76.8V281.6z"/>
                                                </g>
                                    </svg>
                                            <span class="hide-menu">Филиаллар</span>
                                        </a>
                                    </li>
                                @endcan

                                @php // Warehouse @endphp
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                       href="{{ route('warehouse.index') }}" aria-expanded="false">
                                        <svg height="25px" width="25px" version="1.1" id="Layer_1"
                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                             xml:space="preserve" class="me-2"><polygon style="fill:#898890;"
                                                                                        points="13.837,232.032 110.702,224.043 207.567,343.882 207.567,455.732 13.837,343.882 "/>
                                            <polyline style="fill:#77767E;"
                                                      points="207.567,455.732 498.163,287.958 498.163,176.107 207.567,343.882 "/>
                                            <polygon style="fill:#ACABB1;"
                                                     points="110.702,224.043 401.298,56.268 512,193.218 221.406,360.992 "/>
                                            <g>
                                                <polygon style="fill:#D8D8DA;"
                                                         points="110.702,224.043 0,233.224 290.595,65.448 401.298,56.268 	"/>
                                                <polygon style="fill:#D8D8DA;"
                                                         points="27.676,351.871 27.676,271.978 166.054,351.871 166.054,431.764 	"/>
                                            </g>
                                            <polygon style="fill:#3E3D43;"
                                                     points="179.892,439.754 179.892,407.797 193.73,415.786 193.818,447.728 "/>
                                            <g>
                                                <polygon style="fill:#ACABB1;"
                                                         points="166.054,416.351 166.054,415.145 27.937,335.403 27.676,335.252 27.676,336.458 165.793,416.201 	"/>
                                                <polygon style="fill:#ACABB1;"
                                                         points="27.676,319.287 27.676,320.492 165.793,400.234 166.054,400.385 166.054,399.18	27.937,319.437 	"/>
                                                <polygon style="fill:#ACABB1;"
                                                         points="166.054,368.453 166.054,367.247 27.937,287.505 27.676,287.354 27.676,288.56 165.793,368.302 	"/>
                                                <polygon style="fill:#ACABB1;"
                                                         points="27.676,303.321 27.676,304.526 165.793,384.268 166.054,384.418 166.054,383.213 27.937,303.471 	"/>
                                                <polygon style="fill:#ACABB1;"
                                                         points="345.946,375.84 345.946,295.947 221.392,367.858 221.392,447.751 	"/>
                                            </g>
                                            <g>
                                                <polygon style="fill:#898890;"
                                                         points="345.946,344.46 345.946,343.254 221.392,415.164 221.392,416.371 	"/>
                                                <polygon style="fill:#898890;"
                                                         points="221.392,399.199 221.392,400.405 345.946,328.494 345.946,327.288 	"/>
                                                <polygon style="fill:#898890;"
                                                         points="221.392,383.234 221.392,384.439 345.946,312.528 345.946,311.321 	"/>
                                                <polygon style="fill:#898890;"
                                                         points="345.946,360.426 345.946,359.22 221.392,431.131 221.392,432.337 	"/>
                                            </g>
                                            <polygon style="fill:#ACABB1;"
                                                     points="484.325,295.918 484.325,216.025 359.771,287.936 359.771,367.829 "/>
                                            <g>
                                                <polygon style="fill:#898890;"
                                                         points="359.771,319.277 359.771,320.483 484.325,248.572 484.325,247.366 	"/>
                                                <polygon style="fill:#898890;"
                                                         points="484.325,280.504 484.325,279.298 359.771,351.21 359.771,352.416 	"/>
                                                <polygon style="fill:#898890;"
                                                         points="484.325,264.538 484.325,263.332 359.771,335.243 359.771,336.45 	"/>
                                                <polygon style="fill:#898890;"
                                                         points="359.771,303.311 359.771,304.517 484.325,232.607 484.325,231.4 	"/>
                                                <polygon style="fill:#898890;"
                                                         points="194.268,175.671 194.038,175.387 84.43,184.478 82.364,185.67 82.394,186.036 193.422,176.827 303.826,313.407 305.04,312.707 	"/>
                                                <polygon style="fill:#898890;"
                                                         points="221.943,159.693 221.714,159.409 112.105,168.499 110.04,169.691 110.07,170.057 	221.098,160.849 331.501,297.429 332.715,296.728 	"/>
                                                <polygon style="fill:#898890;"
                                                         points="180.43,183.661 180.2,183.376 70.592,192.467 68.527,193.659 68.557,194.025	179.584,184.816 289.988,321.396 291.201,320.696 	"/>
                                                <polygon style="fill:#898890;"
                                                         points="235.781,151.704 235.552,151.42 125.945,160.509 123.877,161.702 123.908,162.066	234.935,152.859 345.34,289.439 346.553,288.738 	"/>
                                                <polygon style="fill:#898890;"
                                                         points="152.754,199.641 152.524,199.356 42.917,208.445 40.851,209.638 40.881,210.003	151.909,200.797 262.313,337.375 263.526,336.675 	"/>
                                                <polygon style="fill:#898890;"
                                                         points="124.849,215.334 15.242,224.424 13.175,225.617 13.205,225.982 124.233,216.775	234.637,353.353 235.85,352.653 125.078,215.619 	"/>
                                                <polygon style="fill:#898890;"
                                                         points="138.916,207.63 138.687,207.345 29.079,216.434 27.012,217.628 27.044,217.992	138.07,208.786 248.475,345.364 249.688,344.664 	"/>
                                                <polygon style="fill:#898890;"
                                                         points="166.592,191.65 166.362,191.366 56.754,200.456 54.688,201.649 54.719,202.014	165.746,192.805 276.151,329.385 277.364,328.685 	"/>
                                                <polygon style="fill:#898890;"
                                                         points="249.619,143.715 249.389,143.43 139.783,152.52 137.716,153.713 137.746,154.077	248.774,144.87 359.177,281.45 360.39,280.749 	"/>
                                                <polygon style="fill:#898890;"
                                                         points="208.106,167.682 207.876,167.398 98.267,176.488 96.203,177.681 96.233,178.046	207.259,168.838 317.664,305.418 318.877,304.718 	"/>
                                                <polygon style="fill:#898890;"
                                                         points="360.322,79.801 360.092,79.516 250.484,88.606 248.418,89.798 248.449,90.163 359.476,80.957 469.881,217.536 471.094,216.835 	"/>
                                                <polygon style="fill:#898890;"
                                                         points="346.484,87.79 346.254,87.505 236.647,96.595 234.581,97.788 234.611,98.152	345.639,88.946 456.042,225.525 457.255,224.825 	"/>
                                                <polygon style="fill:#898890;"
                                                         points="332.646,95.779 332.417,95.495 222.809,104.585 220.742,105.777 220.773,106.142	331.8,96.935 442.205,233.514 443.418,232.814 	"/>
                                                <polygon style="fill:#898890;"
                                                         points="387.997,63.822 387.768,63.536 278.16,72.628 276.094,73.82 276.124,74.185 387.152,64.977	497.556,201.557 498.77,200.856 	"/>
                                                <polygon style="fill:#898890;"
                                                         points="374.16,71.811 373.93,71.526 264.321,80.617 262.257,81.809 262.287,82.174 373.313,72.966	483.718,209.546 484.931,208.845 	"/>
                                                <polygon style="fill:#898890;"
                                                         points="318.808,103.769 318.578,103.484 208.971,112.574 206.905,113.767 206.935,114.131	317.963,104.924 428.367,241.503 429.581,240.803 	"/>
                                                <polygon style="fill:#898890;"
                                                         points="263.457,135.725 263.227,135.441 153.62,144.531 151.553,145.724 151.584,146.087	262.611,136.881 373.016,273.461 374.229,272.76 	"/>
                                                <polygon style="fill:#898890;"
                                                         points="291.132,119.747 290.903,119.463 181.296,128.552 179.229,129.745 179.259,130.109	290.287,120.903 400.692,257.482 401.905,256.782 	"/>
                                                <polygon style="fill:#898890;"
                                                         points="277.295,127.736 277.065,127.452 167.459,136.541 165.392,137.735 165.422,138.098	276.448,128.892 386.853,265.472 388.066,264.771 	"/>
                                                <polygon style="fill:#898890;"
                                                         points="304.971,111.758 304.741,111.474 195.133,120.563 193.067,121.756 193.098,122.12	304.124,112.913 414.529,249.492 415.743,248.792 	"/>
                                            </g>
                                            <g>
                                                <polygon style="fill:#2487FF;"
                                                         points="411.62,121.895 390.537,133.732 410.611,158.564 431.382,146.346 	"/>
                                                <polygon style="fill:#2487FF;"
                                                         points="380.316,139.968 359.234,151.804 379.307,176.637 400.079,164.418 "/>
                                            </g></svg>
                                        <span class="hide-menu">Омборлар</span>
                                    </a>
                                </li>

                                @php // Product Log @endphp
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                    href="{{ route('log.product') }}" aria-expanded="false">
                                        <svg fill="#000000" width="25px" height="25px" viewBox="0 0 24 24" id="cursor-down-right" data-name="Flat Line" xmlns="http://www.w3.org/2000/svg" class="icon flat-line me-2">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"/><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/><g id="SVGRepo_iconCarrier"><path id="secondary" d="M20.9,19.54,13.69,3.62A1.17,1.17,0,0,0,11.5,4l-1.26,6.23L4,11.5a1.17,1.17,0,0,0-.39,2.19L19.54,20.9A1,1,0,0,0,20.9,19.54Z" style="fill: #2ec27e; stroke-width: 2;"/><path id="primary" d="M20.9,19.54,13.69,3.62A1.17,1.17,0,0,0,11.5,4l-1.26,6.23L4,11.5a1.17,1.17,0,0,0-.39,2.19L19.54,20.9A1,1,0,0,0,20.9,19.54Z" style="fill: none; stroke: #241f31; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"/></g>
                                        </svg>
                                    <span class="hide-menu">Омборга кирим</span>
                                    </a>
                                </li>

                                @php // Product Return @endphp
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                    href="{{ route('product-return.index') }}" aria-expanded="false">
                                        <svg version="1.1" width="25px" height="25px" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 460 460" xml:space="preserve" class="me-2"><g>
                                            <path style="fill:#FEE187;" d="M230,0C102.974,0,0,102.975,0,230c0,125.286,100.173,227.175,224.795,229.942L456.74,191.191
                                                C438.295,82.646,343.799,0,230,0z"/>
                                            <path style="fill:#FFC61B;" d="M250.468,172.408L130.97,52.909l-19.56,65.699l39.538,40.86l-19.978,206.64l93.825,93.826
                                                C226.526,459.973,228.26,460,230,460c127.025,0,230-102.975,230-230c0-13.228-1.132-26.189-3.276-38.807l-55.345-55.346
                                                L250.468,172.408z"/>
                                            <path style="fill:#273B7A;" d="M303.18,93.889H130.97V52.91l-93.79,93.789l316.905,35.57v87.948L252.2,313.299l41.408,52.81
                                                l9.572,0.001c75.05,0,136.11-61.061,136.11-136.11S378.23,93.889,303.18,93.889z"/>
                                            <path style="fill:#121149;" d="M303.18,146.7l-266-0.001l93.79,93.791l10-30.98l154.638-10h7.572c16.81,0,30.49,13.681,30.49,30.49
                                                s-13.68,30.49-30.49,30.49H254.2v52.81h50.98c46.01,0,81.3-37.29,81.3-83.3S349.19,146.7,303.18,146.7z"/>
                                            <polygon style="fill:#FEE187;" points="295.608,199.509 295.608,366.109 200.602,366.109 213.283,207.749 229.768,199.509 	"/><polygon style="fill:#FFFFFF;" points="213.283,207.749 213.283,366.109 130.97,366.109 130.97,199.509 196.81,199.509 	"/><rect x="196.81" y="199.509" style="fill:#FFC61B;" width="32.959" height="49.438"/></g>
                                        </svg>
                                    <span class="hide-menu">Қайтишлар</span>
                                    </a>
                                </li>

                                @php // Category @endphp
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                       href="{{ route('category.index') }}"
                                       aria-expanded="false">
                                        <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg" class="me-2">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                               stroke-linejoin="round"/>
                                            <g id="SVGRepo_iconCarrier">
                                                <path
                                                    d="M17 10H19C21 10 22 9 22 7V5C22 3 21 2 19 2H17C15 2 14 3 14 5V7C14 9 15 10 17 10Z"
                                                    stroke="#ffffff" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round"/>
                                                <path
                                                    d="M5 22H7C9 22 10 21 10 19V17C10 15 9 14 7 14H5C3 14 2 15 2 17V19C2 21 3 22 5 22Z"
                                                    stroke="#ffffff" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round"/>
                                                <path opacity="0.34"
                                                      d="M6 10C8.20914 10 10 8.20914 10 6C10 3.79086 8.20914 2 6 2C3.79086 2 2 3.79086 2 6C2 8.20914 3.79086 10 6 10Z"
                                                      stroke="#ffffff" stroke-width="1.5" stroke-miterlimit="10"
                                                      stroke-linecap="round" stroke-linejoin="round"/>
                                                <path opacity="0.34"
                                                      d="M18 22C20.2091 22 22 20.2091 22 18C22 15.7909 20.2091 14 18 14C15.7909 14 14 15.7909 14 18C14 20.2091 15.7909 22 18 22Z"
                                                      stroke="#ffffff" stroke-width="1.5" stroke-miterlimit="10"
                                                      stroke-linecap="round" stroke-linejoin="round"/>
                                            </g>
                                        </svg>
                                        <span class="hide-menu">Категория</span></a>
                                </li>

                                @php // Product @endphp
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                       href="{{ route('product.index') }}" aria-expanded="false">
                                        <svg width="25px" height="25px" viewBox="0 0 73 73" version="1.1"
                                             xmlns="http://www.w3.org/2000/svg"
                                             class="me-2">
                                            <title>databases-and-servers/servers/architectural-models</title>
                                            <desc>Created with Sketch.</desc>
                                            <defs></defs>
                                            <g id="databases-and-servers/servers/architectural-models"
                                               stroke="none"
                                               stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g id="container" transform="translate(2.000000, 2.000000)"
                                                   fill="none" fill-rule="nonzero" stroke="#2C3C40"
                                                   stroke-width="2">
                                                    <rect id="mask" x="-1" y="-1" width="71" height="71"
                                                          rx="14"></rect>
                                                </g>
                                                <g id="sketch-(1)" transform="translate(14.000000, 14.000000)"
                                                   fill-rule="nonzero">
                                                    <path
                                                        d="M41.1534211,9.16289474 L0.00305803169,9.16289474 C0.00305803169,9.16289474 0.0384210526,33.6733333 0.00324561404,35.0295614 C0.00298245614,35.0412281 0.00298245614,35.0528947 0.00333333333,35.0644737 C0.0386842105,36.3694737 0.573333333,37.590614 1.50868421,38.5030702 C2.44622807,39.4174561 3.68377193,39.9211404 4.99368421,39.9211404 L26.7289474,39.9211404 C26.9037719,39.9211404 27.0714912,39.8516667 27.1950877,39.7281579 L41.6196491,25.3035965 C41.7432456,25.1799123 41.8126316,25.0123684 41.8126316,24.8374561 L41.8126316,9.82201754 C41.8126316,9.45789474 41.5174561,9.16289474 41.1534211,9.16289474 Z"
                                                        id="Shape" fill="#E0E0E2"></path>
                                                    <g id="Group" transform="translate(11.842105, 9.122807)"
                                                       fill="#C6C5CA">
                                                        <polygon id="Shape"
                                                                 points="0.0842105263 17.2764912 2.77789474 17.2764912 4.93780702 10.4985088 15.3963158 0.0400877193 12.9353509 0.0400877193 2.47684211 10.4985088"></polygon>
                                                        <path
                                                            d="M29.3113158,0.0400877193 L27.1140351,0.0400877193 L27.1140351,18.8442105 L29.7774561,16.1807895 C29.9010526,16.0571053 29.9704386,15.8895614 29.9704386,15.7146491 L29.9704386,0.699210526 C29.9705263,0.335087719 29.6753509,0.0400877193 29.3113158,0.0400877193 Z"
                                                            id="Shape"></path>
                                                    </g>
                                                    <path
                                                        d="M30.035614,26.9392982 L11.78,26.9392982 C11.4159649,26.9392982 11.1207895,26.6442105 11.1207895,26.2800877 C11.1207895,25.9159649 11.4159649,25.6208772 11.78,25.6208772 L30.035614,25.6208772 C30.3997368,25.6208772 30.6948246,25.9159649 30.6948246,26.2800877 C30.6948246,26.6442105 30.3996491,26.9392982 30.035614,26.9392982 Z"
                                                        id="Shape" fill="#3C5156"></path>
                                                    <path
                                                        d="M5.00947368,29.8042105 C5.29377193,29.8042105 5.5722807,29.8288596 5.84385965,29.8739474 L5.84385965,2.64140351 C5.84385965,2.2772807 5.54868421,1.98219298 5.18464912,1.98219298 C2.32587719,1.98219298 0,4.30798246 0,7.16684211 L0,34.1662281 C0.339561404,31.7022807 2.4522807,29.8042105 5.00947368,29.8042105 Z"
                                                        id="Shape" fill="#919191"></path>
                                                    <path
                                                        d="M35.7852632,8.53385965 L31.8264035,4.57491228 C31.7027193,4.45131579 31.5350877,4.38192982 31.3602632,4.38192982 C31.1854386,4.38192982 31.017807,4.45140351 30.8941228,4.57491228 L16.3137719,19.1551754 C16.305,19.1639474 16.297193,19.1733333 16.2889474,19.1826316 L21.2512281,23.9999123 L35.7851754,9.46614035 C36.0427193,9.20859649 36.0427193,8.79131579 35.7852632,8.53385965 Z"
                                                        id="Shape" fill="#FFD039"></path>
                                                    <path
                                                        d="M19.4402632,22.2419298 L21.2512281,24 L35.7851754,9.46622807 C36.0426316,9.20868421 36.0426316,8.79140351 35.7851754,8.53394737 L34.4659649,7.21473684 L19.4402632,22.2419298 Z"
                                                        id="Shape" fill="#FFA304"></path>
                                                    <path
                                                        d="M16.2907018,19.1842982 C16.2323684,19.2484211 16.1858772,19.3238596 16.1560526,19.4082456 L13.9983333,25.5207895 C13.9138596,25.7601754 13.9742982,26.0267544 14.1537719,26.2063158 C14.2795614,26.3321053 14.4480702,26.3992982 14.6199123,26.3992982 C14.6935088,26.3992982 14.7675439,26.3870175 14.8392982,26.3616667 L20.9517544,24.2039474 C21.069386,24.1624561 21.1697368,24.0884211 21.2454386,23.9942105 L16.2907018,19.1842982 Z"
                                                        id="Shape" fill="#FFC89F"></path>
                                                    <path
                                                        d="M14.62,26.3992982 C14.6935965,26.3992982 14.7676316,26.3870175 14.839386,26.3616667 L20.9518421,24.2039474 C21.0694737,24.1624561 21.1698246,24.0884211 21.2455263,23.9942105 L19.4382456,22.2397368 L14.5374561,23.9936842 L13.9984211,25.520614 C13.9139474,25.76 13.974386,26.0265789 14.1538596,26.2061404 C14.2796491,26.3320175 14.4480702,26.3992982 14.62,26.3992982 Z"
                                                        id="Shape" fill="#F7B081"></path>
                                                    <path
                                                        d="M14.62,26.3992982 C14.6935965,26.3992982 14.7676316,26.3870175 14.839386,26.3616667 L18.6941228,25.0009649 L15.3528947,21.6836842 L13.9985088,25.520614 C13.9140351,25.76 13.9744737,26.0265789 14.1539474,26.2061404 C14.2796491,26.3320175 14.4480702,26.3992982 14.62,26.3992982 Z"
                                                        id="Shape" fill="#3C5156"></path>
                                                    <path
                                                        d="M16.8470175,23.167193 L14.5374561,23.9937719 L13.9984211,25.5207018 C13.9139474,25.7600877 13.974386,26.0266667 14.1538596,26.2062281 C14.2796491,26.3320175 14.4481579,26.3992105 14.62,26.3992105 C14.6935965,26.3992105 14.7676316,26.3869298 14.839386,26.3615789 L18.6941228,25.0008772 L16.8470175,23.167193 Z"
                                                        id="Shape" fill="#304144"></path>
                                                    <path
                                                        d="M37.9271053,6.39192982 L33.9681579,2.43307018 C33.710614,2.17570175 33.2933333,2.17570175 33.0358772,2.43307018 L30.4297368,5.03921053 L35.3189474,9.93245614 L37.9271053,7.32429825 C38.0507018,7.20061404 38.1200877,7.03307018 38.1200877,6.85815789 C38.1200877,6.68333333 38.050614,6.51570175 37.9271053,6.39192982 Z"
                                                        id="Shape" fill="#FF6137"></path>
                                                    <path
                                                        d="M33.5342105,8.14631579 L34.1535965,8.76614035 L35.319386,9.93192982 L37.9271053,7.32421053 C38.0507018,7.20052632 38.1200877,7.03298246 38.1200877,6.85807018 C38.1200877,6.68324561 38.050614,6.51561404 37.9271053,6.39192982 L36.6078947,5.0727193 L33.5342105,8.14631579 Z"
                                                        id="Shape" fill="#E04F32"></path>
                                                    <path
                                                        d="M39.6994737,2.70921053 L37.6507895,0.660614035 C37.2712281,0.281052632 36.7663158,0.0720175439 36.2294737,0.0720175439 C35.6926316,0.0720175439 35.187807,0.281052632 34.8081579,0.660614035 L33.5028947,1.96587719 L33.0357018,2.43307018 L32.5607018,2.90807018 L37.4609649,7.79026316 L38.1607895,7.09035088 L39.699386,5.55175439 C40.0789474,5.17219298 40.2879825,4.6672807 40.2879825,4.1304386 C40.2879825,3.59359649 40.0790351,3.08885965 39.6994737,2.70921053 Z"
                                                        id="Shape" fill="#546F7A"></path>
                                                    <g id="Group" transform="translate(32.543860, 1.052632)"
                                                       fill="#475D63">
                                                        <polygon id="Shape"
                                                                 points="0.025 1.84745614 0.0169298246 1.85552632 1.47894737 3.31201754"></polygon>
                                                        <path
                                                            d="M7.15561404,1.65657895 L5.53894737,0.0399122807 C5.80333333,0.391315789 5.94842105,0.817017544 5.94842105,1.26614035 C5.94842105,1.80894737 5.73938596,2.31929825 5.35982456,2.70324561 L3.82122807,4.25894737 L3.13052632,4.95754386 L4.91736842,6.73780702 L5.61719298,6.03789474 L7.15578947,4.49929825 C7.53535088,4.11973684 7.74438596,3.61482456 7.74438596,3.07798246 C7.74438596,2.54114035 7.53517544,2.03622807 7.15561404,1.65657895 Z"
                                                            id="Shape"></path>
                                                    </g>
                                                    <path
                                                        d="M44.5053509,21.1287719 C44.2590351,21.0266667 43.9755263,21.0830702 43.7869298,21.2715789 L21.3435965,43.7149123 C21.1550877,43.9035088 21.0986842,44.1870175 21.2007018,44.4333333 C21.3027193,44.6796491 21.5431579,44.8402632 21.8097368,44.8402632 L44.2531579,44.8402632 C44.617193,44.8402632 44.9123684,44.5451754 44.9123684,44.1810526 L44.9123684,21.737807 C44.9122807,21.4712281 44.7515789,21.2307018 44.5053509,21.1287719 Z M32.2835088,39.5079825 L39.4875439,32.3039474 L39.4875439,39.5079825 L32.2835088,39.5079825 Z"
                                                        id="Shape" fill="#FFCA10"></path>
                                                    <path
                                                        d="M44.5053509,21.1287719 C44.2590351,21.0266667 43.9755263,21.0830702 43.7869298,21.2715789 L42.0557018,23.002807 L42.0557018,44.8403509 L44.2529825,44.8403509 C44.6170175,44.8403509 44.912193,44.5452632 44.912193,44.1811404 L44.912193,21.737807 C44.9122807,21.4712281 44.7515789,21.2307018 44.5053509,21.1287719 Z"
                                                        id="Shape" fill="#FFA304"></path>
                                                    <g id="Group" transform="translate(41.666667, 29.122807)"
                                                       fill="#C96E14">
                                                        <path
                                                            d="M3.24561404,0.0221929825 L0.711052632,0.0221929825 C0.346929825,0.0221929825 0.0518421053,0.317280702 0.0518421053,0.681403509 C0.0518421053,1.04552632 0.346929825,1.34061404 0.711052632,1.34061404 L3.24561404,1.34061404 L3.24561404,0.0221929825 Z"
                                                            id="Shape"></path>
                                                        <path
                                                            d="M3.24561404,3.32710526 L0.711052632,3.32710526 C0.346929825,3.32710526 0.0518421053,3.62219298 0.0518421053,3.98631579 C0.0518421053,4.3504386 0.346929825,4.64552632 0.711052632,4.64552632 L3.24561404,4.64552632 L3.24561404,3.32710526 Z"
                                                            id="Shape"></path>
                                                        <path
                                                            d="M3.24561404,6.63175439 L0.711052632,6.63175439 C0.346929825,6.63175439 0.0518421053,6.92684211 0.0518421053,7.29096491 C0.0518421053,7.65508772 0.346929825,7.95017544 0.711052632,7.95017544 L3.24561404,7.95017544 L3.24561404,6.63175439 Z"
                                                            id="Shape"></path>
                                                        <path
                                                            d="M3.24561404,9.93666667 L0.711052632,9.93666667 C0.346929825,9.93666667 0.0518421053,10.2318421 0.0518421053,10.5958772 C0.0518421053,10.96 0.346929825,11.2550877 0.711052632,11.2550877 L3.24561404,11.2550877 L3.24561404,9.93666667 Z"
                                                            id="Shape"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                        <span class="hide-menu">Маҳсулот турлари</span>
                                    </a>
                                </li>

                                @php // Product Variation @endphp
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                       href="{{ route('product-variation.index') }}" aria-expanded="false">
                                        <svg width="25px" height="25px" viewBox="0 0 73 73" version="1.1"
                                             xmlns="http://www.w3.org/2000/svg"
                                             fill="#000000" class="me-2">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                               stroke-linejoin="round"/>
                                            <g id="SVGRepo_iconCarrier"><title>
                                                    fundamentals/css/box-model</title>
                                                <desc>Created with Sketch.</desc>
                                                <defs></defs>
                                                <g id="fundamentals/css/box-model" stroke="none"
                                                   stroke-width="1"
                                                   fill="none" fill-rule="evenodd">
                                                    <rect id="mask" stroke="#72512E" stroke-width="2"
                                                          fill="none"
                                                          fill-rule="nonzero" x="1" y="1" width="71" height="71"
                                                          rx="14"></rect>
                                                    <g id="box" transform="translate(16.000000, 16.000000)"
                                                       fill-rule="nonzero">
                                                        <polygon id="Shape" fill="#A98258"
                                                                 points="34.7586207 0 7.24137931 0 0 11.5862069 0 42 42 42 42 11.5862069"></polygon>
                                                        <polygon id="Shape" fill="#DAAE86"
                                                                 points="7.24137931 0 0 12 42 12 34.7586207 0"></polygon>
                                                        <polygon id="Shape" fill="#D8B18B"
                                                                 points="23.5 39.5 20.5 37 17.5 39.5 16 38.25 16 42 25 42 25 38.25"></polygon>
                                                        <rect id="Rectangle-path" fill="#E8D5B2" x="14" y="23"
                                                              width="13" height="12"></rect>
                                                        <g id="Group"
                                                           transform="translate(16.000000, 25.000000)"
                                                           fill="#D4C3A5">
                                                            <path
                                                                d="M5.25,6.4 L0.75,6.4 C0.336,6.4 0,6.7576 0,7.2 C0,7.6424 0.336,8 0.75,8 L5.25,8 C5.664,8 6,7.6424 6,7.2 C6,6.7576 5.664,6.4 5.25,6.4 Z"
                                                                id="Shape"></path>
                                                            <path
                                                                d="M8.25,6.4 L7.5,6.4 C7.086,6.4 6.75,6.7576 6.75,7.2 C6.75,7.6424 7.086,8 7.5,8 L8.25,8 C8.664,8 9,7.6424 9,7.2 C9,6.7576 8.664,6.4 8.25,6.4 Z"
                                                                id="Shape"></path>
                                                            <path
                                                                d="M3.75,1.6 L8.25,1.6 C8.664,1.6 9,1.2424 9,0.8 C9,0.3576 8.664,0 8.25,0 L3.75,0 C3.336,0 3,0.3576 3,0.8 C3,1.2424 3.336,1.6 3.75,1.6 Z"
                                                                id="Shape"></path>
                                                            <path
                                                                d="M8.25,3.2 L6.75,3.2 C6.336,3.2 6,3.5576 6,4 C6,4.4424 6.336,4.8 6.75,4.8 L8.25,4.8 C8.664,4.8 9,4.4424 9,4 C9,3.5576 8.664,3.2 8.25,3.2 Z"
                                                                id="Shape"></path>
                                                            <path
                                                                d="M0.75,4.8 L2.25,4.8 C2.664,4.8 3,4.4424 3,4 C3,3.5576 2.664,3.2 2.25,3.2 L0.75,3.2 C0.336,3.2 0,3.5576 0,4 C0,4.4424 0.336,4.8 0.75,4.8 Z"
                                                                id="Shape"></path>
                                                            <path
                                                                d="M0.75,1.6 L1.5,1.6 C1.914,1.6 2.25,1.2424 2.25,0.8 C2.25,0.3576 1.914,0 1.5,0 L0.75,0 C0.336,0 0,0.3576 0,0.8 C0,1.2424 0.336,1.6 0.75,1.6 Z"
                                                                id="Shape"></path>
                                                            <path
                                                                d="M3.9675,3.432 C3.8325,3.5832 3.75,3.7832 3.75,4 C3.75,4.216 3.8325,4.416 3.9675,4.568 C4.11,4.712 4.305,4.8 4.5,4.8 C4.695,4.8 4.89,4.712 5.0325,4.568 C5.1675,4.416 5.25,4.208 5.25,4 C5.25,3.792 5.1675,3.5832 5.0325,3.432 C4.7475,3.136 4.245,3.136 3.9675,3.432 Z"
                                                                id="Shape"></path>
                                                        </g>
                                                        <rect id="Rectangle-path" fill="#F4D5BD" x="16" y="0"
                                                              width="9" height="12"></rect>
                                                        <polygon id="Shape" fill="#D8B18B"
                                                                 points="17.5 16.4444444 20.5 20 23.5 16.4444444 25 18.2222222 25 12 16 12 16 18.2222222"></polygon>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                        <span class="hide-menu">Маҳсулотлар</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endcan

                    @php // Diagram @endphp
                    <li class="sidebar-item">
                        <a
                            class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="{{ route('charts.diagram') }}"
                            aria-expanded="false">
                            <svg fill="#000000" width="25px" height="25px" viewBox="0 0 24 24" id="diagram-bar-3"
                                 data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                 class="icon line-color me-2">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                                <g id="SVGRepo_iconCarrier">
                                    <path id="secondary" d="M13,11v4M9,7v8m8-6v6"
                                          style="fill: none; stroke: #2ca9bc; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"/>
                                    <path id="primary" d="M3,19H21M5,3V21"
                                          style="fill: none; stroke: #ffffff; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"/>
                                </g>
                            </svg>
                            <span class="hide-menu">Диаграммалар</span></a>
                    </li>

                    @can ('hasAccess')
                        @php // Order @endphp
                        <li class="sidebar-item">
                            <a
                                class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{ route('order.index') }}"
                                aria-expanded="false">
                                <svg height="25px" width="25px" version="1.1" id="Layer_1"
                                     xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 507.99 507.99" xml:space="preserve" fill="#000000" class="me-2">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                                    <g id="SVGRepo_iconCarrier">
                                        <path style="fill:#FFD15C;"
                                              d="M473.59,332.937l-34.6-169c-2.3-11.5-13.5-18.8-25-16.5l-191.9,39.1c-11.5,2.3-18.9,13.5-16.5,25 l34.5,169.1c2.3,11.5,13.5,18.8,25,16.5l191.9-39.2C468.49,355.537,475.89,344.437,473.59,332.937z"/>
                                        <polygon style="fill:#FF7058;"
                                                 points="344.49,161.537 355.29,214.337 348.29,224.937 337.69,217.937 330.69,228.537 320.09,221.537 312.99,232.037 302.39,225.037 291.69,172.337 "/>
                                        <g>
                                            <polygon style="fill:#FFFFFF;"
                                                     points="373.09,331.137 387.39,309.437 409.19,323.737 398.69,325.937 403.79,351.237 388.69,354.237 383.59,328.937 "/>
                                            <polygon style="fill:#FFFFFF;"
                                                     points="416.19,322.337 430.59,300.637 452.29,314.937 441.79,317.137 446.99,342.437 431.89,345.437 426.69,320.237 "/>
                                        </g>
                                        <path style="fill:#ffffff;"
                                              d="M507.59,365.737c-2.1-9.9-11.8-16.3-21.7-14.2l-203.1,42c-4.4-7.7-10.7-14.6-18.6-19.8 c-7.9-5.2-16.7-8.2-25.6-9.2l-67.1-323.2c-1-4.8-3.9-9-8-11.7s-9.1-3.6-13.9-2.6l-73.5,15.9c-10,2.2-16.3,11.9-14.1,21.8 c2.1,9.9,12,16.2,21.8,14.1l55.5-11.9l63.3,305c-7.7,4.4-14.6,10.6-19.8,18.6c-17.8,27-10.2,63.5,16.9,81.2 c9.6,6.3,20.3,9.4,30.9,9.6c19.6,0.4,38.9-8.9,50.5-26.4c5.2-7.9,8.2-16.7,9.2-25.5l203.1-42 C503.29,385.337,509.69,375.637,507.59,365.737z M250.29,434.737c-3.2,4.9-8.2,8.3-13.9,9.5c-5.8,1.2-11.6,0.1-16.6-3.2 c-4.9-3.2-8.3-8.2-9.5-13.9c-1.2-5.7-0.1-11.6,3.2-16.5c3.2-4.9,8.2-8.3,13.9-9.5c1.7-0.3,3.3-0.5,5-0.5c4.1,0.1,8.1,1.3,11.6,3.6 c4.9,3.2,8.3,8.2,9.5,13.9C254.59,424.037,253.49,429.837,250.29,434.737z"/>
                                        <path style="fill:#4CDBC4;"
                                              d="M80.39,36.737l-62.1,12.9c-12.4,2.6-20.4,14.7-17.8,27.1s14.7,20.3,27.1,17.8l62.1-12.9L80.39,36.737 z"/>
                                    </g>
                                </svg>
                                <span class="hide-menu">Буюртмалар</span></a>
                        </li>

                        @php // Order item @endphp
                        <li class="sidebar-item">
                            <a
                                class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{ route('order-item.index') }}"
                                aria-expanded="false"
                            >
                                <svg height="25px" width="25px" version="1.1" id="Layer_1"
                                     xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 502 502" xml:space="preserve" class="me-2">
                                    <g>
                                        <g>
                                            <polygon style="fill:#D1DCEB;"
                                                     points="389.81,126.779 356.721,126.779 356.721,49 263.721,49 263.721,89 134.721,89 134.721,49 41.722,49 41.722,435 198.107,435 198.107,492 460.278,492 460.278,197.247 		"/>
                                            <path style="fill:#4EC9DC;"
                                                  d="M231.721,49V36.59c0-14.685-11.905-26.59-26.59-26.59h-11.819c-14.686,0-26.59,11.905-26.59,26.59 V49h-32v40h129V49H231.721z"/>
                                        </g>
                                        <polygon style="fill:#4EC9DC;"
                                                 points="389.81,197.247 389.81,126.779 460.278,197.247 	"/>
                                        <g>
                                            <path
                                                d="M41.722,39c-5.522,0-10,4.477-10,10v386c0,5.523,4.478,10,10,10h146.386v47c0,5.523,4.478,10,10,10h262.171 c5.522,0,10-4.477,10-10V197.247c0-2.652-1.054-5.196-2.929-7.071l-70.468-70.468c-1.876-1.875-4.419-2.929-7.071-2.929h-23.089 V49c0-5.523-4.478-10-10-10h-115v-2.41c0-20.176-16.414-36.59-36.59-36.59h-11.819c-20.176,0-36.591,16.415-36.591,36.59V39 H41.722z M399.811,150.921l36.326,36.326h-36.326V150.921z M191.721,59c5.522,0,10-4.477,10-10s-4.478-10-10-10h-15v-2.41 c0-9.148,7.442-16.59,16.591-16.59h11.819c9.147,0,16.59,7.442,16.59,16.59V49c0,5.523,4.478,10,10,10h22v20h-109V59H191.721z M51.722,425V59h73v30c0,5.523,4.478,10,10,10h129c5.522,0,10-4.477,10-10V59h73v57.779H198.107c-5.522,0-10,4.477-10,10V425 H51.722z M208.107,136.779H379.81v60.468c0,5.523,4.478,10,10,10h60.468V482H208.107V136.779z"/>
                                            <path
                                                d="M243.949,253.468h125.402c5.522,0,10-4.477,10-10s-4.478-10-10-10H243.949c-5.522,0-10,4.477-10,10 S238.427,253.468,243.949,253.468z"/>
                                            <path
                                                d="M414.437,283.478H243.949c-5.522,0-10,4.477-10,10s4.478,10,10,10h170.487c5.522,0,10-4.477,10-10 S419.959,283.478,414.437,283.478z"/>
                                            <path
                                                d="M414.437,333.487H243.949c-5.522,0-10,4.477-10,10s4.478,10,10,10h170.487c5.522,0,10-4.477,10-10 S419.959,333.487,414.437,333.487z"/>
                                            <path
                                                d="M414.437,383.497H243.949c-5.522,0-10,4.477-10,10s4.478,10,10,10h170.487c5.522,0,10-4.477,10-10	S419.959,383.497,414.437,383.497z"/>
                                            <path
                                                d="M414.437,233.468h-16.67c-5.522,0-10,4.477-10,10s4.478,10,10,10h16.67c5.522,0,10-4.477,10-10 S419.959,233.468,414.437,233.468z"/>
                                        </g>
                                    </g>
                                </svg>
                                <span class="hide-menu">Буюртма элементлари</span></a
                            >
                        </li>

                        @php // Cash register @endphp
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                               aria-expanded="false">
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 339.346 339.346"
                                     xml:space="preserve" width="25px" height="25px" fill="#000000" class="me-2">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                                    <g id="SVGRepo_iconCarrier">
                                        <g>
                                            <g>
                                                <rect y="18.601" style="fill:#f6f5f4;" width="185.888"
                                                      height="302.145"/>
                                                <rect x="46.803" y="54.843" style="fill:#333E48;" width="92.283"
                                                      height="11"/>
                                                <rect x="62.051" y="75.905" style="fill:#333E48;" width="61.786"
                                                      height="11"/>
                                                <rect x="21.765" y="127.904" style="fill:#5C6670;" width="142.359"
                                                      height="9"/>
                                                <rect x="21.765" y="153.025" style="fill:#5C6670;" width="142.359"
                                                      height="9"/>
                                                <rect x="27.73" y="196.238" style="fill:#5C6670;" width="76.43"
                                                      height="9"/>
                                                <rect x="27.73" y="220.238" style="fill:#5C6670;" width="76.43"
                                                      height="9"/>
                                                <rect x="27.73" y="244.238" style="fill:#5C6670;" width="76.43"
                                                      height="9"/>
                                                <rect x="27.73" y="268.238" style="fill:#5C6670;" width="76.43"
                                                      height="9"/>
                                                <rect x="127.729" y="196.238" style="fill:#333E48;" width="30.43"
                                                      height="9"/>
                                                <rect x="127.729" y="220.238" style="fill:#333E48;" width="30.43"
                                                      height="9"/>
                                                <rect x="127.729" y="244.238" style="fill:#333E48;" width="30.43"
                                                      height="9"/>
                                                <rect x="127.729" y="268.238" style="fill:#333E48;" width="30.43"
                                                      height="9"/>
                                            </g>
                                            <g>
                                                <rect x="135.539" y="146.634"
                                                      transform="matrix(-0.7071 0.7071 -0.7071 -0.7071 538.8729 169.3377)"
                                                      style="fill:#006132;" width="197.653" height="99.278"/>
                                                <rect x="200.799" y="113.516"
                                                      transform="matrix(-0.7071 -0.7071 0.7071 -0.7071 261.3057 500.7798)"
                                                      style="fill:#00783E;" width="67.137" height="165.512"/>
                                                <ellipse
                                                    transform="matrix(-0.7071 -0.7071 0.7071 -0.7071 261.2996 500.782)"
                                                    style="fill:#006132;" cx="234.365" cy="196.274" rx="24.011"
                                                    ry="17.896"/>
                                            </g>
                                            <g>
                                                <circle style="fill:#D9A460;" cx="213.191" cy="134.504" r="36.424"/>
                                                <circle style="fill:#FEDD3D;" cx="213.191" cy="134.504" r="25.986"/>
                                            </g>
                                            <g>
                                                <circle style="fill:#5C6670;" cx="249.254" cy="55.451" r="28.08"/>
                                                <circle style="fill:#f6f5f4;" cx="249.254" cy="55.451" r="20.033"/>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                                <span class="hide-menu">Касса</span>
                            </a>
                            <ul aria-expanded="false" class="collapse second-level ps-3">
                                @php // Expense and Income @endphp
                                <li class="sidebar-item">
                                    <a
                                        class="sidebar-link waves-effect waves-dark sidebar-link"
                                        href="{{ route('expense-and-income.index') }}"
                                        aria-expanded="false">
                                        <svg height="25px" width="25px" version="1.1" id="Layer_1"
                                             xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 512 512" xml:space="preserve" fill="#000000" class="me-2">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                               stroke-linejoin="round"/>
                                            <g id="SVGRepo_iconCarrier">
                                                <g transform="translate(1 1)">
                                                    <polygon style="fill:#62a0ea;"
                                                             points="7.533,434.2 502.467,434.2 502.467,502.467 7.533,502.467 "/>
                                                    <g>
                                                        <path style="fill:#241f31;"
                                                              d="M502.467,511H7.533C2.413,511-1,507.587-1,502.467V434.2c0-5.12,3.413-8.533,8.533-8.533h494.933 c5.12,0,8.533,3.413,8.533,8.533v68.267C511,507.587,507.587,511,502.467,511z M16.067,493.933h477.867v-51.2H16.067V493.933z"/>
                                                        <path style="fill:#241f31;"
                                                              d="M468.333,476.867H459.8c-5.12,0-8.533-3.413-8.533-8.533c0-5.12,3.413-8.533,8.533-8.533h8.533 c5.12,0,8.533,3.413,8.533,8.533C476.867,473.453,473.453,476.867,468.333,476.867z M169.667,476.867H50.2 c-5.12,0-8.533-3.413-8.533-8.533c0-5.12,3.413-8.533,8.533-8.533h119.467c5.12,0,8.533,3.413,8.533,8.533 C178.2,473.453,174.787,476.867,169.667,476.867z"/>
                                                    </g>
                                                    <path style="fill:#62a0ea;"
                                                          d="M451.267,125.293v-56.32c0-5.973-4.267-10.24-10.24-10.24h-184.32c-5.973,0-10.24,4.267-10.24,10.24 v57.173c0,5.12-4.267,10.24-10.24,10.24h-92.16v-34.133h62.293c3.413,0,5.973-2.56,5.973-5.973V13.507 c0-3.413-2.56-5.973-5.973-5.973H47.64c-3.413,0-5.973,2.56-5.973,5.973v81.92c0,3.413,2.56,5.973,5.973,5.973h62.293v34.133H34.84 c-5.973,0-10.24,4.267-10.24,10.24v244.053c0,5.973,4.267,10.24,10.24,10.24h440.32c5.973,0,10.24-4.267,10.24-10.24V145.773 c0-5.973-4.267-10.24-10.24-10.24h-13.653C455.533,135.533,451.267,131.267,451.267,125.293L451.267,125.293z"/>
                                                    <path style="fill:#241f31;"
                                                          d="M475.16,408.6H34.84c-10.24,0-18.773-8.533-18.773-18.773V145.773 C16.067,135.533,24.6,127,34.84,127h66.56v-17.067H47.64c-7.68,0-14.507-6.827-14.507-14.507v-81.92C33.133,5.827,39.96-1,47.64-1 h158.72c7.68,0,14.507,6.827,14.507,14.507v81.92c0,7.68-6.827,14.507-14.507,14.507H152.6V127h83.627 c0.853,0,1.707-0.853,1.707-1.707v-56.32c0-10.24,8.533-18.773,18.773-18.773H441.88c9.387,0,17.92,8.533,17.92,18.773v57.173 c0,0.853,0.853,1.707,1.707,1.707h13.653c10.24,0,18.773,8.533,18.773,18.773V390.68C493.933,400.067,485.4,408.6,475.16,408.6z M34.84,144.067c-0.853,0-1.707,0.853-1.707,1.707v244.053c0,0.853,0.853,1.707,1.707,1.707h440.32 c0.853,0,1.707-0.853,1.707-1.707V145.773c0-0.853-0.853-1.707-1.707-1.707h-13.653c-10.24,0-18.773-8.533-18.773-18.773v-56.32 c0-0.853-0.853-1.707-1.707-1.707h-184.32c-0.853,0-1.707,0.853-1.707,1.707v57.173c0,10.24-8.533,18.773-18.773,18.773h-92.16 c-5.12,0-8.533-3.413-8.533-8.533v-34.133c0-5.12,3.413-8.533,8.533-8.533H203.8V16.067H50.2v76.8h59.733 c5.12,0,8.533,3.413,8.533,8.533v34.133c0,5.12-3.413,8.533-8.533,8.533H34.84z"/>
                                                    <polygon style="fill:#D0E8F9;"
                                                             points="272.067,84.333 425.667,84.333 425.667,178.2 272.067,178.2 "/>
                                                    <path style="fill:#241f31;"
                                                          d="M425.667,186.733h-153.6c-5.12,0-8.533-3.413-8.533-8.533V84.333c0-5.12,3.413-8.533,8.533-8.533 h153.6c5.12,0,8.533,3.413,8.533,8.533V178.2C434.2,183.32,430.787,186.733,425.667,186.733z M280.6,169.667h136.533v-76.8H280.6 V169.667z"/>
                                                    <polygon style="fill:#D0E8F9;"
                                                             points="41.667,400.067 468.333,400.067 468.333,434.2 41.667,434.2 "/>
                                                    <path style="fill:#241f31;"
                                                          d="M468.333,442.733H41.667c-5.12,0-8.533-3.413-8.533-8.533v-34.133c0-5.12,3.413-8.533,8.533-8.533 h426.667c5.12,0,8.533,3.413,8.533,8.533V434.2C476.867,439.32,473.453,442.733,468.333,442.733z M50.2,425.667h409.6V408.6H50.2 V425.667z"/>
                                                    <polygon style="fill:#D0E8F9;"
                                                             points="272.067,212.333 306.2,212.333 306.2,246.467 272.067,246.467 "/>
                                                    <path style="fill:#241f31;"
                                                          d="M306.2,255h-34.133c-5.12,0-8.533-3.413-8.533-8.533v-34.133c0-5.12,3.413-8.533,8.533-8.533H306.2 c5.12,0,8.533,3.413,8.533,8.533v34.133C314.733,251.587,311.32,255,306.2,255z M280.6,237.933h17.067v-17.067H280.6V237.933z"/>
                                                    <polygon style="fill:#D0E8F9;"
                                                             points="331.8,212.333 365.933,212.333 365.933,246.467 331.8,246.467 "/>
                                                    <path style="fill:#241f31;"
                                                          d="M365.933,255H331.8c-5.12,0-8.533-3.413-8.533-8.533v-34.133c0-5.12,3.413-8.533,8.533-8.533h34.133 c5.12,0,8.533,3.413,8.533,8.533v34.133C374.467,251.587,371.053,255,365.933,255z M340.333,237.933H357.4v-17.067h-17.067V237.933 z"/>
                                                    <polygon style="fill:#D0E8F9;"
                                                             points="391.533,212.333 425.667,212.333 425.667,246.467 391.533,246.467 "/>
                                                    <path style="fill:#241f31;"
                                                          d="M425.667,255h-34.133c-5.12,0-8.533-3.413-8.533-8.533v-34.133c0-5.12,3.413-8.533,8.533-8.533 h34.133c5.12,0,8.533,3.413,8.533,8.533v34.133C434.2,251.587,430.787,255,425.667,255z M400.067,237.933h17.067v-17.067h-17.067 V237.933z"/>
                                                    <polygon style="fill:#D0E8F9;"
                                                             points="272.067,272.067 306.2,272.067 306.2,306.2 272.067,306.2 "/>
                                                    <path style="fill:#241f31;"
                                                          d="M306.2,314.733h-34.133c-5.12,0-8.533-3.413-8.533-8.533v-34.133c0-5.12,3.413-8.533,8.533-8.533 H306.2c5.12,0,8.533,3.413,8.533,8.533V306.2C314.733,311.32,311.32,314.733,306.2,314.733z M280.6,297.667h17.067V280.6H280.6 V297.667z"/>
                                                    <polygon style="fill:#D0E8F9;"
                                                             points="331.8,272.067 365.933,272.067 365.933,306.2 331.8,306.2 "/>
                                                    <path style="fill:#241f31;"
                                                          d="M365.933,314.733H331.8c-5.12,0-8.533-3.413-8.533-8.533v-34.133c0-5.12,3.413-8.533,8.533-8.533 h34.133c5.12,0,8.533,3.413,8.533,8.533V306.2C374.467,311.32,371.053,314.733,365.933,314.733z M340.333,297.667H357.4V280.6 h-17.067V297.667z"/>
                                                    <polygon style="fill:#D0E8F9;"
                                                             points="391.533,272.067 425.667,272.067 425.667,306.2 391.533,306.2 "/>
                                                    <path style="fill:#241f31;"
                                                          d="M425.667,314.733h-34.133c-5.12,0-8.533-3.413-8.533-8.533v-34.133c0-5.12,3.413-8.533,8.533-8.533 h34.133c5.12,0,8.533,3.413,8.533,8.533V306.2C434.2,311.32,430.787,314.733,425.667,314.733z M400.067,297.667h17.067V280.6 h-17.067V297.667z"/>
                                                    <polygon style="fill:#D0E8F9;"
                                                             points="272.067,331.8 306.2,331.8 306.2,365.933 272.067,365.933 "/>
                                                    <path style="fill:#241f31;"
                                                          d="M306.2,374.467h-34.133c-5.12,0-8.533-3.413-8.533-8.533V331.8c0-5.12,3.413-8.533,8.533-8.533 H306.2c5.12,0,8.533,3.413,8.533,8.533v34.133C314.733,371.053,311.32,374.467,306.2,374.467z M280.6,357.4h17.067v-17.067H280.6 V357.4z"/>
                                                    <polygon style="fill:#D0E8F9;"
                                                             points="331.8,331.8 365.933,331.8 365.933,365.933 331.8,365.933 "/>
                                                    <path style="fill:#241f31;"
                                                          d="M365.933,374.467H331.8c-5.12,0-8.533-3.413-8.533-8.533V331.8c0-5.12,3.413-8.533,8.533-8.533 h34.133c5.12,0,8.533,3.413,8.533,8.533v34.133C374.467,371.053,371.053,374.467,365.933,374.467z M340.333,357.4H357.4v-17.067 h-17.067V357.4z"/>
                                                    <polygon style="fill:#D0E8F9;"
                                                             points="391.533,331.8 425.667,331.8 425.667,365.933 391.533,365.933 "/>
                                                    <g>
                                                        <path style="fill:#241f31;"
                                                              d="M425.667,374.467h-34.133c-5.12,0-8.533-3.413-8.533-8.533V331.8c0-5.12,3.413-8.533,8.533-8.533 h34.133c5.12,0,8.533,3.413,8.533,8.533v34.133C434.2,371.053,430.787,374.467,425.667,374.467z M400.067,357.4h17.067v-17.067 h-17.067V357.4z"/>
                                                        <path style="fill:#241f31;"
                                                              d="M203.8,365.933H50.2c-5.12,0-8.533-3.413-8.533-8.533s3.413-8.533,8.533-8.533h153.6 c5.12,0,8.533,3.413,8.533,8.533S208.92,365.933,203.8,365.933z M144.067,178.2c-5.12,0-8.533-3.413-8.533-8.533v-34.133 c0-5.12,3.413-8.533,8.533-8.533c5.12,0,8.533,3.413,8.533,8.533v34.133C152.6,174.787,149.187,178.2,144.067,178.2z M109.933,178.2c-5.12,0-8.533-3.413-8.533-8.533v-34.133c0-5.12,3.413-8.533,8.533-8.533s8.533,3.413,8.533,8.533v34.133 C118.467,174.787,115.053,178.2,109.933,178.2z M186.733,84.333c-5.12,0-8.533-3.413-8.533-8.533V50.2 c-2.56,0-4.267-0.853-5.973-2.56c-3.413-3.413-3.413-8.533,0-11.947l8.533-8.533c0.853-0.853,1.707-1.707,2.56-1.707 c0.853-0.853,2.56-0.853,3.413-0.853l0,0l0,0l0,0c0.853,0,2.56,0,3.413,0.853c0.853,0,1.707,0.853,2.56,1.707 s1.707,1.707,1.707,2.56c0.853,0.853,0.853,2.56,0.853,3.413l0,0l0,0V75.8C195.267,80.92,191.853,84.333,186.733,84.333z M152.6,84.333c-5.12,0-8.533-3.413-8.533-8.533V50.2c-2.56,0-4.267-0.853-5.973-2.56c-3.413-3.413-3.413-8.533,0-11.947 l8.533-8.533c0.853-0.853,1.707-1.707,2.56-1.707c0.853-0.853,2.56-0.853,3.413-0.853l0,0l0,0l0,0c0.853,0,2.56,0,3.413,0.853 c0.853,0,1.707,0.853,2.56,1.707s1.707,1.707,1.707,2.56c0.853,0.853,0.853,2.56,0.853,3.413l0,0l0,0V75.8 C161.133,80.92,157.72,84.333,152.6,84.333z M109.933,84.333c-2.56,0-4.267-0.853-5.973-2.56c-3.413-3.413-3.413-8.533,0-11.947 l8.533-8.533c3.413-3.413,8.533-3.413,11.947,0c3.413,3.413,3.413,8.533,0,11.947l-8.533,8.533 C114.2,83.48,112.493,84.333,109.933,84.333z M75.8,84.333c-5.12,0-8.533-3.413-8.533-8.533V50.2c-2.56,0-4.267-0.853-5.973-2.56 c-3.413-3.413-3.413-8.533,0-11.947l8.533-8.533c0.853-0.853,1.707-1.707,2.56-1.707C73.24,24.6,74.947,24.6,75.8,24.6l0,0l0,0 l0,0c0.853,0,2.56,0,3.413,0.853c0.853,0,1.707,0.853,2.56,1.707c0.853,0.853,1.707,1.707,1.707,2.56 c0.853,0.853,0.853,2.56,0.853,3.413l0,0l0,0V75.8C84.333,80.92,80.92,84.333,75.8,84.333z"/>
                                                    </g>
                                                    <polygon style="fill:#D0E8F9;"
                                                             points="67.267,203.8 186.733,203.8 186.733,357.4 67.267,357.4 "/>
                                                    <g>
                                                        <path style="fill:#241f31;"
                                                              d="M186.733,365.933H67.267c-5.12,0-8.533-3.413-8.533-8.533V203.8c0-5.12,3.413-8.533,8.533-8.533 h119.467c5.12,0,8.533,3.413,8.533,8.533v153.6C195.267,362.52,191.853,365.933,186.733,365.933z M75.8,348.867h102.4V212.333 H75.8V348.867z"/>
                                                        <path style="fill:#241f31;"
                                                              d="M237.933,383c-5.12,0-8.533-3.413-8.533-8.533V161.133c0-5.12,3.413-8.533,8.533-8.533 c5.12,0,8.533,3.413,8.533,8.533v213.333C246.467,379.587,243.053,383,237.933,383z M135.533,331.8H92.867 c-5.12,0-8.533-3.413-8.533-8.533c0-5.12,3.413-8.533,8.533-8.533h42.667c5.12,0,8.533,3.413,8.533,8.533 C144.067,328.387,140.653,331.8,135.533,331.8z M161.133,289.133H152.6c-5.12,0-8.533-3.413-8.533-8.533 c0-5.12,3.413-8.533,8.533-8.533h8.533c5.12,0,8.533,3.413,8.533,8.533S166.253,289.133,161.133,289.133z M101.4,289.133h-8.533 c-5.12,0-8.533-3.413-8.533-8.533c0-5.12,3.413-8.533,8.533-8.533h8.533c5.12,0,8.533,3.413,8.533,8.533 S106.52,289.133,101.4,289.133z M161.133,246.467h-42.667c-5.12,0-8.533-3.413-8.533-8.533c0-5.12,3.413-8.533,8.533-8.533h42.667 c5.12,0,8.533,3.413,8.533,8.533C169.667,243.053,166.253,246.467,161.133,246.467z"/>
                                                    </g>
                                                </g>
                                            </g>
                                    </svg>
                                        <span class="hide-menu">Касса (кирим ва харажат)</span></a>
                                    <ul>

                                    </ul>
                                </li>

                                @php // Cash Report @endphp
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                       href="{{ route('cash-report.index') }}"
                                       aria-expanded="false">
                                        <svg height="25px" width="25px" version="1.1" id="Layer_1"
                                             xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 503.467 503.467" xml:space="preserve" class="me-2">
                                    <g transform="translate(1 1)">
                                        <path style="fill:#E4F2DE;" d="M61.293,419.693c-5.973,5.973-14.507,10.24-23.893,10.24h102.4V105.667
                                        c0-18.773-15.36-34.133-34.133-34.133c-9.387,0-17.92,3.413-23.893,10.24c5.973-5.973,14.507-10.24,23.893-10.24h256V3.267H3.267 V395.8c0,18.773,15.36,34.133,34.133,34.133C46.787,429.933,55.32,426.52,61.293,419.693L61.293,419.693z M498.2,105.667V498.2
                                        H139.8v-68.267V105.667c0-18.773-15.36-34.133-34.133-34.133h256h102.4C482.84,71.533,498.2,86.893,498.2,105.667L498.2,105.667z"/>
                                        <path style="fill:#80D6FA;"
                                              d="M208.067,327.533H242.2v-51.2h-34.133V327.533z M344.6,327.533h34.133V242.2H344.6V327.533z M276.333,327.533h34.133V208.067h-34.133V327.533z M412.867,327.533H447V139.8h-34.133V327.533z"/>
                                    </g>
                                            <path style="fill:#51565F;" d="M499.2,503.467H140.8c-2.56,0-4.267-1.707-4.267-4.267v-64H89.6c-2.56,0-4.267-1.707-4.267-4.267
                                    c0-2.56,1.707-4.267,4.267-4.267h46.933v-320c0-16.213-13.653-29.867-29.867-29.867S76.8,90.453,76.8,106.667V396.8
                                    c0,21.333-17.067,38.4-38.4,38.4S0,418.133,0,396.8V4.267C0,1.707,1.707,0,4.267,0h358.4c2.56,0,4.267,1.707,4.267,4.267V38.4
                                    c0,2.56-1.707,4.267-4.267,4.267S358.4,40.96,358.4,38.4V8.533H8.533V396.8c0,16.213,13.653,29.867,29.867,29.867
                                    s29.867-13.653,29.867-29.867V106.667c0-21.333,17.067-38.4,38.4-38.4s38.4,17.067,38.4,38.4v388.267h349.867V106.667
                                    c0-16.213-13.653-29.867-29.867-29.867H166.4c-2.56,0-4.267-1.707-4.267-4.267c0-2.56,1.707-4.267,4.267-4.267h298.667
                                    c21.333,0,38.4,17.067,38.4,38.4V499.2C503.467,501.76,501.76,503.467,499.2,503.467z M430.933,435.2H209.067
                                    c-2.56,0-4.267-1.707-4.267-4.267c0-2.56,1.707-4.267,4.267-4.267h221.867c2.56,0,4.267,1.707,4.267,4.267
                                    C435.2,433.493,433.493,435.2,430.933,435.2z M396.8,384h-51.2c-2.56,0-4.267-1.707-4.267-4.267c0-2.56,1.707-4.267,4.267-4.267
                                    h51.2c2.56,0,4.267,1.707,4.267,4.267C401.067,382.293,399.36,384,396.8,384z M311.467,384h-102.4c-2.56,0-4.267-1.707-4.267-4.267
                                    c0-2.56,1.707-4.267,4.267-4.267h102.4c2.56,0,4.267,1.707,4.267,4.267C315.733,382.293,314.027,384,311.467,384z M413.867,332.8
                                    h-34.133c-2.56,0-4.267-1.707-4.267-4.267v-81.067h-25.6v81.067c0,2.56-1.707,4.267-4.267,4.267h-34.133
                                    c-2.56,0-4.267-1.707-4.267-4.267v-115.2h-25.6v115.2c0,2.56-1.707,4.267-4.267,4.267H243.2c-2.56,0-4.267-1.707-4.267-4.267V281.6
                                    h-25.6v46.933c0,2.56-1.707,4.267-4.267,4.267s-4.267-1.707-4.267-4.267v-51.2c0-2.56,1.707-4.267,4.267-4.267H243.2
                                    c2.56,0,4.267,1.707,4.267,4.267v46.933h25.6v-115.2c0-2.56,1.707-4.267,4.267-4.267h34.133c2.56,0,4.267,1.707,4.267,4.267v115.2
                                    h25.6V243.2c0-2.56,1.707-4.267,4.267-4.267h34.133c2.56,0,4.267,1.707,4.267,4.267v81.067h25.6V140.8
                                    c0-2.56,1.707-4.267,4.267-4.267h17.067c2.56,0,4.267,1.707,4.267,4.267c0,2.56-1.707,4.267-4.267,4.267h-12.8v183.467
                                    C418.133,331.093,416.427,332.8,413.867,332.8z"/>
                                </svg>
                                        <span class="hide-menu">Касса ҳисоботи</span>
                                    </a>
                                </li>

                                @php // Exchange Rates @endphp
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                       href="{{ route('exchange-rates.index') }}" aria-expanded="false">
                                        <svg height="25px" width="25px" version="1.1" id="Layer_1"
                                             xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 512 512"
                                             xml:space="preserve" fill="#3d3846" class="me-2">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                               stroke-linejoin="round"/>
                                            <g id="SVGRepo_iconCarrier">
                                                <circle style="fill:#FFC850;" cx="136.262" cy="144.782" r="128.307"/>
                                                <circle style="fill:#FFDC64;" cx="136.262" cy="144.782" r="102.645"/>
                                                <path style="fill:#FFC850;"
                                                      d="M169.438,195.398c-45.255-0.798-82.976-38.506-83.79-83.761c-0.127-7.101,0.616-14.005,2.129-20.617 c1.555-6.794-6.587-11.742-11.556-6.856c-18.81,18.499-29.083,45.645-24.352,75.009c5.73,35.569,34.433,64.272,70.002,70.002 c29.364,4.731,56.511-5.542,75.009-24.352c4.887-4.97-0.062-13.111-6.857-11.556C183.422,194.78,176.529,195.523,169.438,195.398z"/>
                                                <circle style="fill:#FFF082;" cx="183.307" cy="97.736" r="21.384"/>
                                                <circle style="fill:#FFC850;" cx="375.767" cy="367.18" r="128.307"/>
                                                <circle style="fill:#FFDC64;" cx="375.767" cy="367.18" r="102.645"/>
                                                <path style="fill:#FFC850;"
                                                      d="M408.944,417.796c-45.255-0.798-82.976-38.506-83.79-83.761c-0.127-7.101,0.616-14.005,2.129-20.617 c1.555-6.794-6.587-11.742-11.556-6.856c-18.81,18.499-29.083,45.645-24.352,75.009c5.73,35.569,34.433,64.272,70.002,70.002 c29.364,4.731,56.51-5.542,75.009-24.352c4.887-4.97-0.062-13.111-6.857-11.556C422.927,417.178,416.034,417.921,408.944,417.796z"/>
                                                <circle style="fill:#FFF082;" cx="422.813" cy="320.134" r="21.384"/>
                                                <path
                                                    d="M232.658,241.182c41.811-41.812,51.182-105.415,25.845-156.783c36.104,0.509,70.439,12.065,99.441,33.513 c25.076,18.545,44.291,43.012,56.214,71.342l-18.439-15.067c-3.429-2.803-8.481-2.295-11.284,1.136 c-2.802,3.429-2.295,8.481,1.136,11.283l38.621,31.56c1.454,1.188,3.253,1.809,5.076,1.809c0.912,0,1.829-0.156,2.713-0.473 c2.651-0.954,4.607-3.228,5.153-5.991l9.672-48.93c0.86-4.344-1.966-8.563-6.312-9.422c-4.344-0.858-8.563,1.966-9.422,6.312 l-3.589,18.156c-13.12-29.544-33.595-55.082-60.004-74.61c-32.449-23.997-70.993-36.681-111.466-36.681 c-2.25,0-4.514,0.055-6.771,0.135c-1.462-2.159-2.984-4.291-4.585-6.383c-2.691-3.518-7.723-4.188-11.242-1.498 c-3.518,2.691-4.188,7.724-1.498,11.242c36.419,47.619,31.862,115.549-10.6,158.012c-23.453,23.452-54.249,35.177-85.057,35.174 c-30.8-0.002-61.61-11.727-85.057-35.174c-46.899-46.9-46.899-123.213,0-170.113c42.462-42.462,110.393-47.019,158.012-10.6 c3.518,2.691,8.552,2.02,11.242-1.498c2.69-3.518,2.02-8.551-1.498-11.242C164.981-4.894,87.986,0.265,39.865,48.387 c-53.153,53.153-53.153,139.64,0,192.795c26.577,26.577,61.487,39.865,96.397,39.865S206.082,267.758,232.658,241.182z"/>
                                                <path
                                                    d="M484.16,284.479c-2.69-3.518-7.723-4.187-11.242-1.497c-3.518,2.691-4.188,7.724-1.497,11.242 c36.423,47.619,31.867,115.551-10.597,158.016c-23.453,23.452-54.249,35.177-85.057,35.174c-30.8-0.002-61.61-11.727-85.057-35.174 c-46.899-46.9-46.899-123.213,0-170.113c42.465-42.463,110.397-47.019,158.016-10.597c3.519,2.693,8.552,2.021,11.242-1.497 c2.691-3.518,2.021-8.551-1.497-11.242c-53.979-41.288-130.975-36.13-179.1,11.996c-42.342,42.342-50.954,105.837-25.836,156.784 c-36.109-0.507-70.446-12.063-99.45-33.513c-25.076-18.545-44.291-43.012-56.214-71.342l18.439,15.067 c3.429,2.802,8.481,2.295,11.284-1.136c2.802-3.429,2.295-8.481-1.136-11.284l-38.621-31.56c-2.181-1.782-5.138-2.289-7.788-1.337 c-2.651,0.954-4.607,3.228-5.153,5.991l-9.672,48.93c-0.86,4.344,1.966,8.563,6.312,9.422c0.525,0.104,1.048,0.154,1.564,0.154 c3.751,0,7.103-2.646,7.858-6.466l3.589-18.156c13.12,29.544,33.595,55.082,60.004,74.61 c32.449,23.997,70.993,36.681,111.466,36.681c2.254,0,4.523-0.055,6.784-0.135c4.789,7.084,10.306,13.816,16.572,20.083 c26.577,26.577,61.487,39.865,96.397,39.865s69.82-13.288,96.397-39.865C520.29,415.453,525.446,338.457,484.16,284.479z"/>
                                                <path
                                                    d="M414.794,333.502c0,4.429,3.59,8.019,8.019,8.019s8.019-3.59,8.019-8.019c0-17.489-20.102-31.518-47.046-33.864v-9.439 c0-4.429-3.59-8.019-8.019-8.019s-8.019,3.59-8.019,8.019v9.439c-26.943,2.346-47.046,16.375-47.046,33.864 c0,23.466,21.605,32.682,47.046,39.808v45.307c-18.196-1.941-31.007-10.237-31.007-17.754c0-4.429-3.59-8.019-8.019-8.019 s-8.019,3.59-8.019,8.019c0,17.489,20.102,31.519,47.046,33.864v9.439c0,4.429,3.59,8.019,8.019,8.019s8.019-3.59,8.019-8.019 v-9.439c26.943-2.346,47.046-16.375,47.046-33.864c0-23.466-21.605-32.682-47.046-39.808v-45.307 C401.982,317.688,414.794,325.985,414.794,333.502z M336.741,333.502c0-7.518,12.811-15.814,31.007-17.754v40.844 C344.804,349.669,336.741,343.411,336.741,333.502z M414.794,400.863c0,7.518-12.811,15.814-31.007,17.754v-40.844 C406.731,384.696,414.794,390.954,414.794,400.863z"/>
                                                <path
                                                    d="M136.262,84.373c10.675,0,20.929,3.918,28.873,11.03c3.299,2.954,8.369,2.674,11.323-0.624 c2.954-3.3,2.674-8.369-0.624-11.323c-10.889-9.75-24.943-15.12-39.572-15.12c-32.721,0-59.342,26.62-59.342,59.342v9.088h-9.088 c-4.429,0-8.019,3.59-8.019,8.019c0,4.429,3.59,8.019,8.019,8.019h9.088v9.088c0,32.721,26.62,59.342,59.342,59.342 c14.626,0,28.677-5.367,39.565-15.115c3.3-2.954,3.581-8.023,0.627-11.323c-2.954-3.301-8.025-3.581-11.323-0.627 c-7.943,7.11-18.196,11.027-28.869,11.027c-23.878,0-43.303-19.426-43.303-43.303v-9.088h43.303c4.429,0,8.019-3.59,8.019-8.019 s-3.59-8.019-8.019-8.019H92.958v-9.088C92.958,103.8,112.385,84.373,136.262,84.373z"/>
                                            </g>
                                        </svg>
                                        <span class="hide-menu">Валюта курслари</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endcan

                    @can ('coreAccess')
                        @php // Pre Order Item @endphp
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                               href="{{ route('profit-and-loss.index') }}" aria-expanded="false">
                                <svg height="25px" width="25px" version="1.1" id="Capa_1"
                                     xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 512 512" xml:space="preserve" class="me-2">
                                    <g>
                                        <g>
                                            <g>
                                                <path style="fill:#5C546A;"
                                                      d="M407.672,501.742l-40-136c-1.242-4.234-5.672-6.688-9.93-5.414 c-4.234,1.242-6.664,5.688-5.414,9.93L363.429,408H148.571l11.101-37.742c1.25-4.242-1.18-8.688-5.414-9.93 c-4.281-1.281-8.687,1.18-9.93,5.414l-40,136c-1.25,4.242,1.18,8.688,5.414,9.93C110.5,511.898,111.258,512,112,512 c3.461,0,6.648-2.258,7.672-5.742L143.865,424h224.269l24.193,82.258c1.023,3.484,4.211,5.742,7.672,5.742 c0.742,0,1.508-0.102,2.258-0.328C406.492,510.43,408.922,505.984,407.672,501.742z"/>
                                            </g>
                                            <g>
                                                <path style="fill:#5C546A;"
                                                      d="M256,48c4.422,0,8-3.578,8-8V8c0-4.422-3.578-8-8-8s-8,3.578-8,8v32C248,44.422,251.578,48,256,48 z"/>
                                            </g>
                                        </g>
                                        <g>
                                            <path style="fill:#FFFFFF;"
                                                  d="M488,32H24c-4.422,0-8,3.578-8,8v312c0,13.234,10.766,24,24,24h432c13.234,0,24-10.766,24-24V40 C496,35.578,492.422,32,488,32z"/>
                                        </g>
                                        <g>
                                            <polygon style="fill:#FFE1B2;"
                                                     points="80,368 432,368 432,112 264,264 192,208 80,304.003 		"/>
                                        </g>
                                        <g>
                                            <polygon style="fill:#FDC88E;"
                                                     points="264,360 264,272 192,208 192,360 		"/>
                                        </g>
                                        <g>
                                            <g>
                                                <path style="fill:#FF4F19;"
                                                      d="M88,312c-2.047,0-4.094-0.781-5.656-2.344c-3.125-3.125-3.125-8.188,0-11.312l92.687-92.687 c9.359-9.359,24.578-9.359,33.937,0l49.375,49.375c3.125,3.125,8.188,3.125,11.312,0l148.687-148.687 c3.125-3.125,8.188-3.125,11.312,0c3.125,3.125,3.125,8.187,0,11.312L280.969,266.344c-9.359,9.359-24.578,9.359-33.938,0 l-49.375-49.375c-3.125-3.125-8.188-3.125-11.312,0l-92.687,92.687C92.094,311.219,90.047,312,88,312z"/>
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path style="fill:#FF4F19;"
                                                      d="M424,192c-4.422,0-8-3.578-8-8v-64h-64c-4.422,0-8-3.578-8-8c0-4.422,3.578-8,8-8h72 c4.422,0,8,3.578,8,8v72C432,188.422,428.422,192,424,192z"/>
                                            </g>
                                        </g>
                                        <g>
                                            <path style="fill:#8B8996;"
                                                  d="M480,48v304c0,4.411-3.589,8-8,8H40c-4.411,0-8-3.589-8-8V48H480 M488,32H24c-4.422,0-8,3.578-8,8 v312c0,13.234,10.766,24,24,24h432c13.234,0,24-10.766,24-24V40C496,35.578,492.422,32,488,32L488,32z"/>
                                        </g>
                                        <g>
                                            <path style="fill:#9F6459;"
                                                  d="M8,56h496c4.418,0,8-3.582,8-8V32c0-4.418-3.582-8-8-8H8c-4.418,0-8,3.582-8,8v16 C0,52.418,3.582,56,8,56z"/>
                                        </g>
                                    </g>
                                    </svg>
                                <span class="hide-menu">Фойда ва зарар</span></a>
                        </li>
                    @endcan

                    <li class="sidebar-item">
                        <a
                            class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="{{ route('file.index') }}"
                            aria-expanded="false">
                            <svg width="25px" height="25px" viewBox="0 0 32 32" fill="none"
                                 xmlns="http://www.w3.org/2000/svg" class="me-2">
                                <g clip-path="url(#clip0_901_2684)">
                                    <path
                                        d="M31 4V26C31 26.55 30.55 27 30 27H26V8C26 7.45 25.55 7 25 7H21V3H30C30.55 3 31 3.45 31 4Z"
                                        fill="#668077"/>
                                    <path
                                        d="M26 27V30C26 30.55 25.55 31 25 31H7C6.45 31 6 30.55 6 30V25V8C6 7.45 6.45 7 7 7H21H25C25.55 7 26 7.45 26 8V27Z"
                                        fill="#FFE6EA"/>
                                    <path
                                        d="M21 3V7H7C6.45 7 6 7.45 6 8V25H2C1 25 1 24 1 24V2C1 1.45 1.45 1 2 1H20C20.55 1 21 1.45 21 2V3Z"
                                        fill="#FFC44D"/>
                                    <path
                                        d="M12 13H15M12 16H20M12 20H20M12 24H20M21 7V2C21 1.447 20.553 1 20 1H2C1.447 1 1 1.447 1 2V24C1 24 1 25 2 25H3M26 27H30C30.553 27 31 26.553 31 26V4C31 3.447 30.553 3 30 3H24M26 30C26 30.553 25.553 31 25 31H7C6.447 31 6 30.553 6 30V8C6 7.447 6.447 7 7 7H25C25.553 7 26 7.447 26 8V30Z"
                                        stroke="#000000" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_901_2684">
                                        <rect width="32" height="32" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                            <span class="hide-menu">Файллар</span></a>
                    </li>

                    @can ('hasAccess')
                        @php // Client @endphp
                        <li class="sidebar-item">
                            <a
                                class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{ route('user.index') }}"
                                aria-expanded="false">
                                <svg width="25px" height="25px" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"
                                     version="1.1" class="me-2">
                                    <path style="fill:#427794;stroke:#2A424F"
                                          d="M 22,43 C 18,48 6.5,45 4.2,56 2,62 2,81 14,79 13,64 12,57 12,57 c 0,0 1,14 2,21 9,4 24,4 35,-1 0,-8 -1,-13 0,-18 0,-5 0,19 0,19 0,0 6,2 8,-5 3,-10 5,-24 -9,-28 -9,-1 -7,-2 -8,-2 -2,0 -18,0 -18,0 z"/>
                                    <path style="fill:#C29B82;stroke:#693311"
                                          d="m 23,38 c 0,0 1,3 -1,5 3,4 11,8 18,0 -1,-2 -1,-2 -1,-5 0,0 -16,0 -16,0 z"/>
                                    <path style="fill:#CDA68E;stroke:#693311"
                                          d="M 31,42 C 17,42 7.6,4.8 31,4.2 55,4.1 44,42 31,42 z"/>
                                    <path style="fill:#553932;stroke:#311710"
                                          d="M 17,26 C 14,16 14,3.2 31,2.4 44,3.1 49,15 44,26 44,21 45,19 43,16 39,15 33,16 28,11 27,15 15,13 17,26 z"/>
                                    <path style="fill:#5F3E20;stroke:#311710"
                                          d="m 45,65 c 5,-8 0,-25 3,-31 3,-10 7,-16 16,-16 10,0 16,8 20,17 1,2 0,6 2,11 1,4 -1,8 -1,10 0,5 -1,3 2,9 -5,13 -34,10 -42,0 z"/>
                                    <path style="fill:#D8933B;stroke:#2A424F"
                                          d="m 58,60 c -5,5 -18,3 -20,13 -2,6 -1,25 11,24 -1,-16 -3,-23 -3,-23 0,0 2,15 3,21 9,5 23,5 35,-1 0,-6 -1,-13 0,-18 1,-5 0,20 0,20 0,0 7,1 9,-6 2,-9 4,-22 -7,-25 -9,-3 -10,-5 -12,-5 -1,0 -16,0 -16,0 z"/>
                                    <path style="fill:#DEB89F;stroke:#693311"
                                          d="m 58,54 c 0,0 1,3 0,7 3,3 10,8 16,0 -1,-4 -1,-4 -1,-7 0,0 -15,0 -15,0 z"/>
                                    <path style="fill:#DBBFA8;stroke:#693311"
                                          d="M 66,59 C 52,59 43,21 66,20 86,21 79,59 66,59 z"/>
                                    <path style="fill:#5F3E20"
                                          d="m 63,27 c -3,5 -7,8 -12,9 -4,1 2,-17 13,-17 5,0 13,3 15,15 -6,1 -14,-5 -16,-7"/>
                                </svg>
                                <span class="hide-menu">Клиентлар</span></a>
                        </li>

                        @php // Staff @endphp
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                               href="{{ route('user.staff') }}" aria-expanded="false">
                                <svg fill="#ffffff" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                     width="25px" height="25px" viewBox="0 0 183.405 183.405" xml:space="preserve"
                                     class="me-2"><g id="SVGRepo_bgCarrier" stroke-width="0"/>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                                    <g id="SVGRepo_iconCarrier">
                                        <g>
                                            <g>
                                                <path
                                                    d="M160.766,0H64.054c-5.307,0-9.965,2.755-12.662,6.902h8.915c1.154-0.524,2.402-0.859,3.748-0.859h96.711 c4.999,0,9.061,4.064,9.061,9.064v125.577c0,4.604-3.495,8.269-7.946,8.841c-0.292,2.29-1.054,4.422-2.259,6.26h1.145 c8.336,0,15.113-6.771,15.113-15.101V15.101C175.879,6.777,169.102,0,160.766,0z"/>
                                                <path
                                                    d="M140.057,13.804H43.348c-5.307,0-9.965,2.759-12.666,6.905h8.918c1.154-0.523,2.399-0.861,3.748-0.861h96.708 c5.011,0,9.072,4.064,9.072,9.066v125.579c0,4.604-3.501,8.258-7.946,8.83c-0.292,2.289-1.06,4.42-2.259,6.271h1.139 c8.342,0,15.125-6.771,15.125-15.113V28.914C155.176,20.581,148.398,13.804,140.057,13.804z"/>
                                                <path
                                                    d="M119.347,27.611H22.639c-8.336,0-15.113,6.771-15.113,15.107v125.58c0,8.33,6.777,15.107,15.113,15.107h96.708 c8.343,0,15.126-6.771,15.126-15.107V42.718C134.473,34.388,127.689,27.611,119.347,27.611z M128.42,168.298 c0,4.993-4.067,9.066-9.073,9.066H22.639c-5.005,0-9.07-4.067-9.07-9.066V42.718c0-4.997,4.064-9.067,9.07-9.067h96.708 c5.006,0,9.073,4.07,9.073,9.067V168.298z"/>
                                                <path
                                                    d="M80.236,107.747c6.777-4.549,11.447-13.548,11.447-21.644c0-11.43-9.252-20.7-20.688-20.7 c-11.43,0-20.685,9.271-20.685,20.7c0,8.096,4.67,17.095,11.429,21.644c-16.185,4.11-28.202,18.194-28.202,28.625 c0,12.324,74.933,12.324,74.933,0C108.46,125.941,96.452,111.857,80.236,107.747z M70.996,145.604l-10.507-10.485l8.835-21.361 H69.23l-3.428-3.945c1.668,0.597,3.386,0.962,5.188,0.962c1.806,0,3.517-0.359,5.179-0.943l-3.435,3.921h-0.076l8.842,21.361 L70.996,145.604z"/>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                                <span class="hide-menu">Ҳодимлар</span></a>
                        </li>
                    @endcan

                    @php // Role @endphp
                    @can ('coreAccess')
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                               href="{{ route('role.index') }}" aria-expanded="false">
                                <svg height="25px" width="25px" version="1.1" id="Layer_1"
                                     xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 499.461 499.461" xml:space="preserve" fill="#000000" class="me-2">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                                    <g id="SVGRepo_iconCarrier">
                                        <path style="fill:#84DBFF;"
                                              d="M388.18,249.731c0,29.257-9.404,56.424-25.078,78.367c-5.224,7.314-11.494,14.629-17.763,20.898 c-22.988,21.943-54.335,36.571-87.771,37.616l0,0c-2.09,0-5.225,0-7.314,0c-2.09,0-5.224,0-7.314,0 c-34.482-2.09-64.784-15.673-88.816-37.616c-6.269-6.269-12.539-13.584-17.763-20.898c-15.673-21.943-25.078-49.11-25.078-78.367 c0-76.278,61.649-137.927,137.927-137.927C326.531,111.804,388.18,173.453,388.18,249.731z"/>
                                        <g>
                                            <ellipse transform="matrix(-0.1961 -0.9806 0.9806 -0.1961 40.5001 438.745)"
                                                     style="fill:#F8B64C;" cx="200.096" cy="202.771" rx="15.674"
                                                     ry="6.269"/>
                                            <ellipse
                                                transform="matrix(-0.9806 -0.1961 0.1961 -0.9806 554.8722 459.9698)"
                                                style="fill:#F8B64C;" cx="300.207" cy="202.516" rx="6.269" ry="15.674"/>
                                        </g>
                                        <path style="fill:#77767b;"
                                              d="M364.147,318.694c-5.224,7.314-11.494,14.629-17.763,20.898 c-22.988,21.943-54.335,36.571-87.771,37.616h-14.629c-34.482-2.09-64.784-15.673-88.816-37.616 c-6.269-6.269-12.539-13.584-17.763-20.898c2.09-6.269,5.224-11.494,8.359-15.673c0,0,1.045,0,2.09-1.045l0,0l0,0 c2.09-1.045,6.269-2.09,12.539-5.224c12.539-5.224,30.302-12.539,44.931-20.898c2.09-1.045,5.224-3.135,7.314-4.18 c2.09-1.045,4.18-3.135,6.269-4.18l0,0l2.09-9.404c0,0,8.359,15.673,25.078,18.808c1.045,0,3.135,0,4.18,0h2.09 c2.09,0,4.18,0,6.269,0l0,0c1.045,0,2.09,0,3.135-1.045c1.045,0,2.09-1.045,3.135-1.045c2.09-1.045,3.135-1.045,4.18-2.09 c1.045,0,2.09-1.045,3.135-2.09c2.09-1.045,3.135-2.09,4.18-3.135c2.09-2.09,3.135-3.135,4.18-4.18 c2.09-3.135,3.135-5.224,3.135-5.224l2.09,9.404c19.853,14.629,60.604,30.302,70.008,34.482c1.045,0,2.09,1.045,2.09,1.045 C358.922,307.2,362.057,313.469,364.147,318.694z"/>
                                        <path style="fill:#ACB3BA;"
                                              d="M219.951,296.751l8.359,14.629l11.494-17.763l-3.135-3.135l-9.404,13.584l-10.449-19.853 C217.861,287.347,218.906,291.527,219.951,296.751z"/>
                                        <path style="fill:#F8B64C;"
                                              d="M281.6,259.135c0,0-8.359,15.673-25.078,18.808c-2.09,0-4.18,0-6.269,0c-2.09,0-4.18,0-6.269,0 c-17.763-2.09-25.078-18.808-25.078-18.808s0-3.135,0-6.269c0-2.09,0-3.135,0-5.224c14.629,17.763,31.347,20.898,31.347,20.898 s16.718-3.135,31.347-20.898c0,1.045,0,3.135,0,5.224C281.6,256,281.6,259.135,281.6,259.135z"/>
                                        <path style="fill:#F7AF48;"
                                              d="M281.6,252.865c-14.629,15.673-29.257,18.808-30.302,18.808l0,0l0,0 c-1.045,0-15.673-3.135-30.302-18.808c0-2.09,0-3.135,0-5.224c14.629,17.763,31.347,20.898,31.347,20.898 s16.718-3.135,31.347-20.898C281.6,248.686,280.555,250.776,281.6,252.865z"/>
                                        <path style="fill:#FFD15C;"
                                              d="M302.498,189.127c0,3.135-1.045,5.224-1.045,5.224c-9.404,67.918-51.2,74.188-51.2,74.188 s-42.841-7.314-51.2-74.188c0,0,0-2.09-1.045-5.224l0,0c-2.09-16.718-4.18-68.963,52.245-67.918 C306.678,120.163,304.588,171.363,302.498,189.127z"/>
                                        <path style="fill:#40596B;"
                                              d="M355.788,304.065l-9.404,36.571c-22.988,21.943-54.335,36.571-87.771,37.616h-7.314V360.49 c1.045-2.09,2.09-4.18,3.135-7.314c2.09-5.224,5.224-10.449,7.314-14.629c0-1.045,1.045-1.045,1.045-2.09 c6.269-11.494,10.449-20.898,10.449-20.898c3.135-7.314,6.269-13.584,7.314-19.853c1.045-2.09,1.045-5.224,2.09-7.314 c3.135-14.629,1.045-21.943,1.045-21.943l0,0c19.853,14.629,60.604,30.302,70.008,34.482L355.788,304.065z"/>
                                        <path style="fill:#ACB3BA;"
                                              d="M280.555,296.751l-8.359,14.629l-11.494-17.763l3.135-3.135l9.404,13.584l10.449-19.853 C282.645,287.347,281.6,291.527,280.555,296.751z"/>
                                        <path style="fill:#FFFFFF;"
                                              d="M255.478,298.841l6.269,38.661c-4.18,7.314-8.359,16.718-11.494,24.033 c-3.135-7.314-8.359-15.673-11.494-24.033l6.269-38.661l-8.359-9.404l7.314-12.539l0,0c2.09,0,4.18,0,6.269,0c2.09,0,4.18,0,6.269,0 l0,0l7.314,12.539L255.478,298.841z"/>
                                        <g>
                                            <path style="fill:#334A5E;"
                                                  d="M257.567,378.253L257.567,378.253h-7.314c-2.09,0-5.224,0-7.314,0 c-34.482-2.09-64.784-15.673-88.816-37.616l-9.404-36.571l2.09-1.045l0,0l0,0c2.09-1.045,6.269-2.09,12.539-4.18 c12.539-5.224,30.302-12.539,44.931-20.898c2.09-1.045,5.224-3.135,7.314-4.18c2.09-1.045,4.18-3.135,6.269-4.18l0,0 c0,0-2.09,7.314,1.045,21.943c0,2.09,1.045,4.18,2.09,7.314c2.09,5.224,4.18,12.539,7.314,19.853c0,0,5.224,9.404,10.449,20.898 c0,1.045,1.045,1.045,1.045,2.09c2.09,5.224,5.224,10.449,7.314,14.629c1.045,2.09,2.09,5.224,3.135,7.314 C254.433,369.894,257.567,376.163,257.567,378.253z"/>
                                            <path style="fill:#334A5E;"
                                                  d="M302.498,189.127l-2.09,2.09c0,0-2.09-27.167-14.629-45.976c0,0-7.314,11.494-35.527,11.494 c-27.167,0-35.527-11.494-35.527-11.494c-12.539,18.808-14.629,45.976-14.629,45.976l-2.09-2.09l0,0 c-2.09-16.718-4.18-68.963,52.245-67.918C306.678,120.163,304.588,171.363,302.498,189.127z"/>
                                        </g>
                                        <path style="fill:#77767b;"
                                              d="M460.278,192.261c-5.224-17.763-11.494-34.482-20.898-49.11l17.763-39.706l-59.559-59.559 l-39.706,17.763c-15.673-8.359-32.392-15.673-49.11-20.898L293.094,0h-83.592l-16.718,39.706 c-17.763,5.224-34.482,11.494-49.11,20.898l-39.706-17.763L44.408,102.4l17.763,39.706c-8.359,15.673-15.673,32.392-20.898,49.11 L0.522,206.89v83.592L40.229,307.2c5.224,17.763,11.494,34.482,20.898,49.11l-17.763,39.706l59.559,59.559l39.706-17.763 c15.673,8.359,32.392,15.673,49.11,20.898l15.673,40.751h83.592l15.673-40.751c17.763-5.224,34.482-11.494,49.11-20.898 l39.706,17.763l59.559-59.559L437.29,356.31c8.359-15.673,15.673-32.392,20.898-49.11l40.751-15.673v-83.592L460.278,192.261z M373.551,373.029c-67.918,67.918-178.678,67.918-247.641,0c-67.918-67.918-67.918-178.678,0-247.641 c67.918-67.918,178.678-67.918,247.641,0C442.514,194.351,442.514,305.11,373.551,373.029z"/>
                                    </g>
                                </svg>
                                <span class="hide-menu">Роль</span>
                            </a>
                        </li>
                    @endcan

                    <div class="d-md-none">
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                               href="{{ route('logout') }}"
                               aria-expanded="false">
                                <i class="fa fa-power-off icon-small"></i>
                                <span class="hide-menu">Чиқиш</span>
                            </a>
                        </li>
                    </div>
                </ul>
            </nav>
        </div>
    </aside>

    <!-- Page wrapper  -->
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">{{ $title ?? 'Бошқарув панели' }}</h4>
                    <div class="ms-auto text-end">
                        {{ Breadcrumbs::render() }}
                    </div>
                </div>
            </div>
        </div>

        <div id="flash-messages"  class="{{ session('large_screen') ? 'd-none d-lg-block' : '' }}" style="position: fixed; top: 20px; right: 20px; z-index: 1050;">
            @foreach (['success', 'error', 'warning', 'info'] as $msg)
                @if(session($msg))
                    <div class="flash-alert d-flex justify-content-between align-items-center"
                         role="alert"
                         style="
                    min-width: 200px;
                    max-width: 400px;
                    padding: 0.75rem 1rem 0.75rem 1.5rem;
                    border-radius: 12px;
                    box-shadow: 0 8px 20px rgba(0,0,0,0.25);
                    transform: translateX(120%);
                    color: #fff;
                    font-weight: 500;
                    letter-spacing: 0.5px;
                    position: relative;
                    overflow: hidden;
                    background:
                        @switch($msg)
                            @case('success') linear-gradient(135deg, #38b000, #70e000) @break
                            @case('error') linear-gradient(135deg, #ff3c38, #ff7b6a) @break
                            @case('warning') linear-gradient(135deg, #ffb703, #ffd60a) @break
                            @case('info') linear-gradient(135deg, #0096c7, #00b4d8) @break
                            @default #333
                        @endswitch
                 ">
                        <span style="flex: 1; font-size: 1rem;">{{ session($msg) }}</span>
                        <button type="button" class="btn-close" aria-label="Close"
                                style="
                            width: 28px;
                            height: 28px;
                            opacity: 0.8;
                            transition: all 0.3s ease;
                        "
                                onmouseover="this.style.opacity='1'; this.style.transform='scale(1.2)';"
                                onmouseout="this.style.opacity='0.8'; this.style.transform='scale(1)';"
                        ></button>
                    </div>
                @endif
            @endforeach
        </div>
        <div id="custom-confirm-container"></div>

        {{ $slot }}

        <footer class="footer text-center">
            All Rights Reserved by Matrix-admin. Designed and Developed by
            <a href="https://www.wrappixel.com">WrapPixel</a>.
        </footer>
    </div>
    <!-- End Page wrapper  -->
</div>

<script src="{{ asset('js/backend/libs/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/backend/libs/perfect-scrollbar.jquery.min.js') }}"></script>
<script src="{{ asset('js/backend/libs/sparkline.js') }}"></script>
<script src="{{ asset('js/backend/dist/waves.js') }}"></script>
<script src="{{ asset('js/backend/dist/sidebarmenu.js') }}"></script>
<script src="{{ asset('js/backend/dist/custom.min.js') }}"></script>
<script src="{{ asset('js/backend/libs/excanvas.js') }}"></script>
<script src="{{ asset('js/backend/libs/flot/jquery.flot.js') }}"></script>
<script src="{{ asset('js/backend/libs/flot/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('js/backend/libs/flot/jquery.flot.time.js') }}"></script>
<script src="{{ asset('js/backend/libs/flot/jquery.flot.stack.js') }}"></script>
<script src="{{ asset('js/backend/libs/flot/jquery.flot.crosshair.js') }}"></script>
<script src="{{ asset('js/backend/libs/flot/jquery.flot.tooltip.min.js') }}"></script>
<script src="{{ asset('js/backend/dist/chart-page-init.js') }}"></script>
<script src="{{ asset('js/backend/libs/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/backend/libs/magnific-popup/meg.init.js') }}"></script>
<script src="{{ asset('js/backend/package/file-input.js') }}"></script>
<script src="{{ asset('js/backend/package/inputmask.min.js') }}"></script>
<script src="{{ asset('js/backend/main.js') }}"></script>

</body>
</html>

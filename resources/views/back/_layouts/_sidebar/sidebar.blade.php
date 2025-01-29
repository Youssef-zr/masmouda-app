<div class="bg-header-dark">
    <div class="content-header bg-white-5">
        <!-- Logo -->
        <a class="fw-semibold text-white tracking-wide" href="index.html">
            <span class="smini-visible">
                D<span class="opacity-75">x</span>
            </span>
            <span class="smini-hidden">
                {{ config("app.name") }}</span>
            </span>
        </a>
        <!-- END Logo -->

        <!-- Options -->
        <div class="d-flex align-items-center gap-1">
            <!-- Dark Mode -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <div class="dropdown">
                <button type="button" class="btn btn-sm btn-alt-secondary" id="sidebar-dark-mode-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="far fa-fw fa-moon" data-dark-mode-icon></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end smini-hide border-0" aria-labelledby="sidebar-dark-mode-dropdown">
                    <button type="button" class="dropdown-item d-flex align-items-center gap-2" data-toggle="layout" data-action="dark_mode_off" data-dark-mode="off">
                        <i class="far fa-sun fa-fw opacity-50"></i>
                        <span class="fs-sm fw-medium">Light</span>
                    </button>
                    <button type="button" class="dropdown-item d-flex align-items-center gap-2" data-toggle="layout" data-action="dark_mode_on" data-dark-mode="on">
                        <i class="far fa-moon fa-fw opacity-50"></i>
                        <span class="fs-sm fw-medium">Dark</span>
                    </button>
                    <button type="button" class="dropdown-item d-flex align-items-center gap-2" data-toggle="layout" data-action="dark_mode_system" data-dark-mode="system">
                        <i class="fa fa-desktop fa-fw opacity-50"></i>
                        <span class="fs-sm fw-medium">System</span>
                    </button>
                </div>
            </div>
            <!-- END Dark Mode -->

            <!-- Options -->
            <div class="dropdown">
                <button type="button" class="btn btn-sm btn-alt-secondary" id="sidebar-themes-dropdown" data-bs-auto-close="outside" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-fw fa-paint-brush"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end fs-sm border-0" aria-labelledby="sidebar-themes-dropdown">
                    <!-- Color Themes -->
                    <!-- Layout API, functionality initialized in Template._uiHandleTheme() -->
                    <div class="row g-sm text-center">
                        <div class="col-4 mb-1">
                            <a class="d-block py-3 text-white fs-xs fw-semibold bg-default rounded-1" data-toggle="theme" data-theme="default" href="#">
                                Default
                            </a>
                        </div>
                        <div class="col-4 mb-1">
                            <a class="d-block py-3 text-white fs-xs fw-semibold bg-xwork rounded-1" data-toggle="theme" data-theme="{{ url("assets/back/css/themes/xwork.min.css") }}" href="#">
                                xWork
                            </a>
                        </div>
                        <div class="col-4 mb-1">
                            <a class="d-block py-3 text-white fs-xs fw-semibold bg-xmodern rounded-1" data-toggle="theme" data-theme="{{ url("assets/back/css/themes/xmodern.min.css") }}" href="#">
                                xModern
                            </a>
                        </div>
                        <div class="col-4 mb-1">
                            <a class="d-block py-3 text-white fs-xs fw-semibold bg-xeco rounded-1" data-toggle="theme" data-theme="{{ url("assets/back/css/themes/xeco.min.css") }}" href="#">
                                xEco
                            </a>
                        </div>
                        <div class="col-4 mb-1">
                            <a class="d-block py-3 text-white fs-xs fw-semibold bg-xsmooth rounded-1" data-toggle="theme" data-theme="{{ url("assets/back/css/themes/xsmooth.min.css") }}" href="#">
                                xSmooth
                            </a>
                        </div>
                        <div class="col-4 mb-1">
                            <a class="d-block py-3 text-white fs-xs fw-semibold bg-xinspire rounded-1" data-toggle="theme" data-theme="{{ url("assets/back/css/themes/xinspire.min.css") }}" href="#">
                                xInspire
                            </a>
                        </div>
                        <div class="col-4 mb-1">
                            <a class="d-block py-3 text-white fs-xs fw-semibold bg-xdream rounded-1" data-toggle="theme" data-theme="{{ url("assets/back/css/themes/xdream.min.css") }}" href="#">
                                xDream
                            </a>
                        </div>
                        <div class="col-4 mb-1">
                            <a class="d-block py-3 text-white fs-xs fw-semibold bg-xpro rounded-1" data-toggle="theme" data-theme="{{ url("assets/back/css/themes/xpro.min.css") }}" href="#">
                                xPro
                            </a>
                        </div>
                        <div class="col-4 mb-1">
                            <a class="d-block py-3 text-white fs-xs fw-semibold bg-xplay rounded-1" data-toggle="theme" data-theme="{{ url("assets/back/css/themes/xplay.min.css") }}" href="#">
                                xPlay
                            </a>
                        </div>
                        <div class="col-12">
                            <a class="d-block py-2 bg-body-dark fs-xs fw-semibold text-dark rounded-1" href="be_ui_color_themes.html">All Color Themes</a>
                        </div>
                    </div>
                    <!-- END Color Themes -->
                </div>
            </div>
            <!-- END Options -->

            <!-- Close Sidebar, Visible only on mobile screens -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <button type="button" class="btn btn-sm btn-alt-secondary d-lg-none" data-toggle="layout" data-action="sidebar_close">
                <i class="fa fa-times-circle"></i>
            </button>
            <!-- END Close Sidebar -->
        </div>
        <!-- END Options -->
    </div>
</div>
<!-- End side header -->


<!-- Start Sidebar Menu -->
<div class="js-sidebar-scroll">
    <!-- Side Navigation -->
    <div class="content-side">
        <ul class="nav-main">

            <li class="nav-main-item  {{ setOpened([ 'admin.members.*', 'admin.role-members.*']) }}">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                    <i class="nav-main-link-icon fa fa-users"></i>
                    <span class="nav-main-link-name">{{ __("members.members") }}</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                        <a class="nav-main-link {{ setActive("admin.members.create") }}" href="{{ route("admin.members.create")}}">
                            <i class="nav-main-link-icon fa fa-plus-circle"></i>
                            <span class="nav-main-link-name">{{ __("global.add") }}</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link {{ setActive("admin.members.*","admin.members.create") }}" href="{{ route("admin.members.index")}}">
                            <i class="nav-main-link-icon fa fa-rectangle-list"></i>
                            <span class="nav-main-link-name">{{ __("members.members") }}</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link  {{ setActive("admin.role-members.*") }}" href="{{ route("admin.role-members.index")}}">
                            <i class="nav-main-link-icon fa fa-rectangle-list"></i>
                            <span class="nav-main-link-name">{{ __("members.roles") }}</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- END Side Navigation -->
</div>
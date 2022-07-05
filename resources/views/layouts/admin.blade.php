
    <!DOCTYPE html>
<html lang="en-US" dir="ltr">


<!-- Mirrored from prium.github.io/falcon/v3.9.0/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Jun 2022 13:35:49 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Keynotion</title>

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->



    <link rel="apple-touch-icon" sizes="180x180" href="/assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="/assets/img/favicons/favicon.ico">
    <link rel="manifest" href="/assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="/assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <script src="/assets/js/config.js"></script>
    <script src="/vendors/overlayscrollbars/OverlayScrollbars.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="/vendors/fullcalendar/main.min.css" rel="stylesheet">
    <link href="/vendors/flatpickr/flatpickr.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <link href="/vendors/overlayscrollbars/OverlayScrollbars.min.css" rel="stylesheet">
    <link href="/assets/css/theme-rtl.min.css" rel="stylesheet" id="style-rtl">
    <link href="/assets/css/theme.min.css" rel="stylesheet" id="style-default">
    <link href="/assets/css/user-rtl.min.css" rel="stylesheet" id="user-style-rtl">
    <link href="/assets/css/user.min.css" rel="stylesheet" id="user-style-default">
    <link href="/vendors/choices/choices.min.css" rel="stylesheet" />

    <script>
        var isRTL = JSON.parse(localStorage.getItem('isRTL'));
        if (isRTL) {
            var linkDefault = document.getElementById('style-default');
            var userLinkDefault = document.getElementById('user-style-default');
            linkDefault.setAttribute('disabled', true);
            userLinkDefault.setAttribute('disabled', true);
            document.querySelector('html').setAttribute('dir', 'rtl');
        } else {
            var linkRTL = document.getElementById('style-rtl');
            var userLinkRTL = document.getElementById('user-style-rtl');
            linkRTL.setAttribute('disabled', true);
            userLinkRTL.setAttribute('disabled', true);
        }
    </script>
</head>

<body>
<main class="main" id="top">
        <div class="container" data-layout="container">
            <script>
                var isFluid = JSON.parse(localStorage.getItem('isFluid'));
                if (isFluid) {
                    var container = document.querySelector('[data-layout]');
                    container.classList.remove('container');
                    container.classList.add('container-fluid');
                }
            </script>
            <nav class="navbar navbar-light navbar-vertical navbar-expand-xl" style="display: none;">
                <script>
                    var navbarStyle = localStorage.getItem("navbarStyle");
                    if (navbarStyle && navbarStyle !== 'transparent') {
                        document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
                    }
                </script>
                <div class="d-flex align-items-center">
                    <div class="toggle-icon-wrapper">
                        <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
                    </div><a class="navbar-brand" href="{{route('home_page')}}">
                        <div class="d-flex align-items-center py-3"><img class="me-2" src="/assets/img/icons/spot-illustrations/keynotion-favicon.png" alt="" width="40" /><span class="font-sans-serif"></span></div>
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
                    <div class="navbar-vertical-content scrollbar">
                        <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
                            <li class="nav-item">
                                <!-- label-->
                                <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                                    <div class="col-auto navbar-vertical-label">App</div>
                                    <div class="col ps-0">
                                        <hr class="mb-0 navbar-vertical-divider" />
                                    </div>
                                </div><!-- parent pages-->
                                <a class="nav-link dropdown-indicator" href="#email" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="email">
                                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-envelope-open"></span></span><span class="nav-link-text ps-1">Email</span></div>
                                </a>
                                <ul class="nav collapse" id="email">
                                    <li class="nav-item"><a class="nav-link" href="app/email/inbox.html" data-bs-toggle="" aria-expanded="false">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Inbox</span></div>
                                        </a><!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="app/email/email-detail.html" data-bs-toggle="" aria-expanded="false">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Email detail</span></div>
                                        </a><!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="app/email/compose.html" data-bs-toggle="" aria-expanded="false">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Compose</span></div>
                                        </a><!-- more inner pages-->
                                    </li>
                                </ul><!-- parent pages-->
                                <a class="nav-link dropdown-indicator" href="#events" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="events">
                                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-calendar-day"></span></span><span class="nav-link-text ps-1">Events</span></div>
                                </a>
                                <ul class="nav collapse" id="events">
                                    <li class="nav-item"><a class="nav-link" href="{{route('event.create')}}" data-bs-toggle="" aria-expanded="false">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Create an event</span></div>
                                        </a><!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="{{route('event.index')}}" data-bs-toggle="" aria-expanded="false">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Event list</span></div>
                                        </a><!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link dropdown-indicator collapsed" href="#category" data-bs-toggle="collapse" aria-expanded="false" aria-controls="e-commerce">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Event's Categories</span></div>
                                        </a><!-- more inner pages-->
                                        <ul class="nav collapse" id="category" style="">
                                            <li class="nav-item"><a class="nav-link" href="{{route('category.create')}}" data-bs-toggle="" aria-expanded="false">
                                                    <div class="d-flex align-items-center">
                                                        <span class="nav-link-text ps-1">Create  Category</span>
                                                    </div>
                                                </a><!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link" href="{{route('category.index')}}" data-bs-toggle="" aria-expanded="false">
                                                    <div class="d-flex align-items-center">
                                                        <span class="nav-link-text ps-1"> Categories Listing</span>
                                                    </div>
                                                </a><!-- more inner pages-->
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item"><a class="nav-link dropdown-indicator collapsed" href="#place" data-bs-toggle="collapse" aria-expanded="false" aria-controls="e-commerce">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Event's Places</span></div>
                                        </a><!-- more inner pages-->
                                        <ul class="nav collapse" id="place" style="">
                                            <li class="nav-item"><a class="nav-link" href="{{route('place.create')}}" data-bs-toggle="" aria-expanded="false">
                                                    <div class="d-flex align-items-center">
                                                        <span class="nav-link-text ps-1">Create  The Venue</span>
                                                    </div>
                                                </a><!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link" href="{{route('place.index')}}" data-bs-toggle="" aria-expanded="false">
                                                    <div class="d-flex align-items-center">
                                                        <span class="nav-link-text ps-1"> Places Listing</span>
                                                    </div>
                                                </a><!-- more inner pages-->
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <a class="nav-link dropdown-indicator" href="#ticket" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="email">
                                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-ticket-alt"></span></span><span class="nav-link-text ps-1">Tickets</span></div>
                                </a>
                                <ul class="nav collapse" id="ticket">
                                    <li class="nav-item"><a class="nav-link" href="{{route('ticket.create')}}" data-bs-toggle="" aria-expanded="false">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Create Ticket</span></div>
                                        </a><!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="{{route('ticket.index')}}" data-bs-toggle="" aria-expanded="false">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Tickets List</span></div>
                                        </a><!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link dropdown-indicator collapsed" href="#item" data-bs-toggle="collapse" aria-expanded="false" aria-controls="e-commerce">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Ticket Items</span></div>
                                        </a><!-- more inner pages-->
                                        <ul class="nav collapse" id="item" style="">
                                            <li class="nav-item"><a class="nav-link" href="{{route('item.create')}}" data-bs-toggle="" aria-expanded="false">
                                                    <div class="d-flex align-items-center">
                                                        <span class="nav-link-text ps-1">Create </span>
                                                    </div>
                                                </a><!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link" href="{{route('item.index')}}" data-bs-toggle="" aria-expanded="false">
                                                    <div class="d-flex align-items-center">
                                                        <span class="nav-link-text ps-1">Listing</span>
                                                    </div>
                                                </a><!-- more inner pages-->
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item"><a class="nav-link dropdown-indicator collapsed" href="#types" data-bs-toggle="collapse" aria-expanded="false" aria-controls="e-commerce">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Ticket Types</span></div>
                                        </a><!-- more inner pages-->
                                        <ul class="nav collapse" id="types" style="">
                                            <li class="nav-item"><a class="nav-link dropdown-indicator collapsed" href="#first_type" data-bs-toggle="collapse" aria-expanded="false" aria-controls="e-commerce">
                                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Ticket First Type</span></div>
                                                </a><!-- more inner pages-->
                                                <ul class="nav collapse" id="first_type" style="">
                                                    <li class="nav-item"><a class="nav-link" href="{{route('type.create')}}" data-bs-toggle="" aria-expanded="false">
                                                            <div class="d-flex align-items-center">
                                                                <span class="nav-link-text ps-1">Create </span>
                                                            </div>
                                                        </a><!-- more inner pages-->
                                                    </li>
                                                    <li class="nav-item"><a class="nav-link" href="{{route('type.index')}}" data-bs-toggle="" aria-expanded="false">
                                                            <div class="d-flex align-items-center">
                                                                <span class="nav-link-text ps-1"> Listing</span>
                                                            </div>
                                                        </a><!-- more inner pages-->
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="nav-item"><a class="nav-link dropdown-indicator collapsed" href="#second_type" data-bs-toggle="collapse" aria-expanded="false" aria-controls="e-commerce">
                                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Ticket Second Type</span></div>
                                                </a><!-- more inner pages-->
                                                <ul class="nav collapse" id="second_type" style="">
                                                    <li class="nav-item"><a class="nav-link" href="{{route('other_type.create')}}" data-bs-toggle="" aria-expanded="false">
                                                            <div class="d-flex align-items-center">
                                                                <span class="nav-link-text ps-1">Create </span>
                                                            </div>
                                                        </a><!-- more inner pages-->
                                                    </li>
                                                    <li class="nav-item"><a class="nav-link" href="{{route('other_type.index')}}" data-bs-toggle="" aria-expanded="false">
                                                            <div class="d-flex align-items-center">
                                                                <span class="nav-link-text ps-1"> Listing</span>
                                                            </div>
                                                        </a><!-- more inner pages-->
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul><!-- parent pages-->

                                <a class="nav-link dropdown-indicator" href="#user" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="user">
                                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-user"></span></span><span class="nav-link-text ps-1">User management</span></div>
                                </a>
                                <ul class="nav collapse" id="user">
                                    <li class="nav-item"><a class="nav-link" href="{{route('users.index')}}" data-bs-toggle="" aria-expanded="false">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Users Listing</span></div>
                                        </a><!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link dropdown-indicator collapsed" href="#product" data-bs-toggle="collapse" aria-expanded="false" aria-controls="e-commerce">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Speakers</span></div>
                                        </a><!-- more inner pages-->
                                        <ul class="nav collapse" id="product" style="">
                                            <li class="nav-item"><a class="nav-link" href="{{route('speaker.create')}}" data-bs-toggle="" aria-expanded="false">
                                                    <div class="d-flex align-items-center">
                                                        <span class="nav-link-text ps-1">Create Speaker</span>
                                                    </div>
                                                </a><!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link" href="{{route('speaker.index')}}" data-bs-toggle="" aria-expanded="false">
                                                    <div class="d-flex align-items-center">
                                                        <span class="nav-link-text ps-1">Speakers Listing</span>
                                                    </div>
                                                </a><!-- more inner pages-->
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item"><a class="nav-link dropdown-indicator collapsed" href="#attender" data-bs-toggle="collapse" aria-expanded="false" aria-controls="e-commerce">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Attenders</span></div>
                                        </a><!-- more inner pages-->
                                        <ul class="nav collapse" id="attender" style="">
                                            <li class="nav-item"><a class="nav-link" href="{{route('attender.create')}}" data-bs-toggle="" aria-expanded="false">
                                                    <div class="d-flex align-items-center">
                                                        <span class="nav-link-text ps-1">Create Attender</span>
                                                    </div>
                                                </a><!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link" href="{{route('attender.index')}}" data-bs-toggle="" aria-expanded="false">
                                                    <div class="d-flex align-items-center">
                                                        <span class="nav-link-text ps-1">Attender Listing</span>
                                                    </div>
                                                </a><!-- more inner pages-->
                                            </li>
                                        </ul>
                                    </li>
                                </ul>

                                <a class="nav-link dropdown-indicator" href="#sponsors_partners" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="events">
                                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="far fa-handshake"></span></span><span class="nav-link-text ps-1">Sponsors and Partners</span></div>
                                </a>
                                <ul class="nav collapse" id="sponsors_partners">
                                    <li class="nav-item"><a class="nav-link dropdown-indicator collapsed" href="#sponsor" data-bs-toggle="collapse" aria-expanded="false" aria-controls="e-commerce">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Event's Sponsors</span></div>
                                        </a><!-- more inner pages-->
                                        <ul class="nav collapse" id="sponsor" style="">
                                            <li class="nav-item"><a class="nav-link" href="{{route('sponsor.create')}}" data-bs-toggle="" aria-expanded="false">
                                                    <div class="d-flex align-items-center">
                                                        <span class="nav-link-text ps-1">Create  Sponsor</span>
                                                    </div>
                                                </a><!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link" href="{{route('sponsor.index')}}" data-bs-toggle="" aria-expanded="false">
                                                    <div class="d-flex align-items-center">
                                                        <span class="nav-link-text ps-1"> Sponsors Listing</span>
                                                    </div>
                                                </a><!-- more inner pages-->
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item"><a class="nav-link dropdown-indicator collapsed" href="#partner" data-bs-toggle="collapse" aria-expanded="false" aria-controls="e-commerce">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Event's Media Partners</span></div>
                                        </a><!-- more inner pages-->
                                        <ul class="nav collapse" id="partner" style="">
                                            <li class="nav-item"><a class="nav-link" href="{{route('partner.create')}}" data-bs-toggle="" aria-expanded="false">
                                                    <div class="d-flex align-items-center">
                                                        <span class="nav-link-text ps-1">Create  Media Partner</span>
                                                    </div>
                                                </a><!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link" href="{{route('partner.index')}}" data-bs-toggle="" aria-expanded="false">
                                                    <div class="d-flex align-items-center">
                                                        <span class="nav-link-text ps-1"> Media Partners Listing</span>
                                                    </div>
                                                </a><!-- more inner pages-->
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <a class="nav-link dropdown-indicator" href="#vacancy" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="email">
                                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-toolbox"></span></span><span class="nav-link-text ps-1">Vacancies</span></div>
                                </a>
                                <ul class="nav collapse" id="vacancy">
                                    <li class="nav-item"><a class="nav-link" href="{{route('vacancy.create')}}" data-bs-toggle="" aria-expanded="false">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Create</span></div>
                                        </a><!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="{{route('vacancy.index')}}" data-bs-toggle="" aria-expanded="false">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Listing</span></div>
                                        </a><!-- more inner pages-->
                                    </li>
                                </ul><!-- parent pages-->
                                <a class="nav-link dropdown-indicator" href="#news" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="email">
                                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="far fa-newspaper"></span></span><span class="nav-link-text ps-1">News</span></div>
                                </a>
                                <ul class="nav collapse" id="news">
                                    <li class="nav-item"><a class="nav-link" href="{{route('news.create')}}" data-bs-toggle="" aria-expanded="false">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Create</span></div>
                                        </a><!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="{{route('news.index')}}" data-bs-toggle="" aria-expanded="false">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Listing</span></div>
                                        </a><!-- more inner pages-->
                                    </li>
                                </ul><!-- parent pages-->
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <nav class="navbar navbar-light navbar-glass navbar-top navbar-expand-xl" style="display: none;">
                <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarStandard" aria-controls="navbarStandard" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
                <a class="navbar-brand me-1 me-sm-3" href="{{route('home_page')}}">
                    <div class="d-flex align-items-center"><img class="me-2" src="/assets/img/icons/spot-illustrations/keynotion-favicon.png" alt="" width="40" /><span class="font-sans-serif"></span></div>
                </a>
                <div class="collapse navbar-collapse scrollbar" id="navbarStandard">

                    <ul class="navbar-nav" data-top-nav-dropdowns="data-top-nav-dropdowns">

                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="pagess">Email</a>
                            <div class="dropdown-menu dropdown-caret dropdown-menu-card border-0 mt-0" aria-labelledby="pagess">
                                <div class="card navbar-card-pages shadow-none dark__bg-1000">
                                    <div class="card-body scrollbar max-h-dropdown"><img class="img-dropdown" src="/assets/img/icons/spot-illustrations/authentication-corner.png" width="130" alt="" />
                                        <div class="row">
                                            <div class="col-6 col-xxl-3">
                                                <div class="nav flex-column">
                                                    <a class="nav-link py-1 link-600 fw-medium" href="pages/authentication/simple/login.html">Inbox</a>
                                                    <a class="nav-link py-1 link-600 fw-medium" href="pages/authentication/card/login.html">Compose</a>
                                                    <a class="nav-link py-1 link-600 fw-medium" href="pages/authentication/split/login.html">Email detail</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="moduless">Events</a>
                            <div class="dropdown-menu dropdown-caret dropdown-menu-card border-0 mt-0" aria-labelledby="moduless">
                                <div class="card navbar-card-components shadow-none dark__bg-1000">
                                    <div class="card-body scrollbar max-h-dropdown"><img class="img-dropdown" src="/assets/img/icons/spot-illustrations/authentication-corner.png" width="130" alt="" />
                                        <div class="row">
                                            <div class="col-6 col-xxl-3">
                                                <div class="nav flex-column">
                                                   <a class="nav-link py-1 link-600 fw-medium" href="modules/components/accordion.html">Accordion</a>
                                                    <a class="nav-link py-1 link-600 fw-medium" href="modules/components/collapse.html">Collapse</a>
                                                    <a class="nav-link py-1 link-600 fw-medium" href="modules/components/navs-and-tabs/tabs.html">Tabs</a>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="documentations">User management</a>
                            <div class="dropdown-menu dropdown-caret dropdown-menu-card border-0 mt-0" aria-labelledby="documentations">
                                <div class="bg-white dark__bg-1000 rounded-3 py-2">
                                    <a class="dropdown-item link-600 fw-medium" href="{{route('users.index')}}">Users Listing</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">
                    <li class="nav-item">
                        <div class="theme-control-toggle fa-icon-wait px-2"><input class="form-check-input ms-0 theme-control-toggle-input" id="themeControlToggle" type="checkbox" data-theme-control="theme" value="dark" /><label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch to light theme"><span class="fas fa-sun fs-0"></span></label><label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch to dark theme"><span class="fas fa-moon fs-0"></span></label></div>
                    </li>
                    <li class="nav-item d-none d-sm-block">
                        <a class="nav-link px-0 notification-indicator notification-indicator-warning notification-indicator-fill fa-icon-wait" href="app/e-commerce/shopping-cart.html"><span class="fas fa-shopping-cart" data-fa-transform="shrink-7" style="font-size: 33px;"></span><span class="notification-indicator-number">1</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link notification-indicator notification-indicator-primary px-0 fa-icon-wait" id="navbarDropdownNotification" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-hide-on-body-scroll="data-hide-on-body-scroll"><span class="fas fa-bell" data-fa-transform="shrink-6" style="font-size: 33px;"></span></a>
                        <div class="dropdown-menu dropdown-caret dropdown-caret dropdown-menu-end dropdown-menu-card dropdown-menu-notification dropdown-caret-bg" aria-labelledby="navbarDropdownNotification">
                            <div class="card card-notification shadow-none">
                                <div class="card-header">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <h6 class="card-header-title mb-0">Notifications</h6>
                                        </div>
                                        <div class="col-auto ps-0 ps-sm-3"><a class="card-link fw-normal" href="#">Mark all as read</a></div>
                                    </div>
                                </div>
                                <div class="scrollbar-overlay" style="max-height:19rem">
                                    <div class="list-group list-group-flush fw-normal fs--1">
                                        <div class="list-group-title border-bottom">NEW</div>
                                        <div class="list-group-item">
                                            <a class="notification notification-flush notification-unread" href="#!">
                                                <div class="notification-avatar">
                                                    <div class="avatar avatar-2xl me-3">
                                                        <img class="rounded-circle" src="/assets/img/team/admin.png" alt="" />
                                                    </div>
                                                </div>
                                                <div class="notification-body">
                                                    <p class="mb-1"><strong>Emma Watson</strong> replied to your comment : "Hello world 😍"</p>
                                                    <span class="notification-time"><span class="me-2" role="img" aria-label="Emoji">💬</span>Just now</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="list-group-item">
                                            <a class="notification notification-flush notification-unread" href="#!">
                                                <div class="notification-avatar">
                                                    <div class="avatar avatar-2xl me-3">
                                                        <div class="avatar-name rounded-circle"><span>AB</span></div>
                                                    </div>
                                                </div>
                                                <div class="notification-body">
                                                    <p class="mb-1"><strong>Albert Brooks</strong> reacted to <strong>Mia Khalifa's</strong> status</p>
                                                    <span class="notification-time"><span class="me-2 fab fa-gratipay text-danger"></span>9hr</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="list-group-title border-bottom">EARLIER</div>
                                        <div class="list-group-item">
                                            <a class="notification notification-flush" href="#!">
                                                <div class="notification-avatar">
                                                    <div class="avatar avatar-2xl me-3">
                                                        <img class="rounded-circle" src="/assets/img/icons/weather-sm.jpg" alt="" />
                                                    </div>
                                                </div>
                                                <div class="notification-body">
                                                    <p class="mb-1">The forecast today shows a low of 20&#8451; in California. See today's weather.</p>
                                                    <span class="notification-time"><span class="me-2" role="img" aria-label="Emoji">🌤️</span>1d</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="list-group-item">
                                            <a class="border-bottom-0 notification-unread  notification notification-flush" href="#!">
                                                <div class="notification-avatar">
                                                    <div class="avatar avatar-xl me-3">
                                                        <img class="rounded-circle" src="/assets/img/logos/oxford.png" alt="" />
                                                    </div>
                                                </div>
                                                <div class="notification-body">
                                                    <p class="mb-1"><strong>University of Oxford</strong> created an event : "Causal Inference Hilary 2019"</p>
                                                    <span class="notification-time"><span class="me-2" role="img" aria-label="Emoji">✌️</span>1w</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="list-group-item">
                                            <a class="border-bottom-0 notification notification-flush" href="#!">
                                                <div class="notification-avatar">
                                                    <div class="avatar avatar-xl me-3">
                                                        <img class="rounded-circle" src="/assets/img/team/10.jpg" alt="" />
                                                    </div>
                                                </div>
                                                <div class="notification-body">
                                                    <p class="mb-1"><strong>James Cameron</strong> invited to join the group: United Nations International Children's Fund</p>
                                                    <span class="notification-time"><span class="me-2" role="img" aria-label="Emoji">🙋‍</span>2d</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-center border-top"><a class="card-link d-block" href="app/social/notifications.html">View all</a></div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown px-1">
                        <a class="nav-link fa-icon-wait nine-dots p-1" id="navbarDropdownMenu" role="button" data-hide-on-body-scroll="data-hide-on-body-scroll" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="43" viewBox="0 0 16 16" fill="none">
                                <circle cx="2" cy="2" r="2" fill="#6C6E71"></circle>
                                <circle cx="2" cy="8" r="2" fill="#6C6E71"></circle>
                                <circle cx="2" cy="14" r="2" fill="#6C6E71"></circle>
                                <circle cx="8" cy="8" r="2" fill="#6C6E71"></circle>
                                <circle cx="8" cy="14" r="2" fill="#6C6E71"></circle>
                                <circle cx="14" cy="8" r="2" fill="#6C6E71"></circle>
                                <circle cx="14" cy="14" r="2" fill="#6C6E71"></circle>
                                <circle cx="8" cy="2" r="2" fill="#6C6E71"></circle>
                                <circle cx="14" cy="2" r="2" fill="#6C6E71"></circle>
                            </svg></a>
                        <div class="dropdown-menu dropdown-caret dropdown-caret dropdown-menu-end dropdown-menu-card dropdown-caret-bg" aria-labelledby="navbarDropdownMenu">
                            <div class="card shadow-none">
                                <div class="scrollbar-overlay nine-dots-dropdown">
                                    <div class="card-body px-3">
                                        <div class="row text-center gx-0 gy-0">
                                            <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="pages/user/profile.html" target="_blank">
                                                    <div class="avatar avatar-2xl"> <img class="rounded-circle" src="/assets/img/team/3.jpg" alt="" /></div>
                                                    <p class="mb-0 fw-medium text-800 text-truncate fs--2">Account</p>
                                                </a></div>
                                            <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="https://themewagon.com/" target="_blank"><img class="rounded" src="/assets/img/nav-icons/themewagon.png" alt="" width="40" height="40" />
                                                    <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Themewagon</p>
                                                </a></div>
                                            <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="https://mailbluster.com/" target="_blank"><img class="rounded" src="/assets/img/nav-icons/mailbluster.png" alt="" width="40" height="40" />
                                                    <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Mailbluster</p>
                                                </a></div>
                                            <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="#!" target="_blank"><img class="rounded" src="/assets/img/nav-icons/google.png" alt="" width="40" height="40" />
                                                    <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Google</p>
                                                </a></div>
                                            <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="#!" target="_blank"><img class="rounded" src="/assets/img/nav-icons/spotify.png" alt="" width="40" height="40" />
                                                    <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Spotify</p>
                                                </a></div>
                                            <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="#!" target="_blank"><img class="rounded" src="/assets/img/nav-icons/steam.png" alt="" width="40" height="40" />
                                                    <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Steam</p>
                                                </a></div>
                                            <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="#!" target="_blank"><img class="rounded" src="/assets/img/nav-icons/github-light.png" alt="" width="40" height="40" />
                                                    <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Github</p>
                                                </a></div>
                                            <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="#!" target="_blank"><img class="rounded" src="/assets/img/nav-icons/discord.png" alt="" width="40" height="40" />
                                                    <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Discord</p>
                                                </a></div>
                                            <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="#!" target="_blank"><img class="rounded" src="/assets/img/nav-icons/xbox.png" alt="" width="40" height="40" />
                                                    <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">xbox</p>
                                                </a></div>
                                            <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="#!" target="_blank"><img class="rounded" src="/assets/img/nav-icons/trello.png" alt="" width="40" height="40" />
                                                    <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Kanban</p>
                                                </a></div>
                                            <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="#!" target="_blank"><img class="rounded" src="/assets/img/nav-icons/hp.png" alt="" width="40" height="40" />
                                                    <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Hp</p>
                                                </a></div>
                                            <div class="col-12">
                                                <hr class="my-3 mx-n3 bg-200" />
                                            </div>
                                            <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="#!" target="_blank"><img class="rounded" src="/assets/img/nav-icons/linkedin.png" alt="" width="40" height="40" />
                                                    <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Linkedin</p>
                                                </a></div>
                                            <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="#!" target="_blank"><img class="rounded" src="/assets/img/nav-icons/twitter.png" alt="" width="40" height="40" />
                                                    <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Twitter</p>
                                                </a></div>
                                            <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="#!" target="_blank"><img class="rounded" src="/assets/img/nav-icons/facebook.png" alt="" width="40" height="40" />
                                                    <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Facebook</p>
                                                </a></div>
                                            <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="#!" target="_blank"><img class="rounded" src="/assets/img/nav-icons/instagram.png" alt="" width="40" height="40" />
                                                    <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Instagram</p>
                                                </a></div>
                                            <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="#!" target="_blank"><img class="rounded" src="/assets/img/nav-icons/pinterest.png" alt="" width="40" height="40" />
                                                    <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Pinterest</p>
                                                </a></div>
                                            <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="#!" target="_blank"><img class="rounded" src="/assets/img/nav-icons/slack.png" alt="" width="40" height="40" />
                                                    <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Slack</p>
                                                </a></div>
                                            <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="#!" target="_blank"><img class="rounded" src="/assets/img/nav-icons/deviantart.png" alt="" width="40" height="40" />
                                                    <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Deviantart</p>
                                                </a></div>
                                            <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="app/events/event-detail.html" target="_blank">
                                                    <div class="avatar avatar-2xl">
                                                        <div class="avatar-name rounded-circle bg-soft-primary text-primary"><span class="fs-2">E</span></div>
                                                    </div>
                                                    <p class="mb-0 fw-medium text-800 text-truncate fs--2">Events</p>
                                                </a></div>
                                            <div class="col-12"><a class="btn btn-outline-primary btn-sm mt-4" href="#!">Show more</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown"><a class="nav-link pe-0 ps-2" id="navbarDropdownUser" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="avatar avatar-xl">
                                <img class="rounded-circle" src="/assets/img/team/admin.png" alt="" />
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-caret dropdown-caret dropdown-menu-end py-0" aria-labelledby="navbarDropdownUser">
                            <div class="bg-white dark__bg-1000 rounded-2 py-2">
                                <a class="dropdown-item fw-bold text-warning" href="#!"><span class="fas fa-crown me-1"></span><span>Go Pro</span></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#!">Set status</a>
                                <a class="dropdown-item" href="pages/user/profile.html">Profile &amp; account</a>
                                <a class="dropdown-item" href="#!">Feedback</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="pages/user/settings.html">Settings</a>
                                <a class="dropdown-item" href="pages/authentication/card/logout.html">Logout</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="content">
                <nav class="navbar navbar-light navbar-glass navbar-top navbar-expand" style="display: none;">
                    <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
                    <a class="navbar-brand me-1 me-sm-3" href="{{route('home_page')}}">
                        <div class="d-flex align-items-center"><img class="me-2" src="/assets/img/icons/spot-illustrations/keynotion-favicon.png" alt="" width="40" /><span class="font-sans-serif"></span></div>
                    </a>

                    <ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">
                        <li class="nav-item">
                            <div class="theme-control-toggle fa-icon-wait px-2"><input class="form-check-input ms-0 theme-control-toggle-input" id="themeControlToggle" type="checkbox" data-theme-control="theme" value="dark" /><label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch to light theme"><span class="fas fa-sun fs-0"></span></label><label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch to dark theme"><span class="fas fa-moon fs-0"></span></label></div>
                        </li>
                        <li class="nav-item dropdown"><a class="nav-link pe-0 ps-2" id="navbarDropdownUser" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="avatar avatar-xl">
                                    <img class="rounded-circle" src="/assets/img/team/admin.png" alt="" />
                                </div>
                            </a>

                        </li>
                    </ul>
                </nav>
                <nav class="navbar navbar-light navbar-glass navbar-top navbar-expand-lg" style="display: none;" data-move-target="#navbarVerticalNav" data-navbar-top="combo">
                    <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
                    <a class="navbar-brand me-1 me-sm-3" href="{{route('home_page')}}">
                        <div class="d-flex align-items-center"><img class="me-2" src="/assets/img/icons/spot-illustrations/keynotion-favicon.png" alt="" width="40" /><span class="font-sans-serif"></span></div>
                    </a>
                    <div class="collapse navbar-collapse scrollbar" id="navbarStandard">
                        <ul class="navbar-nav" data-top-nav-dropdowns="data-top-nav-dropdowns">
                            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="dashboards">Dashboard</a>
                                <div class="dropdown-menu dropdown-caret dropdown-menu-card border-0 mt-0" aria-labelledby="dashboards">
                                    <div class="bg-white dark__bg-1000 rounded-3 py-2"><a class="dropdown-item link-600 fw-medium" href="index.html">Default</a><a class="dropdown-item link-600 fw-medium" href="dashboard/analytics.html">Analytics</a><a class="dropdown-item link-600 fw-medium" href="dashboard/crm.html">CRM</a><a class="dropdown-item link-600 fw-medium" href="dashboard/e-commerce.html">E commerce</a><a class="dropdown-item link-600 fw-medium" href="dashboard/project-management.html">Management</a><a class="dropdown-item link-600 fw-medium" href="dashboard/saas.html">SaaS</a></div>
                                </div>
                            </li>
                            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="apps">App</a>
                                <div class="dropdown-menu dropdown-caret dropdown-menu-card border-0 mt-0" aria-labelledby="apps">
                                    <div class="card navbar-card-app shadow-none dark__bg-1000">
                                        <div class="card-body scrollbar max-h-dropdown"><img class="img-dropdown" src="/assets/img/icons/spot-illustrations/authentication-corner.png" width="130" alt="" />
                                            <div class="row">
                                                <div class="col-6 col-md-5">
                                                    <div class="nav flex-column"><a class="nav-link py-1 link-600 fw-medium" href="app/calendar.html">Calendar</a><a class="nav-link py-1 link-600 fw-medium" href="app/chat.html">Chat</a><a class="nav-link py-1 link-600 fw-medium" href="app/kanban.html">Kanban</a>
                                                        <p class="nav-link text-700 mb-0 fw-bold">Email</p><a class="nav-link py-1 link-600 fw-medium" href="app/email/inbox.html">Inbox</a><a class="nav-link py-1 link-600 fw-medium" href="app/email/email-detail.html">Email detail</a><a class="nav-link py-1 link-600 fw-medium" href="app/email/compose.html">Compose</a>
                                                        <p class="nav-link text-700 mb-0 fw-bold">Events</p><a class="nav-link py-1 link-600 fw-medium" href="app/events/create-an-event.html">Create an event</a><a class="nav-link py-1 link-600 fw-medium" href="app/events/event-detail.html">Event detail</a><a class="nav-link py-1 link-600 fw-medium" href="app/events/event-list.html">Event list</a>
                                                        <p class="nav-link text-700 mb-0 fw-bold">Social</p><a class="nav-link py-1 link-600 fw-medium" href="app/social/feed.html">Feed</a><a class="nav-link py-1 link-600 fw-medium" href="app/social/activity-log.html">Activity log</a><a class="nav-link py-1 link-600 fw-medium" href="app/social/notifications.html">Notifications</a><a class="nav-link py-1 link-600 fw-medium" href="app/social/followers.html">Followers</a>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-4">
                                                    <div class="nav flex-column">
                                                        <p class="nav-link text-700 mb-0 fw-bold">E-Commerce</p><a class="nav-link py-1 link-600 fw-medium" href="app/e-commerce/product/product-list.html">Product list</a><a class="nav-link py-1 link-600 fw-medium" href="app/e-commerce/product/product-grid.html">Product grid</a><a class="nav-link py-1 link-600 fw-medium" href="app/e-commerce/product/product-details.html">Product details</a><a class="nav-link py-1 link-600 fw-medium" href="app/e-commerce/orders/order-list.html">Order list</a><a class="nav-link py-1 link-600 fw-medium" href="app/e-commerce/orders/order-details.html">Order details</a><a class="nav-link py-1 link-600 fw-medium" href="app/e-commerce/customers.html">Customers</a><a class="nav-link py-1 link-600 fw-medium" href="app/e-commerce/customer-details.html">Customer details</a><a class="nav-link py-1 link-600 fw-medium" href="app/e-commerce/shopping-cart.html">Shopping cart</a><a class="nav-link py-1 link-600 fw-medium" href="app/e-commerce/checkout.html">Checkout</a><a class="nav-link py-1 link-600 fw-medium" href="app/e-commerce/billing.html">Billing</a><a class="nav-link py-1 link-600 fw-medium" href="app/e-commerce/invoice.html">Invoice</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="pagess">Pages</a>
                                <div class="dropdown-menu dropdown-caret dropdown-menu-card border-0 mt-0" aria-labelledby="pagess">
                                    <div class="card navbar-card-pages shadow-none dark__bg-1000">
                                        <div class="card-body scrollbar max-h-dropdown"><img class="img-dropdown" src="/assets/img/icons/spot-illustrations/authentication-corner.png" width="130" alt="" />
                                            <div class="row">
                                                <div class="col-6 col-xxl-3">
                                                    <div class="nav flex-column">
                                                        <p class="nav-link text-700 mb-0 fw-bold">Simple Auth</p><a class="nav-link py-1 link-600 fw-medium" href="pages/authentication/simple/login.html">Login</a><a class="nav-link py-1 link-600 fw-medium" href="pages/authentication/simple/logout.html">Logout</a><a class="nav-link py-1 link-600 fw-medium" href="pages/authentication/simple/register.html">Register</a><a class="nav-link py-1 link-600 fw-medium" href="pages/authentication/simple/forgot-password.html">Forgot password</a><a class="nav-link py-1 link-600 fw-medium" href="pages/authentication/simple/confirm-mail.html">Confirm mail</a><a class="nav-link py-1 link-600 fw-medium" href="pages/authentication/simple/reset-password.html">Reset password</a><a class="nav-link py-1 link-600 fw-medium" href="pages/authentication/simple/lock-screen.html">Lock screen</a>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-xxl-3">
                                                    <div class="nav flex-column">
                                                        <p class="nav-link text-700 mb-0 fw-bold">Card Auth</p><a class="nav-link py-1 link-600 fw-medium" href="pages/authentication/card/login.html">Login</a><a class="nav-link py-1 link-600 fw-medium" href="pages/authentication/card/logout.html">Logout</a><a class="nav-link py-1 link-600 fw-medium" href="pages/authentication/card/register.html">Register</a><a class="nav-link py-1 link-600 fw-medium" href="pages/authentication/card/forgot-password.html">Forgot password</a><a class="nav-link py-1 link-600 fw-medium" href="pages/authentication/card/confirm-mail.html">Confirm mail</a><a class="nav-link py-1 link-600 fw-medium" href="pages/authentication/card/reset-password.html">Reset password</a><a class="nav-link py-1 link-600 fw-medium" href="pages/authentication/card/lock-screen.html">Lock screen</a>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-xxl-3">
                                                    <div class="nav flex-column">
                                                        <p class="nav-link text-700 mb-0 fw-bold">Split Auth</p><a class="nav-link py-1 link-600 fw-medium" href="pages/authentication/split/login.html">Login</a><a class="nav-link py-1 link-600 fw-medium" href="pages/authentication/split/logout.html">Logout</a><a class="nav-link py-1 link-600 fw-medium" href="pages/authentication/split/register.html">Register</a><a class="nav-link py-1 link-600 fw-medium" href="pages/authentication/split/forgot-password.html">Forgot password</a><a class="nav-link py-1 link-600 fw-medium" href="pages/authentication/split/confirm-mail.html">Confirm mail</a><a class="nav-link py-1 link-600 fw-medium" href="pages/authentication/split/reset-password.html">Reset password</a><a class="nav-link py-1 link-600 fw-medium" href="pages/authentication/split/lock-screen.html">Lock screen</a>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-xxl-3">
                                                    <div class="nav flex-column">
                                                        <p class="nav-link text-700 mb-0 fw-bold">Other Auth</p><a class="nav-link py-1 link-600 fw-medium" href="pages/authentication/wizard.html">Wizard</a><a class="nav-link py-1 link-600 fw-medium" href="#authentication-modal" data-bs-toggle="modal">Modal</a>
                                                        <p class="nav-link text-700 mb-0 fw-bold">Miscellaneous</p><a class="nav-link py-1 link-600 fw-medium" href="pages/miscellaneous/associations.html">Associations</a><a class="nav-link py-1 link-600 fw-medium" href="pages/miscellaneous/invite-people.html">Invite people</a><a class="nav-link py-1 link-600 fw-medium" href="pages/miscellaneous/privacy-policy.html">Privacy policy</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6 col-xxl-3">
                                                    <div class="nav flex-column">
                                                        <p class="nav-link text-700 mb-0 fw-bold">User</p><a class="nav-link py-1 link-600 fw-medium" href="pages/user/profile.html">Profile</a><a class="nav-link py-1 link-600 fw-medium" href="pages/user/settings.html">Settings</a>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-xxl-3">
                                                    <div class="nav flex-column">
                                                        <p class="nav-link text-700 mb-0 fw-bold">Pricing</p><a class="nav-link py-1 link-600 fw-medium" href="pages/pricing/pricing-default.html">Pricing default</a><a class="nav-link py-1 link-600 fw-medium" href="pages/pricing/pricing-alt.html">Pricing alt</a>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-xxl-3">
                                                    <div class="nav flex-column">
                                                        <p class="nav-link text-700 mb-0 fw-bold">Errors</p><a class="nav-link py-1 link-600 fw-medium" href="pages/errors/404.html">404</a><a class="nav-link py-1 link-600 fw-medium" href="pages/errors/500.html">500</a>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-xxl-3">
                                                    <div class="nav flex-column">
                                                        <p class="nav-link text-700 mb-0 fw-bold">Others</p><a class="nav-link py-1 link-600 fw-medium" href="pages/starter.html">Starter</a><a class="nav-link py-1 link-600 fw-medium" href="pages/landing.html">Landing</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="moduless">Modules</a>
                                <div class="dropdown-menu dropdown-caret dropdown-menu-card border-0 mt-0" aria-labelledby="moduless">
                                    <div class="card navbar-card-components shadow-none dark__bg-1000">
                                        <div class="card-body scrollbar max-h-dropdown"><img class="img-dropdown" src="/assets/img/icons/spot-illustrations/authentication-corner.png" width="130" alt="" />
                                            <div class="row">
                                                <div class="col-6 col-xxl-3">
                                                    <div class="nav flex-column">
                                                        <p class="nav-link text-700 mb-0 fw-bold">Components</p><a class="nav-link py-1 link-600 fw-medium" href="modules/components/accordion.html">Accordion</a><a class="nav-link py-1 link-600 fw-medium" href="modules/components/alerts.html">Alerts</a><a class="nav-link py-1 link-600 fw-medium" href="modules/components/anchor.html">Anchor</a><a class="nav-link py-1 link-600 fw-medium" href="modules/components/animated-icons.html">Animated icons</a><a class="nav-link py-1 link-600 fw-medium" href="modules/components/background.html">Background</a><a class="nav-link py-1 link-600 fw-medium" href="modules/components/badges.html">Badges</a><a class="nav-link py-1 link-600 fw-medium" href="modules/components/breadcrumbs.html">Breadcrumbs</a><a class="nav-link py-1 link-600 fw-medium" href="modules/components/buttons.html">Buttons</a><a class="nav-link py-1 link-600 fw-medium" href="modules/components/calendar.html">Calendar</a><a class="nav-link py-1 link-600 fw-medium" href="modules/components/cards.html">Cards</a><a class="nav-link py-1 link-600 fw-medium" href="modules/components/carousel/bootstrap.html">Bootstrap carousel</a><a class="nav-link py-1 link-600 fw-medium" href="modules/components/carousel/swiper.html">Swiper</a>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-xxl-3">
                                                    <div class="nav flex-column mt-md-4 pt-md-1"><a class="nav-link py-1 link-600 fw-medium" href="modules/components/collapse.html">Collapse</a><a class="nav-link py-1 link-600 fw-medium" href="modules/components/cookie-notice.html">Cookie notice</a><a class="nav-link py-1 link-600 fw-medium" href="modules/components/countup.html">Countup</a><a class="nav-link py-1 link-600 fw-medium" href="modules/components/draggable.html">Draggable</a><a class="nav-link py-1 link-600 fw-medium" href="modules/components/dropdowns.html">Dropdowns</a><a class="nav-link py-1 link-600 fw-medium" href="modules/components/list-group.html">List group</a><a class="nav-link py-1 link-600 fw-medium" href="modules/components/modals.html">Modals</a><a class="nav-link py-1 link-600 fw-medium" href="modules/components/navs-and-tabs/navs.html">Navs</a><a class="nav-link py-1 link-600 fw-medium" href="modules/components/navs-and-tabs/navbar.html">Navbar</a><a class="nav-link py-1 link-600 fw-medium" href="modules/components/navs-and-tabs/vertical-navbar.html">Vertical navbar</a><a class="nav-link py-1 link-600 fw-medium" href="modules/components/navs-and-tabs/top-navbar.html">Top navbar</a><a class="nav-link py-1 link-600 fw-medium" href="modules/components/navs-and-tabs/combo-navbar.html">Combo navbar</a></div>
                                                </div>
                                                <div class="col-6 col-xxl-3">
                                                    <div class="nav flex-column mt-xxl-4 pt-xxl-1"><a class="nav-link py-1 link-600 fw-medium" href="modules/components/navs-and-tabs/tabs.html">Tabs</a><a class="nav-link py-1 link-600 fw-medium" href="modules/components/offcanvas.html">Offcanvas</a><a class="nav-link py-1 link-600 fw-medium" href="modules/components/pictures/avatar.html">Avatar</a><a class="nav-link py-1 link-600 fw-medium" href="modules/components/pictures/images.html">Images</a><a class="nav-link py-1 link-600 fw-medium" href="modules/components/pictures/figures.html">Figures</a><a class="nav-link py-1 link-600 fw-medium" href="modules/components/pictures/hoverbox.html">Hoverbox</a><a class="nav-link py-1 link-600 fw-medium" href="modules/components/pictures/lightbox.html">Lightbox</a><a class="nav-link py-1 link-600 fw-medium" href="modules/components/progress-bar.html">Progress bar</a><a class="nav-link py-1 link-600 fw-medium" href="modules/components/placeholder.html">Placeholder</a><a class="nav-link py-1 link-600 fw-medium" href="modules/components/pagination.html">Pagination</a><a class="nav-link py-1 link-600 fw-medium" href="modules/components/popovers.html">Popovers</a><a class="nav-link py-1 link-600 fw-medium" href="modules/components/scrollspy.html">Scrollspy</a></div>
                                                </div>
                                                <div class="col-6 col-xxl-3">
                                                    <div class="nav flex-column mt-xxl-4 pt-xxl-1"><a class="nav-link py-1 link-600 fw-medium" href="modules/components/search.html">Search</a><a class="nav-link py-1 link-600 fw-medium" href="modules/components/spinners.html">Spinners</a><a class="nav-link py-1 link-600 fw-medium" href="modules/components/timeline.html">Timeline<span class="badge rounded-pill ms-2 badge-soft-success">New</span></a><a class="nav-link py-1 link-600 fw-medium" href="modules/components/toasts.html">Toasts</a><a class="nav-link py-1 link-600 fw-medium" href="modules/components/tooltips.html">Tooltips</a><a class="nav-link py-1 link-600 fw-medium" href="modules/components/treeview.html">Treeview</a><a class="nav-link py-1 link-600 fw-medium" href="modules/components/typed-text.html">Typed text</a><a class="nav-link py-1 link-600 fw-medium" href="modules/components/videos/embed.html">Embed</a><a class="nav-link py-1 link-600 fw-medium" href="modules/components/videos/plyr.html">Plyr</a></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6 col-xxl-3">
                                                    <div class="nav flex-column">
                                                        <p class="nav-link text-700 mb-0 fw-bold">Forms</p><a class="nav-link py-1 link-600 fw-medium" href="modules/forms/basic/form-control.html">Form control</a><a class="nav-link py-1 link-600 fw-medium" href="modules/forms/basic/input-group.html">Input group</a><a class="nav-link py-1 link-600 fw-medium" href="modules/forms/basic/select.html">Select</a><a class="nav-link py-1 link-600 fw-medium" href="modules/forms/basic/checks.html">Checks</a><a class="nav-link py-1 link-600 fw-medium" href="modules/forms/basic/range.html">Range</a><a class="nav-link py-1 link-600 fw-medium" href="modules/forms/basic/layout.html">Layout</a><a class="nav-link py-1 link-600 fw-medium" href="modules/forms/advance/advance-select.html">Advance select</a><a class="nav-link py-1 link-600 fw-medium" href="modules/forms/advance/date-picker.html">Date picker</a><a class="nav-link py-1 link-600 fw-medium" href="modules/forms/advance/editor.html">Editor</a><a class="nav-link py-1 link-600 fw-medium" href="modules/forms/advance/emoji-button.html">Emoji button</a><a class="nav-link py-1 link-600 fw-medium" href="modules/forms/advance/file-uploader.html">File uploader</a><a class="nav-link py-1 link-600 fw-medium" href="modules/forms/advance/rating.html">Rating</a><a class="nav-link py-1 link-600 fw-medium" href="modules/forms/floating-labels.html">Floating labels</a><a class="nav-link py-1 link-600 fw-medium" href="modules/forms/wizard.html">Wizard</a><a class="nav-link py-1 link-600 fw-medium" href="modules/forms/validation.html">Validation</a>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-xxl-3">
                                                    <div class="nav flex-column">
                                                        <p class="nav-link text-700 mb-0 fw-bold">Tables</p><a class="nav-link py-1 link-600 fw-medium" href="modules/tables/basic-tables.html">Basic tables</a><a class="nav-link py-1 link-600 fw-medium" href="modules/tables/advance-tables.html">Advance tables</a><a class="nav-link py-1 link-600 fw-medium" href="modules/tables/bulk-select.html">Bulk select</a>
                                                        <p class="nav-link text-700 mb-0 fw-bold">Charts</p><a class="nav-link py-1 link-600 fw-medium" href="modules/charts/chartjs.html">Chartjs</a>
                                                        <p class="nav-link text-700 mb-0 fw-bold">ECharts</p><a class="nav-link py-1 link-600 fw-medium" href="modules/charts/echarts/line-charts.html">Line charts</a><a class="nav-link py-1 link-600 fw-medium" href="modules/charts/echarts/bar-charts.html">Bar charts</a><a class="nav-link py-1 link-600 fw-medium" href="modules/charts/echarts/candlestick-charts.html">Candlestick charts</a><a class="nav-link py-1 link-600 fw-medium" href="modules/charts/echarts/geo-map.html">Geo map</a><a class="nav-link py-1 link-600 fw-medium" href="modules/charts/echarts/scatter-charts.html">Scatter charts</a><a class="nav-link py-1 link-600 fw-medium" href="modules/charts/echarts/pie-charts.html">Pie charts</a><a class="nav-link py-1 link-600 fw-medium" href="modules/charts/echarts/radar-charts.html">Radar charts</a><a class="nav-link py-1 link-600 fw-medium" href="modules/charts/echarts/heatmap-charts.html">Heatmap charts</a><a class="nav-link py-1 link-600 fw-medium" href="modules/charts/echarts/how-to-use.html">How to use</a>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-xxl-3">
                                                    <div class="nav flex-column">
                                                        <p class="nav-link text-700 mb-0 fw-bold">Utilities</p><a class="nav-link py-1 link-600 fw-medium" href="modules/utilities/borders.html">Borders</a><a class="nav-link py-1 link-600 fw-medium" href="modules/utilities/clearfix.html">Clearfix</a><a class="nav-link py-1 link-600 fw-medium" href="modules/utilities/colors.html">Colors</a><a class="nav-link py-1 link-600 fw-medium" href="modules/utilities/colored-links.html">Colored links</a><a class="nav-link py-1 link-600 fw-medium" href="modules/utilities/display.html">Display</a><a class="nav-link py-1 link-600 fw-medium" href="modules/utilities/flex.html">Flex</a><a class="nav-link py-1 link-600 fw-medium" href="modules/utilities/float.html">Float</a><a class="nav-link py-1 link-600 fw-medium" href="modules/utilities/grid.html">Grid</a><a class="nav-link py-1 link-600 fw-medium" href="modules/utilities/overlayscrollbars.html">Overlayscrollbars</a><a class="nav-link py-1 link-600 fw-medium" href="modules/utilities/position.html">Position</a><a class="nav-link py-1 link-600 fw-medium" href="modules/utilities/spacing.html">Spacing</a><a class="nav-link py-1 link-600 fw-medium" href="modules/utilities/sizing.html">Sizing</a><a class="nav-link py-1 link-600 fw-medium" href="modules/utilities/stretched-link.html">Stretched link</a><a class="nav-link py-1 link-600 fw-medium" href="modules/utilities/text-truncation.html">Text truncation</a><a class="nav-link py-1 link-600 fw-medium" href="modules/utilities/typography.html">Typography</a>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-xxl-3">
                                                    <div class="nav flex-column pt-xxl-1">
                                                        <p class="nav-link text-700 mb-0 fw-bold">Icons</p><a class="nav-link py-1 link-600 fw-medium" href="modules/icons/font-awesome.html">Font awesome</a><a class="nav-link py-1 link-600 fw-medium" href="modules/icons/bootstrap-icons.html">Bootstrap icons</a><a class="nav-link py-1 link-600 fw-medium" href="modules/icons/feather.html">Feather</a><a class="nav-link py-1 link-600 fw-medium" href="modules/icons/material-icons.html">Material icons</a>
                                                        <p class="nav-link text-700 mb-0 fw-bold">Maps</p><a class="nav-link py-1 link-600 fw-medium" href="modules/maps/google-map.html">Google map</a><a class="nav-link py-1 link-600 fw-medium" href="modules/maps/leaflet-map.html">Leaflet map</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="documentations">Documentation</a>
                                <div class="dropdown-menu dropdown-caret dropdown-menu-card border-0 mt-0" aria-labelledby="documentations">
                                    <div class="bg-white dark__bg-1000 rounded-3 py-2"><a class="dropdown-item link-600 fw-medium" href="documentation/getting-started.html">Getting started</a><a class="dropdown-item link-600 fw-medium" href="documentation/customization/configuration.html">Configuration</a><a class="dropdown-item link-600 fw-medium" href="documentation/customization/styling.html">Styling</a><a class="dropdown-item link-600 fw-medium" href="documentation/customization/dark-mode.html">Dark mode<span class="badge rounded-pill ms-2 badge-soft-success">New</span></a><a class="dropdown-item link-600 fw-medium" href="documentation/customization/plugin.html">Plugin</a><a class="dropdown-item link-600 fw-medium" href="documentation/faq.html">Faq</a><a class="dropdown-item link-600 fw-medium" href="documentation/gulp.html">Gulp</a><a class="dropdown-item link-600 fw-medium" href="documentation/design-file.html">Design file</a><a class="dropdown-item link-600 fw-medium" href="changelog.html">Changelog</a></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">
                        <li class="nav-item">
                            <div class="theme-control-toggle fa-icon-wait px-2"><input class="form-check-input ms-0 theme-control-toggle-input" id="themeControlToggle" type="checkbox" data-theme-control="theme" value="dark" /><label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch to light theme"><span class="fas fa-sun fs-0"></span></label><label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch to dark theme"><span class="fas fa-moon fs-0"></span></label></div>
                        </li>
                        <li class="nav-item d-none d-sm-block">
                            <a class="nav-link px-0 notification-indicator notification-indicator-warning notification-indicator-fill fa-icon-wait" href="app/e-commerce/shopping-cart.html"><span class="fas fa-shopping-cart" data-fa-transform="shrink-7" style="font-size: 33px;"></span><span class="notification-indicator-number">1</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link notification-indicator notification-indicator-primary px-0 fa-icon-wait" id="navbarDropdownNotification" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-hide-on-body-scroll="data-hide-on-body-scroll"><span class="fas fa-bell" data-fa-transform="shrink-6" style="font-size: 33px;"></span></a>
                            <div class="dropdown-menu dropdown-caret dropdown-caret dropdown-menu-end dropdown-menu-card dropdown-menu-notification dropdown-caret-bg" aria-labelledby="navbarDropdownNotification">
                                <div class="card card-notification shadow-none">
                                    <div class="card-header">
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col-auto">
                                                <h6 class="card-header-title mb-0">Notifications</h6>
                                            </div>
                                            <div class="col-auto ps-0 ps-sm-3"><a class="card-link fw-normal" href="#">Mark all as read</a></div>
                                        </div>
                                    </div>
                                    <div class="scrollbar-overlay" style="max-height:19rem">
                                        <div class="list-group list-group-flush fw-normal fs--1">
                                            <div class="list-group-title border-bottom">NEW</div>
                                            <div class="list-group-item">
                                                <a class="notification notification-flush notification-unread" href="#!">
                                                    <div class="notification-avatar">
                                                        <div class="avatar avatar-2xl me-3">
                                                            <img class="rounded-circle" src="/assets/img/team/1-thumb.png" alt="" />
                                                        </div>
                                                    </div>
                                                    <div class="notification-body">
                                                        <p class="mb-1"><strong>Emma Watson</strong> replied to your comment : "Hello world 😍"</p>
                                                        <span class="notification-time"><span class="me-2" role="img" aria-label="Emoji">💬</span>Just now</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="list-group-item">
                                                <a class="notification notification-flush notification-unread" href="#!">
                                                    <div class="notification-avatar">
                                                        <div class="avatar avatar-2xl me-3">
                                                            <div class="avatar-name rounded-circle"><span>AB</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="notification-body">
                                                        <p class="mb-1"><strong>Albert Brooks</strong> reacted to <strong>Mia Khalifa's</strong> status</p>
                                                        <span class="notification-time"><span class="me-2 fab fa-gratipay text-danger"></span>9hr</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="list-group-title border-bottom">EARLIER</div>
                                            <div class="list-group-item">
                                                <a class="notification notification-flush" href="#!">
                                                    <div class="notification-avatar">
                                                        <div class="avatar avatar-2xl me-3">
                                                            <img class="rounded-circle" src="/assets/img/icons/weather-sm.jpg" alt="" />
                                                        </div>
                                                    </div>
                                                    <div class="notification-body">
                                                        <p class="mb-1">The forecast today shows a low of 20&#8451; in California. See today's weather.</p>
                                                        <span class="notification-time"><span class="me-2" role="img" aria-label="Emoji">🌤️</span>1d</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="list-group-item">
                                                <a class="border-bottom-0 notification-unread  notification notification-flush" href="#!">
                                                    <div class="notification-avatar">
                                                        <div class="avatar avatar-xl me-3">
                                                            <img class="rounded-circle" src="/assets/img/logos/oxford.png" alt="" />
                                                        </div>
                                                    </div>
                                                    <div class="notification-body">
                                                        <p class="mb-1"><strong>University of Oxford</strong> created an event : "Causal Inference Hilary 2019"</p>
                                                        <span class="notification-time"><span class="me-2" role="img" aria-label="Emoji">✌️</span>1w</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="list-group-item">
                                                <a class="border-bottom-0 notification notification-flush" href="#!">
                                                    <div class="notification-avatar">
                                                        <div class="avatar avatar-xl me-3">
                                                            <img class="rounded-circle" src="/assets/img/team/10.jpg" alt="" />
                                                        </div>
                                                    </div>
                                                    <div class="notification-body">
                                                        <p class="mb-1"><strong>James Cameron</strong> invited to join the group: United Nations International Children's Fund</p>
                                                        <span class="notification-time"><span class="me-2" role="img" aria-label="Emoji">🙋‍</span>2d</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center border-top"><a class="card-link d-block" href="app/social/notifications.html">View all</a></div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown px-1">
                            <a class="nav-link fa-icon-wait nine-dots p-1" id="navbarDropdownMenu" role="button" data-hide-on-body-scroll="data-hide-on-body-scroll" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="43" viewBox="0 0 16 16" fill="none">
                                    <circle cx="2" cy="2" r="2" fill="#6C6E71"></circle>
                                    <circle cx="2" cy="8" r="2" fill="#6C6E71"></circle>
                                    <circle cx="2" cy="14" r="2" fill="#6C6E71"></circle>
                                    <circle cx="8" cy="8" r="2" fill="#6C6E71"></circle>
                                    <circle cx="8" cy="14" r="2" fill="#6C6E71"></circle>
                                    <circle cx="14" cy="8" r="2" fill="#6C6E71"></circle>
                                    <circle cx="14" cy="14" r="2" fill="#6C6E71"></circle>
                                    <circle cx="8" cy="2" r="2" fill="#6C6E71"></circle>
                                    <circle cx="14" cy="2" r="2" fill="#6C6E71"></circle>
                                </svg></a>

                        </li>
                        <li class="nav-item dropdown"><a class="nav-link pe-0 ps-2" id="navbarDropdownUser" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="avatar avatar-xl">
                                    <img class="rounded-circle" src="/assets/img/team/admin.png" alt="" />
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-caret dropdown-caret dropdown-menu-end py-0" aria-labelledby="navbarDropdownUser">
                                <div class="bg-white dark__bg-1000 rounded-2 py-2">
                                    <a class="dropdown-item fw-bold text-warning" href="#!"><span class="fas fa-crown me-1"></span><span>Go Pro</span></a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#!">Set status</a>
                                    <a class="dropdown-item" href="pages/user/profile.html">Profile &amp; account</a>
                                    <a class="dropdown-item" href="#!">Feedback</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="pages/user/settings.html">Settings</a>
                                    <a class="dropdown-item" href="pages/authentication/card/logout.html">Logout</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </nav>
                <script>
                    var navbarPosition = localStorage.getItem('navbarPosition');
                    var navbarVertical = document.querySelector('.navbar-vertical');
                    var navbarTopVertical = document.querySelector('.content .navbar-top');
                    var navbarTop = document.querySelector('[data-layout] .navbar-top');
                    var navbarTopCombo = document.querySelector('.content [data-navbar-top="combo"]');
                    if (navbarPosition === 'top') {
                        navbarTop.removeAttribute('style');
                        navbarTopVertical.remove(navbarTopVertical);
                        navbarVertical.remove(navbarVertical);
                        navbarTopCombo.remove(navbarTopCombo);
                    } else if (navbarPosition === 'combo') {
                        navbarVertical.removeAttribute('style');
                        navbarTopCombo.removeAttribute('style');
                        navbarTop.remove(navbarTop);
                        navbarTopVertical.remove(navbarTopVertical);
                    } else {
                        navbarVertical.removeAttribute('style');
                        navbarTopVertical.removeAttribute('style');
                        navbarTop.remove(navbarTop);
                        navbarTopCombo.remove(navbarTopCombo);
                    }
                </script>
                <footer class="footer">
                    <div class="row g-0 justify-content-between fs--1 mt-4 mb-3">
                        <div class="col-12 col-sm-auto text-center">
                            <p class="mb-0 text-600"> <span class="d-none d-sm-inline-block"> </span><br class="d-sm-none" /> 2022 &copy; </p>
                        </div>

                    </div>
                </footer>
                <div class="main-content">
                    @yield('content')
                </div>




            </div>
        </div>
    </main><!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->

    <div class="offcanvas offcanvas-end settings-panel border-0" id="settings-offcanvas" tabindex="-1" aria-labelledby="settings-offcanvas">
        <div class="offcanvas-body scrollbar-overlay px-card" id="themeController">
            <h5 class="fs-0">Color Scheme</h5>
            <p class="fs--1">Choose the perfect color mode for your app.</p>
            <div class="btn-group d-block w-100 btn-group-navbar-style">
                <div class="row gx-2">
                    <div class="col-6"><input class="btn-check" id="themeSwitcherLight" name="theme-color" type="radio" value="light" data-theme-control="theme" /><label class="btn d-inline-block btn-navbar-style fs--1" for="themeSwitcherLight"> <span class="hover-overlay mb-2 rounded d-block"><img class="img-fluid img-prototype mb-0" src="/assets/img/generic/falcon-mode-default.jpg" alt=""/></span><span class="label-text">Light</span></label></div>
                    <div class="col-6"><input class="btn-check" id="themeSwitcherDark" name="theme-color" type="radio" value="dark" data-theme-control="theme" /><label class="btn d-inline-block btn-navbar-style fs--1" for="themeSwitcherDark"> <span class="hover-overlay mb-2 rounded d-block"><img class="img-fluid img-prototype mb-0" src="/assets/img/generic/falcon-mode-dark.jpg" alt=""/></span><span class="label-text"> Dark</span></label></div>
                </div>
            </div>
            <hr />
            <div class="d-flex justify-content-between">
                <div class="d-flex align-items-start"><img class="me-2" src="/assets/img/icons/left-arrow-from-left.svg" width="20" alt="" />
                    <div class="flex-1">
                        <h5 class="fs-0">RTL Mode</h5>

                    </div>
                </div>
                <div class="form-check form-switch"><input class="form-check-input ms-0" id="mode-rtl" type="checkbox" data-theme-control="isRTL" /></div>
            </div>
            <hr />
            <div class="d-flex justify-content-between">
                <div class="d-flex align-items-start"><img class="me-2" src="/assets/img/icons/arrows-h.svg" width="20" alt="" />
                    <div class="flex-1">
                        <h5 class="fs-0">Fluid Layout</h5>

                    </div>
                </div>
                <div class="form-check form-switch"><input class="form-check-input ms-0" id="mode-fluid" type="checkbox" data-theme-control="isFluid" /></div>
            </div>
            <hr />
            <div class="d-flex align-items-start"><img class="me-2" src="/assets/img/icons/paragraph.svg" width="20" alt="" />
                <div class="flex-1">
                    <h5 class="fs-0 d-flex align-items-center">Navigation Position </h5>
                    <p class="fs--1 mb-2">Select a suitable navigation system for your web application </p>
                    <div>
                        <div class="form-check form-check-inline"><input class="form-check-input" id="option-navbar-vertical" type="radio" name="navbar" value="vertical" data-theme-control="navbarPosition" /><label class="form-check-label" for="option-navbar-vertical">Vertical</label></div>
                        <div class="form-check form-check-inline"><input class="form-check-input" id="option-navbar-top" type="radio" name="navbar" value="top" data-theme-control="navbarPosition" /><label class="form-check-label" for="option-navbar-top">Top</label></div>

                    </div>
                </div>
            </div>
            <hr />
            <h5 class="fs-0 d-flex align-items-center">Vertical Navbar Style</h5>

            <div class="btn-group d-block w-100 btn-group-navbar-style">
                <div class="row gx-2">
                    <div class="col-6"><input class="btn-check" id="navbar-style-transparent" type="radio" name="navbarStyle" value="transparent" data-theme-control="navbarStyle" /><label class="btn d-block w-100 btn-navbar-style fs--1" for="navbar-style-transparent"> <img class="img-fluid img-prototype" src="/assets/img/generic/default.png" alt="" /><span class="label-text"> Transparent</span></label></div>
                    <div class="col-6"><input class="btn-check" id="navbar-style-inverted" type="radio" name="navbarStyle" value="inverted" data-theme-control="navbarStyle" /><label class="btn d-block w-100 btn-navbar-style fs--1" for="navbar-style-inverted"> <img class="img-fluid img-prototype" src="/assets/img/generic/inverted.png" alt="" /><span class="label-text"> Inverted</span></label></div>
                    <div class="col-6"><input class="btn-check" id="navbar-style-card" type="radio" name="navbarStyle" value="card" data-theme-control="navbarStyle" /><label class="btn d-block w-100 btn-navbar-style fs--1" for="navbar-style-card"> <img class="img-fluid img-prototype" src="/assets/img/generic/card.png" alt="" /><span class="label-text"> Card</span></label></div>
                    <div class="col-6"><input class="btn-check" id="navbar-style-vibrant" type="radio" name="navbarStyle" value="vibrant" data-theme-control="navbarStyle" /><label class="btn d-block w-100 btn-navbar-style fs--1" for="navbar-style-vibrant"> <img class="img-fluid img-prototype" src="/assets/img/generic/vibrant.png" alt="" /><span class="label-text"> Vibrant</span></label></div>
                </div>
            </div>

        </div>
    </div><a class="card setting-toggle" href="#settings-offcanvas" data-bs-toggle="offcanvas">
        <div class="card-body d-flex align-items-center py-md-2 px-2 py-1">
            <div class="bg-soft-primary position-relative rounded-start" style="height:34px;width:28px">
                <div class="settings-popover"><span class="ripple"><span class="fa-spin position-absolute all-0 d-flex flex-center"><span class="icon-spin position-absolute all-0 d-flex flex-center"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M19.7369 12.3941L19.1989 12.1065C18.4459 11.7041 18.0843 10.8487 18.0843 9.99495C18.0843 9.14118 18.4459 8.28582 19.1989 7.88336L19.7369 7.59581C19.9474 7.47484 20.0316 7.23291 19.9474 7.03131C19.4842 5.57973 18.6843 4.28943 17.6738 3.20075C17.5053 3.03946 17.2527 2.99914 17.0422 3.12011L16.393 3.46714C15.6883 3.84379 14.8377 3.74529 14.1476 3.3427C14.0988 3.31422 14.0496 3.28621 14.0002 3.25868C13.2568 2.84453 12.7055 2.10629 12.7055 1.25525V0.70081C12.7055 0.499202 12.5371 0.297594 12.2845 0.257272C10.7266 -0.105622 9.16879 -0.0653007 7.69516 0.257272C7.44254 0.297594 7.31623 0.499202 7.31623 0.70081V1.23474C7.31623 2.09575 6.74999 2.8362 5.99824 3.25599C5.95774 3.27861 5.91747 3.30159 5.87744 3.32493C5.15643 3.74527 4.26453 3.85902 3.53534 3.45302L2.93743 3.12011C2.72691 2.99914 2.47429 3.03946 2.30587 3.20075C1.29538 4.28943 0.495411 5.57973 0.0322686 7.03131C-0.051939 7.23291 0.0322686 7.47484 0.242788 7.59581L0.784376 7.8853C1.54166 8.29007 1.92694 9.13627 1.92694 9.99495C1.92694 10.8536 1.54166 11.6998 0.784375 12.1046L0.242788 12.3941C0.0322686 12.515 -0.051939 12.757 0.0322686 12.9586C0.495411 14.4102 1.29538 15.7005 2.30587 16.7891C2.47429 16.9504 2.72691 16.9907 2.93743 16.8698L3.58669 16.5227C4.29133 16.1461 5.14131 16.2457 5.8331 16.6455C5.88713 16.6767 5.94159 16.7074 5.99648 16.7375C6.75162 17.1511 7.31623 17.8941 7.31623 18.7552V19.2891C7.31623 19.4425 7.41373 19.5959 7.55309 19.696C7.64066 19.7589 7.74815 19.7843 7.85406 19.8046C9.35884 20.0925 10.8609 20.0456 12.2845 19.7729C12.5371 19.6923 12.7055 19.4907 12.7055 19.2891V18.7346C12.7055 17.8836 13.2568 17.1454 14.0002 16.7312C14.0496 16.7037 14.0988 16.6757 14.1476 16.6472C14.8377 16.2446 15.6883 16.1461 16.393 16.5227L17.0422 16.8698C17.2527 16.9907 17.5053 16.9504 17.6738 16.7891C18.7264 15.7005 19.4842 14.4102 19.9895 12.9586C20.0316 12.757 19.9474 12.515 19.7369 12.3941ZM10.0109 13.2005C8.1162 13.2005 6.64257 11.7893 6.64257 9.97478C6.64257 8.20063 8.1162 6.74905 10.0109 6.74905C11.8634 6.74905 13.3792 8.20063 13.3792 9.97478C13.3792 11.7893 11.8634 13.2005 10.0109 13.2005Z" fill="#2A7BE4"></path></svg></span></span></span></div>
            </div><small class="text-uppercase text-primary fw-bold bg-soft-primary py-2 pe-2 ps-1 rounded-end">customize</small>
        </div>
    </a>

<!-- ===============================================-->
<!--    JavaScripts-->
<!-- ===============================================-->
<script src="/vendors/fullcalendar/main.min.js"></script>
<script src="/assets/js/flatpickr.js"></script>
<script src="/vendors/dayjs/dayjs.min.js"></script>
<script src="/vendors/popper/popper.min.js"></script>
<script src="/vendors/bootstrap/bootstrap.min.js"></script>
<script src="/vendors/anchorjs/anchor.min.js"></script>
<script src="/vendors/is/is.min.js"></script>
<script src="/vendors/echarts/echarts.min.js"></script>
<script src="/vendors/fontawesome/all.min.js"></script>
<script src="/vendors/lodash/lodash.min.js"></script>
{{--<script src="/polyfill.io/v3/polyfill.min58be.js?features=window.scroll"></script>--}}
<script src="/vendors/list.js/list.min.js"></script>
<script src="/assets/js/theme.js"></script>
<script src="/assets/js/admin.js"></script>
<script src="/vendors/choices/choices.min.js"></script>
</body>


<!-- Mirrored from prium.github.io/falcon/v3.9.0/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Jun 2022 13:36:48 GMT -->
</html>

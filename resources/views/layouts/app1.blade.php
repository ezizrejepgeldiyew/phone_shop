<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="{{ asset('img/logo_big.png') }}">

    <title>Creative - Bootstrap Admin Template</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/elegant-icons-style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('fullcalendar/fullcalendar/bootstrap-fullcalendar.css') }}" rel="stylesheet" />
    <link href="{{ asset('fullcalendar/fullcalendar/fullcalendar.css') }}" rel="stylesheet" />
    <link href="{{ asset('jquery-easy-pie-chart/jquery.easy-pie-chart.css') }}" rel="stylesheet" type="text/css"
        media="screen" />
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }} " type="text/css">
    <link href="{{ asset('css/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/fullcalendar.css') }} ">
    <link href="{{ asset('css/widgets.css') }} " rel="stylesheet">
    <link href="{{ asset('css/style.css') }} " rel="stylesheet">
    <link href="{{ asset('css/style-responsive.css') }} " rel="stylesheet" />
    <link href="{{ asset('css/xcharts.min.css') }} " rel=" stylesheet">
    <link href="{{ asset('css/jquery-ui-1.10.4.min.css') }} " rel="stylesheet">
</head>

<header class="header dark-bg">
    <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i
                class="icon_menu"></i></div>
    </div>

    <!--logo start-->
    <a href="{{ route('index') }}" class="logo">Nice <span class="lite">Admin</span></a>
    <!--logo end-->

    <div class="nav search-row" id="top_menu">
        <!--  search form start -->
        <ul class="nav top-menu">
            <li>
                <form class="navbar-form">
                    <input class="form-control" placeholder="Search" type="text">
                </form>
            </li>
        </ul>
        <!--  search form end -->
    </div>

    <div class="top-nav notification-row">
        <ul class="nav pull-right top-menu">
            <li>
                <form action="{{ route('logout') }}" method="post"> @csrf
                    <button type="submit">Logout</button>
                </form>
            </li>
        </ul>
    </div>
</header>
<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
            <li class="active"><a class="" href="{{ route('index') }}"><span>Dashboard</span></a></li>

            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_document_alt"></i>
                    <span>Products</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a href="{{ Route('category.index') }}"><span>Category</span></a></li>
                    <li><a href="{{ Route('ourbrand.index') }}"><span>OurBrands</span></a></li>
                    <li><a href="{{ Route('country.index') }}"><span>Country</span></a></li>
                    <li><a href="{{ Route('product.index') }}"><span>Product</span></a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_document_alt"></i>
                    <span>Kuriyents</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a href="{{ Route('kuriyent.index') }}"><span>Kuriyent Statistika</span></a></li>
                </ul>
            </li>

        </ul>

        <!-- sidebar menu end-->
    </div>
</aside>

<body>
    <section id="main-content">
        <section class="wrapper">

            @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
            @endif

            @yield('skilet')

        </section>

    </section>

</body>

<!-- javascripts -->
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/jquery-ui-1.10.4.min.js') }}"></script>
<script src="{{ asset('js/jquery-1.8.3.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-ui-1.9.2.custom.min.js') }}"></script>
<!-- bootstrap -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- nice scroll -->
<script src="{{ asset('js/jquery.scrollTo.min.js') }}"></script>
<script src="{{ asset('js/jquery.nicescroll.js') }}" type="text/javascript"></script>
<!-- charts scripts -->
<script src="{{ asset('jquery-knob/js/jquery.knob.js') }} "></script>
<script src="{{ asset('js/jquery.sparkline.js') }} " type="text/javascript"></script>
<script src="{{ asset('jquery-easy-pie-chart/jquery.easy-pie-chart.js') }} "></script>
<script src="{{ asset('js/owl.carousel.js') }} "></script>
<!-- jQuery full calendar -->
<<script src="{{ asset('js/fullcalendar.min.js') }} "></script>
<!-- Full Google Calendar - Calendar -->
<script src="{{ asset('fullcalendar/fullcalendar/fullcalendar.js') }}"></script>
<!--script for this page only-->
<script src="{{ asset('js/calendar-custom.js') }} "></script>
<script src="{{ asset('js/jquery.rateit.min.js') }} "></script>
<!-- custom select -->
<script src="{{ asset('js/jquery.customSelect.min.js') }} "></script>
<script src="{{ asset('chart-master/Chart.js') }}"></script>

<!--custome script for all page-->
<script src="{{ asset('js/scripts.js') }} "></script>
<!-- custom script for this page-->
<script src="{{ asset('js/sparkline-chart.js') }} "></script>
<script src="{{ asset('js/easy-pie-chart.js') }} "></script>
<script src="{{ asset('js/jquery-jvectormap-1.2.2.min.js') }} "></script>
<script src="{{ asset('js/jquery-jvectormap-world-mill-en.js') }} "></script>
<script src="{{ asset('js/xcharts.min.js') }} "></script>
<script src="{{ asset('js/jquery.autosize.min.js') }} "></script>
<script src="{{ asset('js/jquery.placeholder.min.js') }} "></script>
<script src="{{ asset('js/gdp-data.js') }} "></script>
<script src="{{ asset('js/morris.min.js') }} "></script>
<script src="{{ asset('js/sparklines.js') }} "></script>
<script src="{{ asset('js/charts.js') }} "></script>
<script src="{{ asset('js/jquery.slimscroll.min.js') }} "></script>
<script>
    //knob
    $(function() {
        $(".knob").knob({
            'draw': function() {
                $(this.i).val(this.cv + '%')
            }
        })
    });

    //carousel
    $(document).ready(function() {
        $("#owl-slider").owlCarousel({
            navigation: true,
            slideSpeed: 300,
            paginationSpeed: 400,
            singleItem: true

        });
    });

    //custom select box

    $(function() {
        $('select.styled').customSelect();
    });

    /* ---------- Map ---------- */
    $(function() {
        $('#map').vectorMap({
            map: 'world_mill_en',
            series: {
                regions: [{
                    values: gdpData,
                    scale: ['#000', '#000'],
                    normalizeFunction: 'polynomial'
                }]
            },
            backgroundColor: '#eef3f7',
            onLabelShow: function(e, el, code) {
                el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
            }
        });
    });
</script>
@yield('scripts')

</body>

</html>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title id="page-title">CAFE · {{ $company->name }}</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="Invoice services system" name="description" />
    <meta content="Joel Crespo" name="author" />
    <link rel="shortcut icon" href="favicon.png">

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    {!! Html::style('css/app.css') !!}
    {!! Html::style('css/'.$company->color.'.css') !!}
    <!-- ================== END BASE JS ================== -->
</head>
<body>
    <!-- begin #page-loader -->
    <div id="page-loader" class="fade in"><span class="spinner"></span></div>
    <!-- end #page-loader -->

    <!-- begin #page-container -->
    <div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
        <!-- begin #header -->
        <div id="header" class="header navbar navbar-inverse navbar-fixed-top">
            <!-- begin container-fluid -->
            <div class="container-fluid">
                <!-- begin mobile sidebar expand / collapse button -->
                <div class="navbar-header">
                    <a href="index.html" class="navbar-brand"><span class="navbar-logo"></span> {{ $company->name }}</a>
                    <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!-- end mobile sidebar expand / collapse button -->

                <!-- begin header navigation right -->
                <ul class="nav navbar-nav navbar-right">

                    <li>
                        <form class="navbar-form full-width">
                            <div class="form-group">
                                <input type="text" autocomplete="off" id="db_year" class="form-control" placeholder="Año" value="{{ session('db_year') }}">
                                <button type="button" class="btn btn-search btn-change-db"><i class="fa fa-database"></i></button>
                            </div>
                        </form>
                    </li>

                    <li class="dropdown navbar-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                            {!! Html::image(Auth::user()->image == NULL ? 'images/user.png' : Auth::user()->image, 'avatar', ['class' => 'img-profile']) !!}
                            <span class="hidden-xs">{{ Auth::user()->fullname }}</span> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu animated fadeInLeft">
                            <li class="arrow"></li>
                            <li><a href="javascript:;">Perfil</a></li>
                            <li><a href="javascript:;">Configuracion</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ url('/logout') }}">Salir</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- end header navigation right -->
            </div>
            <!-- end container-fluid -->
        </div>
        <!-- end #header -->

        <!-- begin #sidebar -->
        <div id="sidebar" class="sidebar sidebar-grid">
            <!-- begin sidebar scrollbar -->
            <div data-scrollbar="true" data-height="100%">
                <!-- begin sidebar user -->
                <ul class="nav">
                    <li class="nav-profile">
                        <div class="image">
                            <a href="javascript:;">
                                {!! Html::image(Auth::user()->image == NULL ? 'images/user.png' : Auth::user()->image, 'avatar', ['class' => 'img-profile', 'id' => 'img-user']) !!}
                            </a>
                        </div>
                        <div class="info">
                            {{ Auth::user()->fullname }}
                            <small>{{ Auth::user()->role }}</small>
                            <input type="hidden" id="welcome" value="{{ Auth::user()->first_name }}">
                        </div>
                    </li>
                </ul>
                <!-- end sidebar user -->
                <!-- begin sidebar nav -->
                <ul class="nav">
                    <li class="has-sub nav-btn" data-view="services">
                        <a href="#" class="view">
                            <i class="fa fa-car"></i>
                            <span>Servicios</span>
                        </a>
                    </li>

                    <li class="has-sub nav-btn" data-view="referrals">
                        <a href="#" class="view">
                            <i class="fa fa-clipboard"></i>
                            <span>Remiciones</span>
                        </a>
                    </li>

                    <!--<li class="has-sub nav-btn">
                        <a href="javascript:;">
                            <span class="badge pull-right">10</span>
                            <i class="fa fa-files-o"></i>
                            <span>Reportes</span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-btn" data-view="reports"><a href="">Libro de servicios</a></li>
                            <li class="nav-btn" data-view="reports"><a href="">Facturas Pagadas</a></li>
                        </ul>
                    </li>-->

                    <li class="has-sub nav-btn" data-view="paysheets">
                        <a href="#" class="view">
                            <i class="fa fa-money"></i>
                            <span>Nomina</span>
                        </a>
                    </li>

                    <li class="has-sub nav-btn" data-view="geolocation">
                        <a href="#" class="view">
                            <i class="fa fa-globe"></i>
                            <span>Geolocalizacion</span>
                        </a>
                    </li>

                    <li class="has-sub nav-btn" data-view="messaging">
                        <a href="#" class="view">
                            <i class="fa fa-send"></i>
                            <span>Mensajeria</span>
                        </a>
                    </li>

                    <li class="has-sub nav-btn">
                        <a href="javascript:;">
                            <b class="caret pull-right"></b>
                            <i class="fa fa-th"></i>
                            <span>Administrar</span>
                        </a>
                        <ul class="sub-menu ">
                            <li class="nav-btn" data-view="drivers">        <a href="#" class="view">Conductores</a></li>
                            <li class="nav-btn" data-view="routes">         <a href="#" class="view">Rutas</a></li>
                            <li class="nav-btn" data-view="subsidiaries">   <a href="#" class="view">Filiales</a></li>
                            <li class="nav-btn" data-view="tabulators">      <a href="#" class="view">Tabulador</a></li>
                        </ul>
                    </li>

                    <!-- begin sidebar minify button -->
                    <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
                    <!-- end sidebar minify button -->
                </ul>
                <!-- end sidebar nav -->
            </div>
            <!-- end sidebar scrollbar -->
        </div>
        <div class="sidebar-bg"></div>
        <!-- end #sidebar -->

        <div id="content" class="content">
            @yield('content')
        </div>

        <!-- begin scroll to top btn -->
        <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
        <!-- end scroll to top btn -->
    </div>
    <!-- end page container -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyD2jqwQPZptlhHBnHjJh3IQfFL4IGtcvUo"></script>
    {!! Html::script('js/app.js') !!}
    <!-- ================== END PAGE LEVEL JS ================== -->

     @yield('scripts')

</body>
</html>

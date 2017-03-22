<div id="geolocation" class="views">
	<!-- begin page-header -->
	<h1 class="page-header">Geolocalizacion <small>Modulo de geolocalizacion de veiculos.</small></h1>
	<!-- end page-header -->

    <div class="map-content">
        <div class="btn-group map-btn pull-right" style="margin-top: -40px">
            <button type="button" class="btn btn-sm btn-inverse" id="map-theme-text">Estilo</button>
            <button type="button" class="btn btn-sm btn-inverse dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" id="map-theme-selection">
                <li class="active"><a href="javascript:;" data-map-theme="default">Default</a></li>
                <li><a href="javascript:;" data-map-theme="flat">Flat</a></li>
                <li><a href="javascript:;" data-map-theme="turquoise-water">Turqueza</a></li>
                <li><a href="javascript:;" data-map-theme="icy-blue">Azul Frio</a></li>
                <li><a href="javascript:;" data-map-theme="cobalt">Cobalto</a></li>
                <li><a href="javascript:;" data-map-theme="dark-red">Rojo Oscuro</a></li>
            </ul>
        </div>
    </div>
	<div class="map" style="height:92% !important; overflow: hidden;">
        <div id="google-map-default" class="height-full width-full" style="height:105% !important;"></div>
    </div>
</div>
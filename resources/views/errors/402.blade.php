<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>CAFE · 402</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />

	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	{!! Html::style('css/app.css') !!}
	<!-- ================== END BASE CSS STYLE ================== -->

</head>
<body class="pace-top">
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->

	<!-- begin #page-container -->
	<div id="page-container" class="fade">
	    <!-- begin error -->
        <div class="error">
            <div class="error-code m-b-10">402 <i class="fa fa-warning"></i></div>
            <div class="error-content">
                <div class="error-message">Pago requerido.</div>
                <div class="error-desc m-b-20">
					Su cuenta se encuentra temporalmente inactiva. <br>
					Por favor comuniquese con el desarrollador del sistema para activar la cuenta.
                </div>
                <div>
                    <a href="{{ url('/logout') }}" class="btn btn-success">Aceptar</a>
                </div>
            </div>
        </div>
        <!-- end error -->

	</div>
	<!-- end page container -->

	<!-- ================== BEGIN BASE JS ================== -->
	{!! Html::script('js/app.js') !!}
	<!-- ================== END PAGE LEVEL JS ================== -->

	<script>
		$(document).ready(function() {
			App.init();
		});
	</script>
</body>
</html>

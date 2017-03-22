<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title>CAFE · {{ ucfirst(explode('/login',explode('://',Request::url())[1])[0]) }}</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="Empresa de consultoria y desarrollo de software y hardware para empresas." name="description" />
    <meta content="Joel Crespo" name="author" />
    <meta content="Invoice services system" name="title" />
    <link rel="shortcut icon" href="favicon.png">

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    {!! Html::style('css/login.css') !!}
    <!-- ================== END BASE JS ================== -->
</head>
<body class="pace-top" style="height: 350px;">
    <!-- begin #page-loader -->
    <div id="page-loader" class="fade in"><span class="spinner"></span></div>
    <!-- end #page-loader -->

    <div class="login-cover">
        <div class="login-cover-image"><img src="images/bg-1.jpg" data-id="login-cover-image" alt="" /></div>
        <div class="login-cover-bg"></div>
    </div>

    <!-- begin #page-container -->
    <div id="page-container" class="fade">
        <!-- begin login -->
        <div class="login login-v2" data-pageload-addclass="animated fadeIn">
            <!-- begin brand -->
            <div class="login-header">
                <div class="brand">
                    CAFE
                    <small>
                        {{ ucfirst(explode('/login',explode('://',Request::url())[1])[0]) }}
                    </small>
                </div>
                <div class="icon">
                    <i class="fa fa-sign-in"></i>
                </div>
            </div>
            <!-- end brand -->
            <div class="login-content">
                {!! Form::open(['url' => '/login', 'class' => 'margin-bottom-0', 'id' => 'authenticate']) !!}
                    <div class="form-group m-b-20">
                        {!! Form::email('email', null, ['class'=>'form-control input-lg', 'placeholder'=>'Email', 'autocomplete'=>'off', 'type'=>'email']) !!}
                    </div>
                    <div class="form-group m-b-20">
                        {!! Form::password('password', ['class'=>'form-control input-lg', 'placeholder'=>'Password']) !!}
                    </div>
                    <div class="checkbox m-b-20">
                        <label onclick="$.remember();" style="cursor:pointer;"><i class="fa fa-circle-o m-l-20 fa-lg" id="chkr"></i> <span class="m-l-10">No cerrar la sesion.</span></label>
                        {!! Form::checkbox('remember',1,null,['style'=>'display:none;']) !!}
                    </div>
                    <div class="login-buttons">
                        <button type="submit" class="btn btn-success btn-block btn-lg">Iniciar Sesion</button>
                    </div>
                    <div class="m-t-20">
                        @if (count($errors) > 0)
                            <div class="alert alert-info fade in m-b-15">
                                <strong>Oops!</strong> Hemos tenido algunos problemas:
                                <span class="close" data-dismiss="alert">×</span>
                                <br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
        <!-- end login -->

    </div>
    <!-- end page container -->

    <!-- ================== BEGIN BASE JS ================== -->
    {!! Html::script('js/login.js') !!}
    <!-- ================== END PAGE LEVEL JS ================== -->

    <script>
        $(document).ready(function() {
            App.init(ajax=true);
            LoginV2.init();

            $.remember = function() {
                var input = $('#authenticate input[name=remember]');
                if(input.is(':checked')){
                    input.attr('checked', false);
                    $('#chkr').removeClass('fa-dot-circle-o');
                    $('#chkr').addClass('fa-circle-o');
                }
                else{
                    input.attr('checked', true);
                    $('#chkr').removeClass('fa-circle-o');
                    $('#chkr').addClass('fa-dot-circle-o');
                }
            }

        });
    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>CAFE - {{ $subsidiary->company->name }}</title>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <style>
        .page-break {
            page-break-after: always;
        }
        header{
            width:100%;
            background-color: #F0F3F4;
            padding: 5px 30px 20px 20px;
        }
        .content{
            border-style: solid;
            border-color: #f0f3f4;
            border-width: 1px;
        }
        h2{
            padding: 10px 20px 20px 20px;
            width: 100%;
            margin: 0px 0px 0px 0px;
            font-family: 'Open Sans',"Helvetica Neue",Helvetica,Arial,sans-serif;;
            font-weight: 400;
            font-size: 20px;
            color: #707478;
        }
        .from{
            font-family: 'Open Sans',"Helvetica Neue",Helvetica,Arial,sans-serif;;
            background-color: transparent;
            width:30%;
            display: inline-block;
            color: #707478;
        }
        .to{
            font-family: 'Open Sans',"Helvetica Neue",Helvetica,Arial,sans-serif;;
            background-color: transparent;
            width:30%;
            display: inline-block;
            color: #707478;
        }
        .invoice-data{
            padding-top: 10px;
            font-family: 'Open Sans',"Helvetica Neue",Helvetica,Arial,sans-serif;;
            width:40%;
            text-align: right;
            display: inline-block;
            color: #707478;
            font-size: 13px;
            line-height: 1;
        }
        address{
            font-style: normal;
            font-size: 13px;
            line-height: 1;
        }
        small{
            font-size: 11px;
        }
        table.table{
            font-family: 'Open Sans',"Helvetica Neue",Helvetica,Arial,sans-serif;;
            text-align: left;
            border-color: #e2e7eb;
            color: #707478;
            font-size: 13px;
            width: 100%;
            border-collapse: collapse;
        }
        section.table{
            padding: 20px;
        }
        td{
            font-size: 12px;
            border-top-style: solid;
            border-top-width: .5px;
            border-top-color: #e2e7eb;
            padding-top: 4px;
            padding-bottom: 10px;
            padding-left: 10px;
        }
        th{
            font-size: 12px;
            padding: 10px;
            text-align: left;
            border-bottom-style: solid;
            border-bottom-width: 2px;
            border-bottom-color: #e2e7eb;
        }
        .panel-header{
            font-family: 'Open Sans',"Helvetica Neue",Helvetica,Arial,sans-serif;;
            background-color: #e2e7eb;
            padding: 10px;
            padding-top: 5px;
            width: 100%;
            color: #707478;
        }
        .panel-footer{
            font-family: 'Open Sans',"Helvetica Neue",Helvetica,Arial,sans-serif;;
            background-color: #e2e7eb;
            padding: 10px;
            padding-top: 5px;
            width: 63%;
            color: #707478;
            display: inline-block;
        }
        .panel-total{
            font-family: 'Open Sans',"Helvetica Neue",Helvetica,Arial,sans-serif;;
            background-color: #2d353c;
            padding: 10px;
            padding-top: 5px;
            width: 30%;
            color: #FFFFFF;
            display: inline-block;
            text-align:right;
            float: right;
        }
        .end{
            background-color: #e2e7eb;
            background-color: #2d353c;
        }
        .panel-body{
            font-family: 'Open Sans',"Helvetica Neue",Helvetica,Arial,sans-serif;;
            background-color: transparent;
            padding: 10px;
            padding-top: 5px;
            padding-bottom: 0px;
            width: 100%;
            color: #707478;
        }


        @font-face{
            font-family: 'sawasdee';
            src: url('fonts/Sawasdee.ttf') format('truetype');
        }
    </style>

</head>
<body>

    <div class="content">

    <h2>{{ $subsidiary->company->name }}</h2>

    <header>
        <div class="from">
            <small>De:</small>
            <address>
                <strong>{{ strtoupper($subsidiary->company->name) }}</strong><br>
                RIF: {{ $subsidiary->company->rif }}<br>
            </address>
        </div>

        <div class="to">
            <small>Para:</small>
            <address>
                <strong>{{ strtoupper($subsidiary->name) }}</strong><br>
                RIF: {{ $subsidiary->rif }}
            </address>
        </div>

        <div class="invoice-data">
            <small>Fecha</small><br>
            <strong>{{ date('d/m/Y') }}</strong>
            <div class="invoice-detail">
                {{ $area }} - {{ $week }}<br>
            </div>
        </div>
    </header>


    <section class="table">

        <div class="panel-header">
            SERVICIOS DE VIAJES Y TRASLADOS
        </div>

    </section>


    <section class="table">

        <table class="table">
            <thead>
                <tr>
                    <th style="width:130px;">FECHA</th>
                    <th>USUARIO</th>
                    <th style="width:130px;">RUTA</th>
                    <th>CCOO</th>
                    <th>ORDEN</th>
                    <th style="width:100px; text-align:right;">COSTO</th>
                </tr>
            </thead>
            <tbody>

                @foreach($services as $service)
                    <tr>
                        <td>{{ $service->start_date }}</td>
                        <td>{{ $service->user }}</td>
                        <td>{{ $service->route->route }}</td>
                        <td>{{ $service->ccoo }}</td>
                        <td>{{ $service->order }}</td>
                        <td style="text-align:right; padding-right:10px;"><strong>Bs. {{ number_format($service->invoice->total,2,',','.') }}</strong></td>
                    </tr>
                    @if(isset($service->total_group))

                    <tr>
                        <td colspan="5" style="background-color: #e2e7eb;color: #707478; text-align: right; padding-right:10px;">Subtotal</td>
                        <td style="text-align:right; padding-right:10px;background-color: #2d353c; color: #FFFFFF;">Bs. {{ number_format($service->total_group,2,',','.') }}</td>
                    </tr>

                    @endif
                @endforeach

            </tbody>
        </table>

    </section>


    <section class="table">

        <div class="end">

            <div class="panel-footer">
                TOTAL
            </div>
            <div class="panel-total">
                Bs. {{ number_format($total,2,',','.') }}
            </div>

        </div>

    </section>


    </div>
</body>
</html>

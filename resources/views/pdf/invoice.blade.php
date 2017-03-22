<!DOCTYPE html>
<html lang="es">
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>CAFE - {{ $service->company->name }}</title>
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
            color: black;
        }
        .from{
            font-family: 'Open Sans',"Helvetica Neue",Helvetica,Arial,sans-serif;;
            background-color: transparent;
            width:30%;
            display: inline-block;
            color: black;
        }
        .to{
            font-family: 'Open Sans',"Helvetica Neue",Helvetica,Arial,sans-serif;;
            background-color: transparent;
            width:30%;
            display: inline-block;
            color: black;
        }
        .invoice-data{
            padding-top: 10px;
            font-family: 'Open Sans',"Helvetica Neue",Helvetica,Arial,sans-serif;;
            width:40%;
            text-align: right;
            display: inline-block;
            color: black;
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
            color: black;
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
            color: black;
        }
        .panel-footer{
            font-family: 'Open Sans',"Helvetica Neue",Helvetica,Arial,sans-serif;;
            background-color: #e2e7eb;
            padding: 10px;
            padding-top: 5px;
            width: 63%;
            color: black;
            display: inline-block;
        }
        .panel-total{
            font-family: 'Open Sans',"Helvetica Neue",Helvetica,Arial,sans-serif;;
            background-color: #2d353c;
            padding: 10px;
            padding-top: 5px;
            width: 30%;
            color: white;
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
            color: black;
        }


        @font-face{
            font-family: 'sawasdee';
            src: url('fonts/Sawasdee.ttf') format('truetype');
        }
    </style>

</head>
<body>

    <div class="content">

    <h2>{{ $service->company->name }}</h2>

    <header>
        <div class="from">
            <small>De:</small>
            <address>
                <strong>{{ strtoupper($service->company->name) }}</strong><br>
                RIF: {{ $service->company->rif }}<br>
            </address>
        </div>

        <div class="to">
            <small>Para:</small>
            <address>
                <strong>{{ strtoupper($service->subsidiary->name) }}</strong><br>
                RIF: {{ $service->subsidiary->rif }}
            </address>
        </div>

        <div class="invoice-data">
            <small>Fecha</small><br>
            <strong>{{ $service->date }}</strong>
            <div class="invoice-detail">
                Orden: {{ $service->order }}<br>
            </div>
        </div>
    </header>


    <section class="table">

        <table class="table">
            <thead>
                <tr>
                    <th style="width:200px;">RUTA</th>
                    <th>KM</th>
                    <th>FACTOR</th>
                    <th>RVN</th>
                    <th>RFFS</th>
                    <th style="width:150px; text-align:right;">COSTO</th>
                </tr>
            </thead>
            <tbody>

                @foreach($service->items as $item)
                <tr>
                    <td>{{ $item->route->route }}</td>
                    <td>{{ $item->km }}</td>
                    <td>{{ $item->factor }}</td>
                    <td>{{ $item->night }}</td>
                    <td>{{ $item->holiday }}</td>
                    <td style="text-align:right; padding-right:10px;"><strong>Bs. {{ number_format($item->subtotal,2,',','.') }}</strong></td>
                </tr>
                @endforeach

            </tbody>
        </table>

    </section>


    <section class="table">

        <div class="panel-header">
            MISCELANEOS
        </div>
        @if($service->invoice->wait_daytime!='0' OR $service->invoice->wait_night!='0')
        <div class="panel-body">
            <small><strong>TIEMPO DE ESPERA</strong></small>
            <div class="misc">
                <div style="display: inline-block; width:150px;">
                    <small>Diurno {{ $service->invoice->wait_daytime }} min.</small><br>
                    <small>Nocturno {{ $service->invoice->wait_night }} min.</small>
                </div>
                <div style="display: inline-block; width:100px;">
                    <small>x {{ $service->invoice->factor_wait_daytime }}</small><br>
                    <small>x {{ $service->invoice->factor_wait_night }}</small>
                </div>
                <div style="display: inline-block; width:100px;">
                    <small>+ {{ $service->invoice->wait_holiday }} (RFFS)</small>
                </div>
                <div style="display: inline-block; width:270px; text-align:right;">
                    <small><strong>Bs. {{ number_format($service->invoice->wait_daytime_subtotal,2,',','.') }}</strong></small><br>
                    <small><strong>Bs. {{ number_format($service->invoice->wait_night_subtotal,2,',','.') }}</strong></small>
                </div>
            </div>
        </div>
        @endif

        @if($service->invoice->disposition_daytime!='0' OR $service->invoice->disposition_night!='0')
        <div class="panel-body">
            <small><strong>TIEMPO DE ESPERA A DISPOSICION</strong></small>
            <div class="misc">
                <div style="display: inline-block; width:150px;">
                    <small>Diurno {{ $service->invoice->disposition_daytime }} min.</small><br>
                    <small>Nocturno {{ $service->invoice->disposition_night }} min.</small>
                </div>
                <div style="display: inline-block; width:100px;">
                    <small>x {{ $service->invoice->factor_disposition_daytime }}</small><br>
                    <small>x {{ $service->invoice->factor_disposition_night }}</small>
                </div>
                <div style="display: inline-block; width:100px;">
                    <small>+ {{ $service->invoice->disposition_holiday }} (RFFS)</small>
                </div>
                <div style="display: inline-block; width:270px; text-align:right;">
                    <small><strong>Bs. {{ number_format($service->invoice->disposition_daytime_subtotal,2,',','.') }}</strong></small><br>
                    <small><strong>Bs. {{ number_format($service->invoice->disposition_night_subtotal,2,',','.') }}</strong></small>
                </div>
            </div>
        </div>
        @endif

        @if($service->invoice->sprint_daytime!='0' OR $service->invoice->sprint_night!='0')
        <div class="panel-body">
            <small><strong>CARRERAS LOCALES</strong></small>
            <div class="misc">
                <div style="display: inline-block; width:150px;">
                    <small>
                        Diurnas {{ $service->invoice->sprint_daytime }}
                        {{ ($service->invoice->sprint_daytime == '1') ? 'carrera':'carreras' }}
                    </small><br>
                    <small>
                        Nocturnas {{ $service->invoice->sprint_night }}
                        {{ ($service->invoice->sprint_night == '1') ? 'carrera':'carreras' }}
                    </small>
                </div>
                <div style="display: inline-block; width:100px;">
                    <small>x {{ $service->invoice->factor_sprint_daytime }}</small><br>
                    <small>x {{ $service->invoice->factor_sprint_night }}</small>
                </div>
                <div style="display: inline-block; width:100px;">
                    <small>+ {{ $service->invoice->sprint_holiday }} (RFFS)</small>
                </div>
                <div style="display: inline-block; width:270px; text-align:right;">
                    <small><strong>Bs. {{ number_format($service->invoice->sprint_daytime_subtotal,2,',','.') }}</strong></small><br>
                    <small><strong>Bs. {{ number_format($service->invoice->sprint_night_subtotal,2,',','.') }}</strong></small>
                </div>
            </div>
        </div>
        @endif

        @if($service->invoice->night_tour!='0' OR $service->invoice->overnight!='0')
        <div class="panel-body">
            <small><strong>RECORRIDO NOCTURNO</strong></small>
            <div class="misc">
                <div style="display: inline-block; width:150px;">
                    <small>Recorrido {{ $service->invoice->night_tour }} min.</small>
                </div>
                <div style="display: inline-block; width:100px;">
                    <small>x {{ $service->invoice->factor_night_tour }}</small><br>
                </div>
                <div style="display: inline-block; width:150px;">
                    <small>+ {{ $service->invoice->overnight }} (Pernocta)</small>
                </div>
                <div style="display: inline-block; width:220px; text-align:right;">
                    <small><strong>Bs. {{ number_format($service->invoice->night_tour_subtotal + $service->invoice->overnight ,2,',','.') }}</strong></small><br>
                </div>
            </div>
        </div>
        @endif

        <div class="end" style="margin-top:20px;">

            <div class="panel-footer">
                TOTAL
            </div>
            <div class="panel-total">
                Bs. {{ number_format($service->invoice->total,2,',','.') }}
            </div>

        </div>

    </section>


    </div>
</body>
</html>

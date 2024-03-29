<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>CAFE</title>

	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	{!! Html::style('css/invoice.css') !!}
	<!-- ================== END BASE CSS STYLE ================== -->

</head>
<body>

	<!-- begin invoice -->
	<div class="invoice">
        <div class="invoice-company">
            <span class="pull-right hidden-print">
            </span>
            Company Name, Inc
        </div>
        <div class="invoice-header">
            <div class="invoice-from">
                <small>from</small>
                <address class="m-t-5 m-b-5">
                    <strong>Twitter, Inc.</strong><br />
                    Street Address<br />
                    City, Zip Code<br />
                    Phone: (123) 456-7890<br />
                    Fax: (123) 456-7890
                </address>
            </div>
            <div class="invoice-to">
                <small>to</small>
                <address class="m-t-5 m-b-5">
                    <strong>Company Name</strong><br />
                    Street Address<br />
                    City, Zip Code<br />
                    Phone: (123) 456-7890<br />
                    Fax: (123) 456-7890
                </address>
            </div>
            <div class="invoice-date">
                <small>Invoice / July period</small>
                <div class="date m-t-5">August 3,2012</div>
                <div class="invoice-detail">
                    #0000123DSS<br />
                    Services Product
                </div>
            </div>
        </div>
        <div class="invoice-content">
            <div class="table-responsive">
                <table class="table table-invoice">
                    <thead>
                        <tr>
                            <th>TASK DESCRIPTION</th>
                            <th>RATE</th>
                            <th>HOURS</th>
                            <th>LINE TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                Website design &amp; development<br />
                                <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id sagittis arcu.</small>
                            </td>
                            <td>$50.00</td>
                            <td>50</td>
                            <td>$2,500.00</td>
                        </tr>
                        <tr>
                            <td>
                                Branding<br />
                                <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id sagittis arcu.</small>
                            </td>
                            <td>$50.00</td>
                            <td>40</td>
                            <td>$2,000.00</td>
                        </tr>
                        <tr>
                            <td>
                                Redesign Service<br />
                                <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id sagittis arcu.</small>
                            </td>
                            <td>$50.00</td>
                            <td>50</td>
                            <td>$2,500.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="invoice-price">
                <div class="invoice-price-left">
                    <div class="invoice-price-row">
                        <div class="sub-price">
                            <small>SUBTOTAL</small>
                            $4,500.00
                        </div>
                        <div class="sub-price">
                            <i class="fa fa-plus"></i>
                        </div>
                        <div class="sub-price">
                            <small>PAYPAL FEE (5.4%)</small>
                            $108.00
                        </div>
                    </div>
                </div>
                <div class="invoice-price-right">
                    <small>TOTAL</small> $4508.00
                </div>
            </div>
        </div>
        <div class="invoice-note">
            * Make all cheques payable to [Your Company Name]<br />
            * Payment is due within 30 days<br />
            * If you have any questions concerning this invoice, contact  [Name, Phone Number, Email]
        </div>
        <div class="invoice-footer text-muted">
            <p class="text-center m-b-5">
                THANK YOU FOR YOUR BUSINESS
            </p>
            <p class="text-center">
                <span class="m-r-10"><i class="fa fa-globe"></i> matiasgallipoli.com</span>
                <span class="m-r-10"><i class="fa fa-phone"></i> T:016-18192302</span>
                <span class="m-r-10"><i class="fa fa-envelope"></i> rtiemps@gmail.com</span>
            </p>
        </div>
    </div>
	<!-- end invoice -->

</body>
</html>

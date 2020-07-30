
    <link rel="apple-touch-icon" href="https://pos.ultimatekode.com/vertical/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="https://pos.ultimatekode.com/vertical/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
          rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="https://pos.ultimatekode.com/vertical/app-assets/ltr/vendors.css">
    <link rel="stylesheet" type="text/css" href="https://pos.ultimatekode.com/vertical/app-assets/vendors/css/extensions/unslider.css">
    <link rel="stylesheet" type="text/css"
          href="https://pos.ultimatekode.com/vertical/app-assets/vendors/css/weather-icons/climacons.min.css">
    <link rel="stylesheet" type="text/css" href="https://pos.ultimatekode.com/vertical/app-assets/fonts/meteocons/style.css">
    <link rel="stylesheet" type="text/css" href="https://pos.ultimatekode.com/vertical/app-assets/vendors/css/charts/morris.css">
    <link rel="stylesheet" type="text/css"
          href="https://pos.ultimatekode.com/vertical/app-assets/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css"
          href="https://pos.ultimatekode.com/vertical/app-assets/vendors/css/tables/extensions/buttons.dataTables.min.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN STACK CSS-->
    <link rel="stylesheet" type="text/css" href="https://pos.ultimatekode.com/vertical/app-assets/ltr/app.css">
    <!-- END STACK CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css"
          href="https://pos.ultimatekode.com/vertical/app-assets/ltr/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="https://pos.ultimatekode.com/vertical/app-assets/fonts/simple-line-icons/style.css">
    <link rel="stylesheet" type="text/css"
          href="https://pos.ultimatekode.com/vertical/app-assets/ltr/core/colors/palette-gradient.css">
    <link rel="stylesheet" href="https://pos.ultimatekode.com/vertical/assets/custom/datepicker.min.css?v=6.1">
    <link rel="stylesheet" href="https://pos.ultimatekode.com/vertical/assets/custom/summernote-bs4.css?v=6.1">
    <link rel="stylesheet" type="text/css"
          href="https://pos.ultimatekode.com/vertical/app-assets/vendors/css/forms/selects/select2.min.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="https://pos.ultimatekode.com/vertical/assets/css/style.css?v=6.1">
        <!-- END Custom CSS-->
    
  </head>
<link rel="stylesheet" type="text/css"
      href="https://pos.ultimatekode.com/vertical/app-assets/ltr/core/menu/menu-types/vertical-menu-modern.css">
</head>
<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click"
      data-menu="vertical-menu-modern" data-col="2-columns">
<span id="hdata"
      data-df="dd-mm-yyyy"
      data-curr="$"></span>
<!-- fixed-top-->

<!-- Horizontal navigation-->
<div id="c_body"></div>
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><div class="content-body">
    <div class="card">
        <div class="card-content">
            <div id="notify" class="alert alert-success" style="display:none;">
                <a href="#" class="close" data-dismiss="alert">&times;</a>

                <div class="message"></div>
            </div>
            <div id="thermal_a" class="alert alert-success" style="display:none;">
                <a href="#" class="close" data-dismiss="alert">&times;</a>

                <div class="message"></div>
            </div>
            <div id="invoice-template" class="card-body">
                <div class="row">

                    <div class="">
                        <h2 class="btn btn-oval btn-danger">Canceled</h2>                    </div>
                </div>

                <!-- Invoice Company Details -->
                <div id="invoice-company-details" class="row mt-2">
                    <div class="col-md-6 col-sm-12 text-xs-center text-md-left"><p></p>
                        <img src="https://pos.ultimatekode.com/vertical/userfiles/company/logo.png"
                             class="img-responsive p-1 m-b-2" style="max-height: 120px;">
                        <p class="ml-2">ABC Company</p>
                    </div>
                    <div class="col-md-6 col-sm-12 text-xs-center text-md-right">
                        <h2>INVOICE</h2>
                        <p class="pb-1"> SRN 1009</p>
                            <p class="pb-1">Reference:</p>                        <ul class="px-0 list-unstyled">
                            <li>Gross Amount</li>
                            <li class="lead text-bold-800">$ 0.00</li>
                        </ul>
                    </div>
                </div>
                <!--/ Invoice Company Details -->

                <!-- Invoice Customer Details -->
                <div id="invoice-customer-details" class="row pt-2">
                    <div class="col-sm-12 text-xs-center text-md-left">
                        <p class="text-muted"> Bill To</p>
                    </div>
                    <div class="col-md-6 col-sm-12 text-xs-center text-md-left">
                        <ul class="px-0 list-unstyled">


                            <li class="text-bold-800"><a
                                        href="https://pos.ultimatekode.com/vertical/customers/view?id=52"><strong
                                            class="invoice_a">agus sadeli</strong></a></li><li></li><li>Jakarta</li><li>Jakarta Timur,Indonesia</li><li> Phone: 08987111373</li><li> Email: aguss@webs.co.id</li>

                        </ul>

                    </div>
                    <div class="offset-md-3 col-md-3 col-sm-12 text-xs-center text-md-left">
                        <p><span class="text-muted">Invoice Date  :</span> 27-07-2020</p> <p><span class="text-muted">Due Date :</span> 27-07-2020</p>  <p><span class="text-muted">Terms :</span> Payment On Receipt</p>                    </div>
                </div>
                <!--/ Invoice Customer Details -->

                <!-- Invoice Items Details -->
                <div id="invoice-items-details" class="pt-2">
                    <div class="row">
                        <div class="table-responsive col-sm-12">
                            <table class="table table-striped">
                                <thead>
                                                                    <tr>
                                        <th>#</th>
                                        <th>Description</th>
                                        <th class="text-xs-left">Rate</th>
                                        <th class="text-xs-left">Qty</th>
                                        <th class="text-xs-left">Tax</th>
                                        <th class="text-xs-left"> Discount</th>
                                        <th class="text-xs-left">Amount</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
<th scope="row">1</th>
                            <td>Transfer Sheets</td>                           
                            <td>$ 358.00</td>
                             <td>1.00</td>
                            <td>$ 42.96 (12.00%)</td>
                            <td>$ 4.01 (1.00%)</td>
                            <td>$ 396.95</td>
                        </tr><tr><td colspan=5></td></tr>
                                    </tbody>
                                                            </table>
                        </div>
                    </div>
                    <p></p>
                    <div class="row">
                        <div class="col-md-7 col-sm-12 text-xs-center text-md-left">


                            <div class="row">
                                <div class="col-md-8"><p
                                            class="lead">Payment Status:
                                        <u><strong
                                                    id="pstatus">Canceled</strong></u>
                                    </p>
                                    <p class="lead">Payment Method: <u><strong
                                                    id="pmethod"></strong></u>
                                    </p>

                                    <p class="lead mt-1"><br>Note:</p>
                                    <code>
                                                                            </code>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-12">
                            <p class="lead">Summary</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td>Sub Total</td>
                                        <td class="text-xs-right"> $ 358.00</td>
                                    </tr>
                                    <tr>
                                        <td>Tax</td>
                                        <td class="text-xs-right">$ 42.96</td>
                                    </tr>
                                    <tr>
                                        <td> Discount</td>
                                        <td class="text-xs-right">$ 4.01</td>
                                    </tr>
                                    <tr>
                                        <td> Shipping</td>
                                        <td class="text-xs-right">$ 0.00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold-800">Total</td>
                                        <td class="text-bold-800 text-xs-right"> $ 0.00</td>
                                    </tr>
                                    <tr>
                                        <td>Payment Made</td>
                                        <td class="pink text-xs-right">
                                            (-)  <span id="paymade">$ 0.00</span></td>
                                    </tr>
                                    <tr class="bg-grey bg-lighten-4">
                                        <td class="text-bold-800">Balance Due</td>
                                        <td class="text-bold-800 text-xs-right">  <span id="paydue">$ 0.00</span></strong></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-xs-center">
                                <p>Authorized person</p>
                                <img src="https://pos.ultimatekode.com/vertical/userfiles/employee_sign/sign.png" alt="signature" class="height-100"/>
                                    <h6>(BusinessOwner)</h6>
                                    <p class="text-muted">Business Owner</p>                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <!-- Invoice Footer -->
                    <div class="card"></div>                <div id="invoice-footer">                   

                    <div class="row">

                        <div class="col-md-12 text-center">

                           Gates Tech Online | Buckinghamshire, UK
                        </div>

                    </div>

                </div>
                <!--/ Invoice Footer -->
             
               
               

                              <!-- The container for the uploaded files -->
                <br>

            </div>
        </div>
    </div>
</div>



</body>
</html>

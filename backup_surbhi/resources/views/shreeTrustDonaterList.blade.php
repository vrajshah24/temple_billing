<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box
}
body {
    font-size: 16px;
    font-family: 'Montserrat', sans-serif;
}
@font-face {
  font-family: 'Montserrat';
  src: url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');
}

@font-face {
  font-family: 'Roboto';
  src: url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
}

@font-face {
  font-family: 'Lato';
  src: url('https://fonts.googleapis.com/css2?family=Lato&display=swap');
}

.site-width {
    max-width: 1260px;
    margin: 0 auto;
    padding: 0 20px
}

a {
    text-decoration: none;
    color: currentColor
}

p { 
    margin: 0.25rem;
    line-height: 1.5
}

.page-template-shree_mahavirpurum table,.page-template-shree_foundation table {
    width: 100%
}

.page-template-shree_mahavirpurum table tr td,.page-template-shree_foundation table tr td {
    padding: 5px 0px
}

.button,button,input[type="button"] {
    color: #fff;
    padding: 5px 10px;
    border-radius: 5px;
    background: #212121;
    display: inline-block;
    text-decoration: none;
    border: 0
}

.info {
    width: 1000px
}

.info p:nth-child(1) {
    width: 15%;
    padding-left: 30px !important
}

.info p:nth-child(1) {
    width: 15%;
    padding-left: 30px !important
}

.info p:nth-child(2) {
    width: 20%
}

.info p:nth-child(3) {
    width: 35%
}

.info p:nth-child(4) {
    width: 35%
}

.info p:nth-child(5) {
    width: 15%
}

.price {
    width: 250px
}

li.invoice-wrap {
    display: flex;
    text-align: left;
    padding: 10px;
    position: relative;
    border-bottom: 1px solid
}

li.invoice-wrap:nth-child(even) {
    background: #f4f4f4
}

li.invoice-wrap span {
    left: 10px;
    top: 13px;
    font-weight: bold;
    position: absolute
}

li.invoice-wrap .flex {
    display: flex;    
    align-items: center;
    justify-content: center;
}

li.invoice-wrap .header {
    display: flex
}

li.invoice-wrap .info p {
    flex-grow: 1;
    padding: 0 10px
}

li.invoice-wrap.header {
    color: #fff;
    background: #212121
}

body.page-id-2 .entry-content {
    display: flex;
    min-height: 100vh;
    align-items: center;
    justify-content: space-between
}

body.page-id-2 .entry-content .box-wrap {
    flex-basis: 48%;
    text-align: center;
    font-size: 20px
}

body.page-id-2 .entry-content a {
    display: block;
    padding: 20px;
    box-shadow: 0 0 10px #ccc
}

li.invoice-wrap strong.highlight {
    display: block;
    margin-top: 5px;
    text-transform: uppercase
}
    a{
      color: black; /* Set the link text color to black */
      text-decoration: none; /* Remove underline on the link */
      transition: color 0.3s ease; /* Add transition effect with a delay of 0.3 seconds */
    }
    a:hover {
      text-decoration: none; /* Remove underline on hover */
        color:yellow;
    }
  </style>
  <title>Shree Mahavirpuram | Donaters List</title>
</head>
<body class="page-template page-template-templates page-template-shree_mahavirpurum page-template-templatesshree_mahavirpurum-php page page-id-46 full-width single-author os-windows b-chrome bv-114">
     <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{  url('') }}/home">Home</a>
            </li>
        </ul>
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{  url('') }}/addAdmin">Add Admin</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{  url('') }}/logout">Logout</a>
            </li>
        </ul>
    </div>
</nav>
        <div id="page">
            <div id="main">
                <div id="primary">
                    <div id="content">
                        <div>
                            <p>
                                <center>
                                <img decoding="async" loading="lazy" class="aligncenter size-full wp-image-41" src="{{asset('assets/header-1.jpg')}}" alt="" width="1200" height="239"/>
                                </center>
                            </p>
                            <div id="container" class="invoice-listing" style="display: flex; justify-content: center; flex-wrap: wrap;">
                                <div class="invoice-header">
                                    <ul>
                                        <li class="invoice-wrap header">
                                            <div class="flex info">
                                                <p>Receipt No.</p>
                                                <p>Date</p>
                                                <p>Name</p>
                                                <p>Address</p>
                                                <p>Total</p>
                                            </div>
                                            <div class="flex price">
                                                <p> </p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="each-invoice" style="margin-top: -20px;">
                                    <ol>
                                    
                                    @foreach ($mainInvoices as $row )
                                     
                                        <li class="invoice-wrap">
                                            <div class="flex info">
                                            <p>#{{sprintf('%02d', $row->bill_no);}}</p>
                                                <p>{{$row->master_date}}</p>
                                                <p>{{$row->invoice_client_name}}</p>
                                                <p>{{$row->invoice_client_address}}</p>
                                                <p>{{$row->total_amount}}</p>
                                            </div>
                                            <div class="flex price">
                                                <a class="button" href="{{url('/shreeFoundation/invoiceDetailList/'. $row->invoice_master_id)}}" rel="bookmark">View Invoices</a>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #main -->
            <div class="clear"></div>
        </div>
        <!-- #page -->
        <!-- <script type='text/javascript' src='https://symmetricsolutionz.co.in/payment/wp-includes/js/jquery/jquery.min.js' id='jquery-core-js'></script>
        <script type='text/javascript' src='https://symmetricsolutionz.co.in/payment/wp-includes/js/jquery/jquery-migrate.min.js' id='jquery-migrate-js'></script>
        <script>
            function printDiv() {
                var divContents = document.getElementById("print-invoice").innerHTML;
                var a = window.open('', '', 'height=500, width=500');
                a.document.write('<html>');
                a.document.write('<body >');
                a.document.write(divContents);
                a.document.write('</body></html>');
                a.document.close();
                a.print();
            }
        </script>
        <script type="text/javascript">
            $(".each-invoice li.invoice-wrap").each(function(i) {
                $(this).find("span").text(++i);
            });
        </script> -->
  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>

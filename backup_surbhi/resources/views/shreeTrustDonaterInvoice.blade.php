<!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shree Trust Foundation | Donaters Invoice</title>
 </head>
<body class="shree_mahavirpurum-template-default single single-shree_mahavirpurum postid-36 full-width single-author os-windows b-chrome bv-114">
        <div id="page" class="site site-width">
            <div id="main" class="site-main">
                <style type="text/css">
                    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400&display=swap');
                    body {
                        font-family: 'Roboto', sans-serif;
                    }
                </style>
                <div id="primary" class="content-area">
                    <div id="content" class="site-content site-width" role="main">
                        <div id="print-invoice" style="width: 100%;">
                            <table style="width: 800px;margin: 0 auto;box-sizing: border-box;font-family: 'Roboto-Regular';">
                                <thead>
                                    <tr>
                                        <th style="text-align: center; font-weight: bold;">
                                            <img src="{{asset('assets/header-1.jpg')}}" width="800" height="159">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody style="margin: 20px 0;display: block;">
                                    <tr style="display: block;margin: 10px 0;">
                                        <td style="width: 400px;">
                                            <span style="width:100px;display: inline-block;">Receipt No.:</span>
                                            <span style="width:270px;display: inline-block;border-bottom: 2px solid;">{{$invoicesRes->detail_id}}</span>
                                        </td>
                                        <td style="width: 400px;">
                                            <span style="width:100px;display: inline-block;text-align:right;">Date:</span>
                                            <span style="width:270px;display: inline-block;border-bottom: 2px solid;">{{$invoicesRes->date}}</span>
                                        </td>
                                    </tr>
                                    <tr style="display: block;margin: 10px 0;padding: 5px 0;">
                                        <td style="width: 800px;">
                                            <span style="width:70px;display: inline-block;">Name:</span>
                                            <span style="width:700px;display: inline-block;border-bottom: 2px solid;">{{$invoicesMasterRes->invoice_client_name}}</span>
                                        </td>
                                    </tr>
                                    <tr style="display: block;margin: 10px 0;padding: 5px 0;">
                                        <td style="width: 800px;">
                                            <span style="width:70px;display: inline-block;">Address: </span>
                                            <span style="width:700px;display: inline-block;border-bottom: 2px solid;">{{$invoicesMasterRes->invoice_client_address}}</span>
                                        </td>
                                    </tr>
                                    <tr style="display: block;margin: 10px 0;padding: 5px 0;">
                                        <td style="width: 800px;display: flex;align-items: baseline;">
                                            <span style="width:290px;display: inline-block;">we have received a sum of Rupees (in words) from you with following details.:</span>
                                            <span style="width:500px;display: inline-block;border-bottom: 2px solid;">{{$invoicesRes->amount_in_words}}</span>
                                        </td>
                                    </tr>
                                    <tr style="display: block;margin: 10px 0;padding: 5px 0;">
                                        <td style="width: 800px;display: flex;align-items: baseline;">
                                            <span style="width:290px;display: inline-block;">Pancard Number:</span>
                                            <span style="width:500px;display: inline-block;border-bottom: 2px solid;">{{$invoicesRes->pancard_no}}</span>
                                        </td>
                                    </tr>
                                    
                                    <tr style="display: block;margin: 10px 0;padding: 5px 0;width: 400px;float:left;display: flex;flex-direction: column;">
                                        <td style="width: 400px;margin: 10px 0;padding: 0 10px;box-sizing: border-box;">
                                            <span style="width:135px;display: inline-block;text-align:right;">Building Fund:</span>
                                            <span style="padding: 5px;box-sizing: border-box;width:240px;display: inline-block;border: 2px solid;"> {{$invoicesRes->building_funds}}&nbsp;</span>
                                        </td>
                                        <td style="width: 400px;margin: 10px 0;padding: 0 10px;box-sizing: border-box;">
                                            <span style="width:135px;display: inline-block;text-align:right;">Youth Activities:</span>
                                            <span style="padding: 5px;box-sizing: border-box;width:240px;display: inline-block;border: 2px solid;">{{$invoicesRes->youth_activities}}&nbsp;</span>
                                        </td>
                                        <td style="width: 400px;margin: 10px 0;padding: 0 10px;box-sizing: border-box;">
                                            <span style="width:135px;display: inline-block;text-align:right;">Cultural Programs:</span>
                                            <span style="padding: 5px;box-sizing: border-box;width:240px;display: inline-block;border: 2px solid;">{{$invoicesRes->cultural_programs}}&nbsp;</span>
                                        </td>
                                        <td style="width: 400px;margin: 10px 0;padding: 0 10px;box-sizing: border-box;">
                                            <span style="width:135px;display: inline-block;text-align:right;">Social Awareness:</span>
                                            <span style="padding: 5px;box-sizing: border-box;width:240px;display: inline-block;border: 2px solid;">{{$invoicesRes->social_awareness}}&nbsp;</span>
                                        </td>
                                        <td style="width: 400px;margin: 10px 0;padding: 0 10px;box-sizing: border-box;">
                                            <span style="width:135px;display: inline-block;text-align:right;">Medical Aid:</span>
                                            <span style="padding: 5px;box-sizing: border-box;width:240px;display: inline-block;border: 2px solid;">{{$invoicesRes->medical_aid}}&nbsp;</span>
                                        </td>
                                        <td style="width: 400px;margin: 10px 0;padding: 0 10px;box-sizing: border-box;">
                                            <span style="width:135px;display: inline-block;text-align:right;">Total:</span>
                                            <span style="padding: 5px;box-sizing: border-box;width:240px;display: inline-block;border: 2px solid;"> @if($invoicesRes->payment_method == 'Cash' )
                                                                                                                                                        {{$invoicesRes->cash_amount}}
                                                                                                                                                        @elseif($invoicesRes->payment_method == 'Cheque' )
                                                                                                                                                        {{$invoicesRes->cheque_amount}} &nbsp;</span>
    </td>                                                                                                                                               @endif
                                    </tr>
                                    <tr style="display: block;margin: 10px 0;padding: 5px 0;width: 400px;float:left;display: flex;flex-direction: column;">
                                        <td style="width: 400px;margin: 10px 0;padding: 0 10px;box-sizing: border-box;">
                                            <span style="width:152px;display: inline-block;text-align:right;">By Cash/Cheque No.:</span>
                                            <span style="padding: 5px;box-sizing: border-box;width:220px;display: inline-block;border: 2px solid;">{{$invoicesRes->payment_method}}&nbsp;</span>
                                        </td>
                                        <td style="width: 400px;margin: 10px 0;padding: 0 10px;box-sizing: border-box;">
                                            <span style="width:152px;display: inline-block;text-align:right;">Dated:</span>
                                            <span style="padding: 5px;box-sizing: border-box;width:220px;display: inline-block;border: 2px solid;">{{$invoicesRes->cheque_date}} &nbsp;</span>
                                        </td>
                                        <td style="width: 400px;margin: 10px 0;padding: 0 10px;box-sizing: border-box;">
                                            <span style="width:152px;display: inline-block;text-align:right;">Drawn on:</span>
                                            <span style="padding: 5px;box-sizing: border-box;width:220px;display: inline-block;border: 2px solid;">{{$invoicesRes->drawn_on}} &nbsp;</span>
                                        </td>
                                        <td style="width: 400px;margin: 10px 0;padding: 0 10px;box-sizing: border-box;">
                                            <span style="width:152px;display: inline-block;text-align:right;">Cheque Amount:</span>
                                            <span style="padding: 5px;box-sizing: border-box;width:220px;display: inline-block;border: 2px solid;">{{$invoicesRes->cheque_amount}}&nbsp;</span>
                                        </td>
                                        <td style="width: 400px;margin: 10px 0;padding: 0 10px;box-sizing: border-box;">
                                            <span style="width:152px;display: inline-block;text-align:right;">Cash amount:</span>
                                            <span style="padding: 5px;box-sizing: border-box;width:220px;display: inline-block;border: 2px solid;">{{$invoicesRes->cash_amount}}&nbsp;</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table style="width: 800px;margin: 20px auto 0;box-sizing: border-box;">
                                <tbody>
                                    <tr style="display:flex;">
                                        <td style="width: 400px;">
                                            <ul style="padding: 0;">
                                                <li>Cheque Subject to realization</li>
                                                <li>This receipt must be produced when demanded</li>
                                                <li>Subject to Ahmedabad Jurisdiction</li>
                                            </ul>
                                        </td>
                                        <td style="width: 400px;text-align: right;">
                                            <p style="margin-top: 0;">Authorised Signatory</p>
                                            <p style="margin-top: 0;">&nbsp;</p>
                                            <p style="margin-top: 0;">Shree Mahavirpurum</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <p style="text-align: center;">
                            <input type="button" value="Print Invoice" onclick="printDiv()">
                        </p>
                    </div>
                    <!-- #content -->
                </div>
                <!-- #primary -->
            </div>
            <!-- #main -->
            <div class="clear"></div>
        </div>
        <!-- #page -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" id='jquery-core-js' referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.4.1/jquery-migrate.min.js" integrity="sha512-KgffulL3mxrOsDicgQWA11O6q6oKeWcV00VxgfJw4TcM8XRQT8Df9EsrYxDf7tpVpfl3qcYD96BpyPvA4d1FDQ==" crossorigin="anonymous" id='jquery-migrate-js' referrerpolicy="no-referrer"></script>
        <script>    
            function printDiv() {
                var divContents = document.getElementById("print-invoice").innerHTML;
                var a = window.open('', '', 'height=500, width=500');
                a.document.write(divContents);
                a.document.close();
                a.print();
            }
        </script>
        <script type="text/javascript">
            $(".each-invoice li.invoice-wrap").each(function(i) {
                $(this).find("span").text(++i);
            });
        </script>
    </body>
 </html>
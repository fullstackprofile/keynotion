<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You For Your Order</title>

    <link href="http://fonts.cdnfonts.com/css/gilroy-bold" rel="stylesheet">

    <style type="text/css" media="all">
        sup {
            font-size: 100% !important;
        }
    </style>

    <style type="text/css" media="screen">

        body {
            Margin: 0;
            padding: 0;
            box-sizing: border-box;
            -webkit-text-size-adjust: none;
        }

        table {
            border-spacing: 0;
        }

        td {
            padding: 0;
        }

        img {
            border: 0;
        }

        a {
            text-decoration: none;
        }

        .text-align-left {
            text-align: left;
        }

        .text-align-center {
            text-align: center;
        }

        .p-3 {
            padding: 15px !important;
        }

        .pl-3 {
            padding-left: 15px !important;
        }

        .content-table-p {
            font-style: normal;
            font-weight: 600;
            font-size: 15px;
            line-height: 20px;
            color: #121212;
        }

        .content-table-p-500 {
            font-style: normal;
            font-weight: 500;
            font-size: 15px;
            line-height: 20px;
            color: #121212;
        }

        .content-table-h3 {
            font-style: normal;
            font-weight: 600;
            font-size: 20px;
            color: #000000;
        }

        .content-table-with-border-h3 {
            font-style: normal;
            font-weight: 600;
            font-size: 20px;
            color: #000000;
            padding-left: 30px;
        }

        .product-head > th {
            font-style: normal;
            font-weight: 600;
            font-size: 18px;
            line-height: 25px;
            text-align: center;
            color: #121212;
            padding: 20px;
        }

        .product-head > th {
            width: 25%;
            max-width: 25%;
        }

        .product-head > th:first-child {
            text-align: left;
            width: 50%;
            max-width: 50%;
        }

        .product-body > td {
            font-style: normal;
            font-weight: 500;
            font-size: 15px;
            line-height: 20px;
            color: #121212;
            text-align: center;
            padding: 20px;
        }

        .product-body > td:first-child {
            text-align: left;
            width: 50%;
            max-width: 50%;
        }

        .product-body > td, .product-head > th {
            padding: 5px;
        }

        .header-td {
            background: #801d44;
            background: linear-gradient(90deg, #623D90 0.59%, #9F0B00 100%);
            border-radius: 6px 6px 0 0;
            padding: 10px;
            text-align: center
        }

        .header-td-p {
            font-style: normal;
            font-weight: 700;
            font-size: 24px;
            color: #FFFFFF;
        }

        .congrats-text {
            font-style: normal;
            font-weight: 500;
            color: #121212;
        }

        .quantity-border {
            width: 20px;
            height: 20px;
            margin: auto;
            padding: 10px;
            border-radius: 6px;
            border: 2px solid #801d44;
            /*background: linear-gradient(#FAFAFA, #FAFAFA) padding-box,*/
            /*linear-gradient(to right, #623D90, #9F0B00) border-box;*/
            /*border: 2px solid transparent;*/
        }

        .content-table-p-500 span {
            color: #801d44;
        }

        .border-bottom{
            border-bottom: 3px solid #801d44;
        }

        .content-table-p-500 b {
            font-weight: 600;
        }

        .content-table {
            margin: 20px auto;
            border-radius: 6px;
            border: 2px solid #801d44;
            /*background: linear-gradient(#FFFFFB, #FFFFFB) padding-box,*/
            /*linear-gradient(to right, #623D90, #9F0B00) border-box;*/
            /*border: 2px solid transparent;*/
        }

        .product-table-body td {
            text-align: left;
            border-bottom: 1px solid #B8B8B8;
            font-style: normal;
            font-weight: 500;
            color: #121212;
            padding: 0 20px;
        }

        .without-border-table-body {
            margin: auto;
            text-align: left;
            color: #121212;
        }

        .without-border-table-body th {
            border-bottom: 1px solid #B8B8B8;
            font-style: normal;
            font-weight: 500;
        }

        .without-border-table-body tr:last-child th {
            border-bottom: 0;
        }

        .without-border-table-body b {
            font-style: normal;
            font-weight: 600;
            color: #121212;
        }

        .content-table-with-border {
            margin: 20px auto;
            border-radius: 6px;
            border: 1px solid #801d44;
            /*background: linear-gradient(#FFFFFB, #FFFFFB) padding-box,*/
            /*linear-gradient(to right, #623D90, #9F0B00) border-box;*/
            /*border: 1px solid transparent;            */
        }


        .product-body > td > p:first-child > span {
            /*background: linear-gradient(to right, #623D90, #9F0B00, #623D90, #9F0B00);*/
            /*-webkit-background-clip: text;*/
            /*-webkit-text-fill-color: transparent;*/
            color: #801d44;
            font-style: normal;
            font-weight: 500;
        }

        .product-body > td > p:last-child > span {
            /*background: linear-gradient(to right, #623D90, #9F0B00);*/
            /*-webkit-background-clip: text;*/
            /*-webkit-text-fill-color: transparent;*/
            color: #801d44;
            font-style: normal;
            font-weight: 500;
        }

        .product-table-body th {
            /*background: linear-gradient(#FAFAFA, #FAFAFA) padding-box,*/
            /*linear-gradient(to right, #623D90, #9F0B00) border-box;*/
            border-right: 1px solid #801d44;
            border-bottom: 1px solid #B8B8B8;
            text-align: left;
            font-style: normal;
            font-weight: 500;
            color: #121212;
            padding: 0 20px;
        }

        .without-border-table-body span {
            /*background: linear-gradient(to right, #623D90, #9F0B00);*/
            /*-webkit-background-clip: text;*/
            /*-webkit-text-fill-color: transparent;*/
            color: #801d44;
            font-style: normal;
            font-weight: 600;
        }

    </style>
</head>

<body style="background: #FFFFFB; font-family: 'Gilroy', sans-serif;">
<table style="padding: 30px 0;" width="95%" align="center" cellspacing="0" cellpadding="0" border="0">
    <tbody>
    <tr>
        <td width="100%" align="center">
            <table style="color: #4a4a4a;max-width: 800px" width="100%" align="center" cellspacing="0" cellpadding="0"
                   border="0">
                <tbody>
                <tr>
                    <td valign="top" align="center">
                        <table style="height: 80px;max-width: 800px" width="100%" align="center" cellspacing="0"
                               cellpadding="0" border="0">
                            <tr>
                                <td class="header-td">
                                    <a class="header-td-p">Thank You For Your Order</a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" class="content-table p-3 big-table" style="max-width: 800px" align="center"
                               cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td>
                                    <table style="width: 100%; max-width: 700px"
                                           width="100%" align="center"
                                           cellspacing="0" cellpadding="0" border="0">
                                        <tr>
                                            <td>
                                                <p class="content-table-p-500" style="width:100%;max-width:696px">Hi
                                                    {{$order->company->first_name}} -  {{$order->company->last_name}},</p>
                                                <p class="content-table-p-500"
                                                   style="margin-top:20px;width:100%;max-width:696px">Thanks for your
                                                    order. It’s on-hold until we confirm that payment has been received.
                                                    In the meantime, here’s a reminder of what you ordered:</p>
                                                <p class="content-table-p-500"
                                                   style="margin:20px 0 0 0;width:100%;max-width:696px">If you have
                                                    chosen
                                                    to make the payment via bank transfer/invoice, please use your Order
                                                    ID as the payment reference. Please see our bank details below. We
                                                    will send you the final invoice after we confirm the payment in our
                                                    bank account. Please make the invoice payment within <b>3-4</b>
                                                    working
                                                    days, otherwise your registration will be cancelled. <b>If you are
                                                        not
                                                        able to make the payment within 4 working days kindly send an
                                                        email
                                                        request to <span>finance@key-notion.com</span>.</b></p>
                                                <p class="content-table-p-500"
                                                   style="width:100%;max-width:696px;padding:0;margin:0">Also, if you
                                                    have
                                                    chosen credit card payment/PayPal, we will contact
                                                    you shortly to provide you the final invoice after the confirmation
                                                    of payment in our bank account.</p>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table style="max-width: 700px;"
                                           width="100%" align="center"
                                           cellspacing="0" cellpadding="0" border="0">
                                        <tr>
                                            <td>
                                                <h2 class="content-table-h3" style="margin:40px 0;width: 100%; max-width: 700px;">
                                                    Our bank details</h2>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table style="max-width: 300px;text-align: center"
                                           width="50%" align="center"
                                           cellspacing="0" cellpadding="0" border="0">
                                        <tr>
                                            <td>
                                                <h2 class="content-table-h3 border-bottom" style=";padding: 20px;margin:40px 0;width: 100%; max-width: 700px;">
                                                    Keynotion, S.R.O.:</h2>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table class="content-table-with-border mb-3"
                                           style="max-width: 700px;"
                                           width="100%" align="center"
                                           cellspacing="0" cellpadding="0" border="0">
                                        <tr>
                                            <td>
                                                <table class="without-border-table-body"
                                                       style="max-width: 700px"
                                                       width="95%" align="center"
                                                       cellspacing="0" cellpadding="0" border="0">
                                                    <tr>
                                                        <th class="text-align-left">
                                                            <p class="pl-3">Bank:</p>
                                                            <p class="pl-3">Československá Obchodní Banka, a.s</p>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-align-left">
                                                            <p class="pl-3">Account Number:</p>
                                                            <p class="pl-3">2 9064 1315</p>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-align-left">
                                                            <p class="pl-3">Sort Code:</p>
                                                            <p class="pl-3">0300</p>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-align-left">
                                                            <p class="pl-3">IBAN:</p>
                                                            <p class="pl-3">CZ63 0300 0000 0002 9064 1315</p>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-align-left">
                                                            <p class="pl-3">BIC:</p>
                                                            <p class="pl-3">CEKOCZPP</p>
                                                        </th>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table style="max-width: 300px;text-align: center"
                                           width="50%" align="center"
                                           cellspacing="0" cellpadding="0" border="0">
                                        <tr>
                                            <td>
                                                <h2 class="content-table-h3 border-bottom" style=";padding: 20px;margin:40px 0;width: 100%; max-width: 700px;">
                                                    Keynotion, S.R.O.:</h2>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table class="content-table-with-border mb-3"
                                           style="max-width: 700px;"
                                           width="100%" align="center"
                                           cellspacing="0" cellpadding="0" border="0">
                                        <tr>
                                            <td>
                                                <table class="without-border-table-body"
                                                       style="max-width: 700px"
                                                       width="95%" align="center"
                                                       cellspacing="0" cellpadding="0" border="0">
                                                    <tr>
                                                        <th class="text-align-left">
                                                            <p class="pl-3">Bank:</p>
                                                            <p class="pl-3">Československá Obchodní Banka, a.s</p>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-align-left">
                                                            <p class="pl-3">Account Number:</p>
                                                            <p class="pl-3">2 9064 1315</p>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-align-left">
                                                            <p class="pl-3">Sort Code:</p>
                                                            <p class="pl-3">0300</p>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-align-left">
                                                            <p class="pl-3">IBAN:</p>
                                                            <p class="pl-3">CZ63 0300 0000 0002 9064 1315</p>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-align-left">
                                                            <p class="pl-3">BIC:</p>
                                                            <p class="pl-3">CEKOCZPP</p>
                                                        </th>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table style="max-width: 700px;margin-top: 20px"
                                           width="100%" align="center"
                                           cellspacing="0" cellpadding="0" border="0">
                                        <tr>
                                            <td>
                                                <h2 class="content-table-h3" style="width: 100%; max-width: 700px;">
                                                    [Order # {{$order->order_number}}]
                                                    {{ \Carbon\Carbon::parse(strtotime($order->created_at))->format('d F, Y')}}</h2>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table class="content-table" style="width: 100%; max-width: 700px"
                                           width="100%" align="center"
                                           cellspacing="0" cellpadding="0" border="0">
                                        <tr>
                                            <td>
                                                <table style="max-width: 700px; margin-top: 20px" width="100%"
                                                       align="center"
                                                       cellspacing="0" cellpadding="0" border="0">
                                                    <tr class="product-head">
                                                        <th class="pl-3">Product</th>
                                                        <th>Quantity</th>
                                                        <th>Price</th>
                                                    </tr>
                                                    <tr class="product-body" style="background: #FAFAFA;">
                                                        @foreach($order->order_items as $order_item)
                                                        <td class="pl-3">
                                                            <p>Ticket:
                                                                <span>{{$order_item->ticket_title}}</span>
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p class="quantity-border">{{$order_item->quantity}}</p>
                                                        </td>
                                                        <td>
                                                            <p>{{$order_item->currency}}{{$order_item->price}}</p>
                                                        </td>
                                                        @endforeach
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="p-3">
                                                <table class="content-table-with-border"
                                                       style="max-width: 636px;" width="100%" align="center"
                                                       cellspacing="0" cellpadding="0" border="0">
                                                    <tr>
                                                        <td>
                                                            <table width="100%" align="center"
                                                                   cellspacing="0" cellpadding="0" border="0"
                                                                   class="product-table-body">
                                                                <tr>
                                                                    <th style="width: 40%;max-width: 236px;">
                                                                        <p>Subtotal:</p>
                                                                    </th>
                                                                    <td style="width: 60%;max-width: 320px">
                                                                        <p>{{$order->subtotal}}</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width: 40%;max-width: 236px;">
                                                                        <p>VAT:</p>
                                                                    </th>
                                                                    <td style="width: 60%;max-width: 320px">
                                                                        <p>{{$order->vat}}</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width: 40%;max-width: 236px;">
                                                                        <p>Payment method:</p>
                                                                    </th>
                                                                    <td style="width: 60%;max-width: 320px">
                                                                        <p>{{$order->gateway->name}}</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width: 40%;max-width: 236px;">
                                                                        <p>Total:</p>
                                                                    </th>
                                                                    <td style="width: 60%;max-width: 320px">
                                                                        <p>{{$order->Total}}</p>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>

                                                </table>
                                            </td>
                                        </tr>
                                    </table>

                                </td>
                            </tr>
                            @foreach($order->delegaters as $delegator)
                            <tr>
                                <td>
                                    <table class="content-table-without-border"
                                           style=" background: #FAFAFA;margin-top: 20px;padding: 5px;max-width: 700px"
                                           width="95%" align="center"
                                           cellspacing="0" cellpadding="0" border="0">
                                        <tr>
                                            <td>
                                                <table class="without-border-table-body"
                                                       style="max-width: 636px"
                                                       width="100%" align="center"
                                                       cellspacing="0" cellpadding="0" border="0">
                                                    <tr>
                                                        <th>
                                                            <p><b>Name of Attendee: </b>{{$delegator->full_name}}</p>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            <p><b>Job Title of Attendee: </b>{{$delegator->job_title}}</p>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            <p><b>Email of Attendee: </b><span>{{$delegator->email}}</span>
                                                            </p>
                                                        </th>
                                                    </tr>

                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td>
                                    <h2 class="content-table-with-border-h3" style="width:100%;max-width:700px;">
                                        Billing Address</h2>
                                    <table class="content-table-with-border mb-3"
                                           style="max-width: 700px;"
                                           width="100%" align="center"
                                           cellspacing="0" cellpadding="0" border="0">
                                        <tr>
                                            <td>
                                                <table class="without-border-table-body"
                                                       style="max-width: 700px"
                                                       width="95%" align="center"
                                                       cellspacing="0" cellpadding="0" border="0">
                                                    <tr>
                                                        <th class="text-align-left">
                                                            <p class="pl-3">{{$order->company->first_name}}</p>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-align-left">
                                                            <p class="pl-3">{{$order->company->last_name}}</p>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-align-left">
                                                            <p class="pl-3">{{$order->company->country_region}}</p>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-align-left">
                                                            <p class="pl-3">{{$order->company->street_address}}</p>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-align-left">
                                                            <p class="pl-3">{{$order->company->town_city}}</p>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-align-left">
                                                            <p class="pl-3">{{$order->company->postcode_zip}}</p>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-align-left">
                                                            <p class="pl-3"><span>{{$order->company->phone}}</span></p>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-align-left">
                                                            <p class="pl-3"><span>{{$order->company->email}}</span>
                                                            </p>
                                                        </th>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="text-align-center mt-3 congrats-text">We look forward to fulfilling your
                                        order soon.</p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <p class="text-align-center mt-3 congrats-text">Keynotion Summits and Conferences</p>
        </td>
    </tr>
    </tbody>
</table>

</body>
</html>

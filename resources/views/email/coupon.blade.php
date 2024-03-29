<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        .coupon{
            background: #801d44;
            background: linear-gradient(90deg, #623D90 0.59%, #9F0B00 100%);
            border-radius: 6px 6px 6px 6px;
            text-align: center;
            display: flex;
            padding: 30px 0;
        }
        .coupon_discount{
            width: 100%;
        }
        .coupon_discount >p{
            color: white;
            font-size: 50px;
        }

        .coupon_body{
            width: 60%;
            border: 2px solid white;
            margin-left: 15px;
        }

        .coupon_code{
            width: 35%;
            background-color: white;
            height: 100%;
            border-left:5px dashed #801d44 ;
        }
        .coupon_number{
            width: 100%;
        }
        .coupon_number>p{
            color: white;
            font-size: 25px;
        }
        .coupon_code>p{
            margin-right: 19px;
            color: black;
            font-size: 50px;
        }

        @media screen and (max-width: 478px){
            .coupon_discount >p {
                color: white;
                font-size: 30px;
            }
            .coupon_number>p {
                color: white;
                font-size: 17px;
            }
            .coupon_code {
                /* width: 35%; */
                background-color: white;
                 height: auto;
                border-left: 5px dashed #801d44;
            }
            .coupon_code>p{
                margin-right: 19px;
                color: black;
                font-size: 32px;
            }
            .coupon_body{
                margin-left: 4px;
                height: auto;
            }
            .coupon{
                padding: 10px;
            }
        }
    </style>
</head>
<body style="background: #FFFFFB; font-family: 'Gilroy', sans-serif;">
<p>Hi dear ` {{$coupon->user}}</p>
<p>You have new coupon from Key-notion , you can use it for any event</p>
<div class="coupon"  align="center" cellspacing="0" cellpadding="0" border="0">

    <div class="coupon_body">
        <div class="coupon_discount">
            <p class="coupon_coupon">Discount Coupon</p>
        </div>
        <div class="coupon_number">
            <p>Code: {{$coupon->code}}	</p>
            <p>Expired Date: {{$coupon->expiration_date}} </p>
        </div>

    </div>

    <div class="coupon_code">
        <p >
            SAVE
        </p>
        <p >
            {{$coupon->discount}}{{$coupon->percent_amount}}
        </p>
    </div>
</div>

</body>
</html>

@php
use App\Models\Order;
use App\Models\OrderItem;

$orderDetails = Order::find($data);
$orderItems = OrderItem::where('orderId',$data)->get();
@endphp
<!DOCTYPE html PUBLIC>

<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<meta content="width=device-width" name="viewport"/>
<meta content="IE=edge" http-equiv="X-UA-Compatible"/>
<title></title>
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css"/>
<style type="text/css">
		body {
			margin: 0;
			padding: 0;
		}

		table,
		td,
		tr {
			vertical-align: top;
			border-collapse: collapse;
		}

		* {
			line-height: inherit;
		}

		a[x-apple-data-detectors=true] {
			color: inherit !important;
			text-decoration: none !important;
		}
	</style>
<style id="media-query" type="text/css">
		@media (max-width: 700px) {

			.block-grid,
			.col {
				min-width: 320px !important;
				max-width: 100% !important;
				display: block !important;
			}

			.block-grid {
				width: 100% !important;
			}

			.col {
				width: 100% !important;
			}

			.col_cont {
				margin: 0 auto;
			}

			img.fullwidth,
			img.fullwidthOnMobile {
				max-width: 100% !important;
			}

			.no-stack .col {
				min-width: 0 !important;
				display: table-cell !important;
			}

			.no-stack.two-up .col {
				width: 50% !important;
			}

			.no-stack .col.num2 {
				width: 16.6% !important;
			}

			.no-stack .col.num3 {
				width: 25% !important;
			}

			.no-stack .col.num4 {
				width: 33% !important;
			}

			.no-stack .col.num5 {
				width: 41.6% !important;
			}

			.no-stack .col.num6 {
				width: 50% !important;
			}

			.no-stack .col.num7 {
				width: 58.3% !important;
			}

			.no-stack .col.num8 {
				width: 66.6% !important;
			}

			.no-stack .col.num9 {
				width: 75% !important;
			}

			.no-stack .col.num10 {
				width: 83.3% !important;
			}

			.video-block {
				max-width: none !important;
			}

			.mobile_hide {
				min-height: 0px;
				max-height: 0px;
				max-width: 0px;
				display: none;
				overflow: hidden;
				font-size: 0px;
			}

			.desktop_hide {
				display: block !important;
				max-height: none !important;
			}
		}
	</style>
</head>
<body class="clean-body" style="margin: 0; padding: 0; -webkit-text-size-adjust: 100%; background-color: #4f4fef;">
<table bgcolor="#4f4fef" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="table-layout: fixed; vertical-align: top; min-width: 320px; border-spacing: 0; border-collapse: collapse;   background-color: #4f4fef; width: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td style="word-break: break-word; vertical-align: top;" valign="top">
<div style="background-color:#4f4fef;">
<div class="block-grid" style="min-width: 320px; max-width: 680px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
<div class="col num12" style="min-width: 320px; max-width: 680px; display: table-cell; vertical-align: top; width: 680px;">
<div class="col_cont" style="width:100% !important;">
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
<table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse;   min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
<table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" height="20" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse;   border-top: 0px solid transparent; height: 20px; width: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td height="20" style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<div align="center" class="img-container center fixedwidth" style="padding-right: 0px;padding-left: 0px;">
	<a href="www.example.com" style="outline:none" tabindex="-1" target="_blank"> <img align="center" alt="Mama's bakery Logo" border="0" class="center fixedwidth" src="{{ asset('images/logo.svg') }}" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 30px; display: block;" title="Mama's bakery Logo" width="170"/></a>
</div>
<table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse;   min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
<table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" height="20" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse;   border-top: 0px solid transparent; height: 20px; width: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td height="20" style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<div align="center" class="img-container center fixedwidth fullwidthOnMobile" style="padding-right: 0px;padding-left: 0px;">
	<a href="www.example.com" style="outline:none" tabindex="-1" target="_blank"> <img align="center" alt="" border="0" class="center fixedwidth fullwidthOnMobile" src="{{ asset('images/invoiceMail.png') }}" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; display: block;" width="306"/></a>
</div>
<table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse;   min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
<table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" height="0" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse;   border-top: 0px solid transparent; height: 0px; width: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td height="0" style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<div style="color:#f7f7fc;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.5;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
<div style="line-height: 1.5; font-size: 12px; color: #f7f7fc; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;">
<p style="font-size: 14px; line-height: 1.5; word-break: break-word; text-align: center; margin: 0;"><strong><span style="font-size: 30px;">Hi <span style="text-transform: uppercase;">{{ $orderDetails->firstname }},</span> </span></strong></p>
<p style="font-size: 14px; line-height: 1.5; word-break: break-word; text-align: center; margin: 0;"><strong><span style="font-size: 30px;">Good things are coming your way</span></strong></p>
</div>
</div>
<div style="color:#f7f7fc;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.8;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
<div style="line-height: 1.8; font-size: 12px; color: #f7f7fc; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;">
	<p style="font-size: 18px; line-height: 1.8; word-break: break-word; text-align: center; margin: 0;"><span style="font-size: 18px;">We're getting your order ready.</span></p>
<p style="font-size: 18px; line-height: 1.8; word-break: break-word; text-align: center; margin: 0;"><span style="font-size: 18px;">We'll drop you another email when your order ships.</span></p>
</div>
</div>
<table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse;   min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
<table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" height="5" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse;   border-top: 0px solid transparent; height: 5px; width: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td height="5" style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
<div style="background-color:#4f4fef;">
<div class="block-grid" style="min-width: 320px; max-width: 680px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: #f7f7fc;border-top-left-radius: 15px;border-top-right-radius: 15px;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:#f7f7fc;border-top-left-radius: 15px;border-top-right-radius: 15px;">
<div class="col num12" style="min-width: 320px; max-width: 680px; display: table-cell; vertical-align: top; width: 680px;">
<div class="col_cont" style="width:100% !important;">
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
<table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse;   min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
<table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" height="0" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse;   border-top: 0px solid transparent; height: 0px; width: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td height="0" style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
<div style="background-color:#4f4fef;">
<div class="block-grid two-up" style="min-width: 320px; max-width: 680px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: #f7f7fc;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;padding-bottom: 25px;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:#f7f7fc;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;">
<div class="col num6" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 336px; width: 340px;">
<div class="col_cont" style="width:100% !important;">
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
<div style="color:#626262;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:5px;padding-left:35px;">
<div style="line-height: 1.2; font-size: 12px; color: #626262; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;">
<p style="font-size: 14px; line-height: 1.2; word-break: break-word; margin: 0;">Invoice for</p>
</div>
</div>
<div style="color:#030303;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.2;padding-top:15px;padding-right:10px;padding-bottom:10px;padding-left:35px;">
<div style="line-height: 1.2; font-size: 12px; color: #030303; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;">
<p style="font-size: 18px; line-height: 1.2; word-break: break-word; margin: 0;"><span style="font-size: 18px;text-transform: uppercase;"><strong><span >{{ $orderDetails->firstname }} {{ $orderDetails->lastname }}</span></strong></span></p>
</div>
</div>
<div style="color:#626262;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:0px;padding-left:35px;">
<div style="line-height: 1.2; font-size: 12px; color: #626262; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;">
<p style="font-size: 14px; line-height: 1.2; word-break: break-word; margin: 0;">{{ $orderDetails->streetAddress }}</p>
</div>
</div>
<div style="color:#626262;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:0px;padding-left:35px;">
<div style="line-height: 1.2; font-size: 12px; color: #626262; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;">
<p style="font-size: 14px; line-height: 1.2; word-break: break-word; margin: 0;"></p>
</div>
</div>
</div>
</div>
</div>
<div class="col num6" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 336px; width: 340px;">
<div class="col_cont" style="width:100% !important;">
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
<div style="color:#626262;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:5px;padding-left:35px;">
<div style="line-height: 1.2; font-size: 12px; color: #626262; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;">
<p style="font-size: 14px; line-height: 1.2; word-break: break-word; margin: 0;">Order ID: <small> @if ($orderDetails->paymentType != 'cash'){{ $orderDetails->paymentId }} @endif </small></p>
</div>
</div>
<div style="color:#030303;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.2;padding-top:15px;padding-right:10px;padding-bottom:10px;padding-left:35px;">
<div style="line-height: 1.2; font-size: 12px; color: #030303; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;">
<p style="font-size: 14px; line-height: 1.2; word-break: break-word; margin: 0;"><strong><span style="font-size: 20px;"><span><small></small></span></span></strong></p>
</div>
</div>
<div align="left" class="button-container" style="padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:35px;">
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div style="background-color:#4f4fef;">
	<div style="margin: auto;max-width: 655px;width: 100%;height: 1px;background-image: linear-gradient(to right, #ebebeb 0%, #ebebeb 50%, transparent 50%);background-size: 25px 1px;background-repeat: repeat-x;"></div>
<div class="block-grid" style="min-width: 320px; max-width: 680px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: #f7f7fc;border-top-left-radius: 15px;border-top-right-radius: 15px;padding-top: 25px;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:#f7f7fc;border-top-left-radius: 15px;border-top-right-radius: 15px;">
<div class="col num12" style="min-width: 320px; max-width: 680px; display: table-cell; vertical-align: top; width: 680px;">
<div class="col_cont" style="width:100% !important;">
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">


<div style="color:#626262;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:5px;padding-left:35px;">
<div style="line-height: 1.2; font-size: 12px; color: #626262; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;">
<p style="font-size: 14px; line-height: 1.2; word-break: break-word; margin: 0;">Number of order</p>
</div>
</div>
<div align="left" class="button-container" style="padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:35px;">
<div style="text-decoration:none;display:inline-block;color:#e17370;background-color:#f9d5d5;border-radius:4px;-webkit-border-radius:4px;-moz-border-radius:4px;width:auto; width:auto;;border-top:0px solid #8a3b8f;border-right:0px solid #8a3b8f;border-bottom:0px solid #8a3b8f;border-left:0px solid #8a3b8f;padding-top:0px;padding-bottom:0px;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;text-align:center;word-break:keep-all;"><span style="padding-left:20px;padding-right:20px;font-size:16px;display:inline-block;"><span style="font-size: 16px; line-height: 2; word-break: break-word;">{{ Order::countTotalOrderItems($orderDetails->id) }}</span></span></div>
</div>
<table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse;   min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 5px; padding-right: 5px; padding-bottom: 5px; padding-left: 5px;" valign="top">
<table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" height="0" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse;   border-top: 0px solid transparent; height: 0px; width: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td height="0" style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
@foreach ($orderItems as $orderItem)
@php
$img = \App\Models\Product::getProductImg($orderItem->productId)
@endphp
<div style="background-color:transparent;">
<div class="block-grid three-up" style="min-width: 320px; max-width: 680px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: #f7f7fc;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:#f7f7fc;">
<div class="col num3" style="display: table-cell;vertical-align: top;max-width: 320px;min-width: 91px;width: 91px;">
<div class="col_cont" style="width:100% !important;">
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 10px;">
<div align="center" class="img-container center fixedwidth fullwidthOnMobile" style="padding-right: 20px;padding-left: 20px;">
<div style="font-size:1px;line-height:20px"> </div><a href="www.example.com" style="outline:none" tabindex="-1" target="_blank"> <img align="center" alt="Blueberry Coffee Donut" border="0" class="center fixedwidth fullwidthOnMobile" src="{{ asset('uploads/product/'. $img) }}" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 80px; display: block;background-color: #f9d5d5;border-radius: 10px;" title="Blueberry Coffee Donut" width="120"/></a>
</div>
</div>
</div>
</div><div class="col num3" style="display: table-cell;vertical-align: top;max-width: 320px;min-width: 130px;width: 130px;">
<div class="col_cont" style="width:100% !important;">
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
<table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse;   min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
<table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" height="5" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse;   border-top: 0px solid transparent; height: 5px; width: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td height="5" style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<div style="color:#232323;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:0px;padding-left:35px;">
<div style="line-height: 1.2; font-size: 12px; color: #232323; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;">
<p style="font-size: 17px; line-height: 1.2; word-break: break-word;  margin: 0;"><span style="font-size: 17px; ">{{ \App\Models\Product::getProductName($orderItem->productId) }}</span></p>
</div>
</div><div style="color:#848484;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.5;padding-top:0px;padding-right:10px;padding-bottom:0px;padding-left:35px;">
<div style="line-height: 1.5; font-size: 12px; color: #848484; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;">
<p style="font-size: 14px; line-height: 1.5; word-break: break-word; margin: 0;"><span style="font-size: 14px;color: #9e9fb4 "><small>@if ($orderItem->sizeName != '')({{ $orderItem->sizeName }}) @endif</small></span></p>
<p style="font-size: 14px; line-height: 1.5; word-break: break-word; margin: 0;"><span style="font-size: 14px;">{{ $orderItem->productNote }}</span></p>
</div>
</div>
</div>
</div>
</div><div class="col num3" style="display: table-cell;vertical-align: top;max-width: 320px;min-width: 21px;width: 55px;">
	<div class="col_cont" style="width:100% !important;">
	<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
	<div class="mobile_hide">
	<table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse;   min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
	<tbody>
	<tr style="vertical-align: top;" valign="top">
	<td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
	<table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" height="10" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse;   border-top: 0px solid transparent; height: 10px; width: 100%;" valign="top" width="100%">
	<tbody>
	<tr style="vertical-align: top;" valign="top">
	<td height="10" style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
	</tr>
	</tbody>
	</table>
	</td>
	</tr>
	</tbody>
	</table>
	</div>
	<div style="color:#555555;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:35px;">
	<div style="line-height: 1.2; font-size: 12px; color: #555555; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;">
	<p style="font-size: 14px; line-height: 1.2; word-break: break-word; margin: 0;color: #9e9fb4"><small>{{ $orderItem->quantity }} x</small></p>
	</div>
	</div>
	</div>
	</div>
	</div><div class="col num3" style="display: table-cell;vertical-align: top;max-width: 320px;min-width: 21px;width: 55px;">
<div class="col_cont" style="width:100% !important;">
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
<div class="mobile_hide">
<table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse;   min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
<table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" height="10" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse;   border-top: 0px solid transparent; height: 10px; width: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td height="10" style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</div>
<div style="color:#555555;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:35px;">
<div style="line-height: 1.2; font-size: 12px; color: #555555; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;">
<p style="font-size: 14px; line-height: 1.2; word-break: break-word; margin: 0;">$ {{ $orderItem->totalPrice }}</p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
@endforeach


<div style="background-color:#4f4fef;">
<div class="block-grid" style="min-width: 320px; max-width: 680px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: #f7f7fc;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:#f7f7fc;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;">
<div class="col num12" style="min-width: 320px; max-width: 680px; display: table-cell; vertical-align: top; width: 680px;">
<div class="col_cont" style="width:100% !important;">
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
<table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse;   min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 5px; padding-right: 5px; padding-bottom: 5px; padding-left: 5px;" valign="top">
<table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" height="5" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse;   border-top: 0px solid transparent; height: 5px; width: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td height="5" style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>

<table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse;   min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 5px; padding-right: 5px; padding-bottom: 5px; padding-left: 5px;" valign="top">
<table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" height="0" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse;   border-top: 0px solid transparent; height: 0px; width: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td height="0" style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse;   min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 5px; padding-right: 5px; padding-bottom: 5px; padding-left: 5px;" valign="top">
<table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" height="0" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse;   border-top: 0px solid transparent; height: 0px; width: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td height="0" style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
<div style="background-color:transparent;">
<div style="margin: auto;max-width: 655px;width: 100%;height: 1px;background-image: linear-gradient(to right, #ebebeb 0%, #ebebeb 50%, transparent 50%);background-size: 25px 1px;background-repeat: repeat-x;"></div>
<div class="block-grid three-up no-stack" style="min-width: 320px; max-width: 680px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: #f7f7fc;border-top-left-radius: 15px;border-top-right-radius: 15px;padding-top: 25px;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:#f7f7fc;border-top-left-radius: 15px;border-top-right-radius: 15px;">
<div class="col num3" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 168px; width: 170px;">
<div class="col_cont" style="width:100% !important;">
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
<div style="color:#848484;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.5;padding-top:10px;padding-right:10px;padding-bottom:0px;padding-left:35px;">
<div style="line-height: 1.5; font-size: 12px; color: #848484; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;">
<p style="font-size: 14px; line-height: 1.5; word-break: break-word; text-align: left; margin: 0;"><span style="font-size: 14px;">Sub-total</span></p>
</div>
</div>
</div>
</div>
</div>
<div class="col num6" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 336px; width: 340px;">
<div class="col_cont" style="width:100% !important;">
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
<div class="mobile_hide">
<table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse;   min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
<table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" height="5" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse;   border-top: 0px solid transparent; height: 5px; width: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td height="5" style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div><div class="col num3" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 168px; width: 170px;">
<div class="col_cont" style="width:100% !important;">
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
<div style="color:#666666;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.5;padding-top:10px;padding-right:10px;padding-bottom:0px;padding-left:35px;">
<div style="line-height: 1.5; font-size: 12px; color: #666666; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;">
<p style="font-size: 14px; line-height: 1.5; word-break: break-word; text-align: left; margin: 0;"><span style="font-size: 14px;">$ {{ $orderDetails->totalPrice }}</span></p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div style="background-color:transparent;">
<div class="block-grid three-up" style="min-width: 320px; max-width: 680px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: #f7f7fc;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:#f7f7fc;">
<div class="col num3" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 168px; width: 170px;">
<div class="col_cont" style="width:100% !important;">
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
<div style="color:#848484;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.5;padding-top:10px;padding-right:10px;padding-bottom:0px;padding-left:35px;">
<div style="line-height: 1.5; font-size: 12px; color: #848484; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;">
<p style="font-size: 14px; line-height: 1.5; word-break: break-word; text-align: left; margin: 0;"><span style="font-size: 14px;">Shipping</span></p>
</div>
</div></div>
</div>
</div>
<div class="col num6" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 336px; width: 340px;">
<div class="col_cont" style="width:100% !important;">
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
<div class="mobile_hide">
<table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse;   min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
<table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" height="5" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse;   border-top: 0px solid transparent; height: 5px; width: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td height="5" style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
<div class="col num3" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 168px; width: 170px;">
<div class="col_cont" style="width:100% !important;">
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
<div style="color:#666666;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.5;padding-top:10px;padding-right:10px;padding-bottom:0px;padding-left:35px;">
<div style="line-height: 1.5; font-size: 12px; color: #666666; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;">
<p style="font-size: 14px; line-height: 1.5; word-break: break-word; text-align: left; margin: 0;"><span style="font-size: 14px;">FREE</span></p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div style="background-color:transparent;">
<div class="block-grid three-up" style="min-width: 320px; max-width: 680px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: #f7f7fc;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:#f7f7fc;">
<div class="col num3" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 168px; width: 170px;">
<div class="col_cont" style="width:100% !important;">
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
<div style="color:#030303;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.2;padding-top:15px;padding-right:10px;padding-bottom:10px;padding-left:35px;">
<div style="line-height: 1.2; font-size: 12px; color: #030303; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;">
<p style="font-size: 18px; line-height: 1.2; word-break: break-word; margin: 0;"><span style="font-size: 18px;"><strong><span>Total</span></strong></span></p>
</div>
</div>
</div>
</div>
</div><div class="col num6" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 336px; width: 340px;">
<div class="col_cont" style="width:100% !important;">
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
<div class="mobile_hide">
<table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse;   min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
<table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" height="5" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse;   border-top: 0px solid transparent; height: 5px; width: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td height="5" style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div><div class="col num3" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 168px; width: 170px;">
<div class="col_cont" style="width:100% !important;">
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
<div style="color:#030303;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.2;padding-top:15px;padding-right:10px;padding-bottom:10px;padding-left:35px;">
<div style="line-height: 1.2; font-size: 12px; color: #030303; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;">
<p style="font-size: 14px; line-height: 1.2; word-break: break-word; margin: 0;"><strong><span style="font-size: 20px;"><span>$ {{ $orderDetails->totalPrice }}</span></span></strong></p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div style="background-color:transparent;">
	<div class="block-grid mixed-two-up" style="min-width: 320px; max-width: 680px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: #f7f7fc;">
	<div style="border-collapse: collapse;display: table;width: 100%;background-color:#f7f7fc;">
	<div class="col num9" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 504px; width: 510px;">
	<div class="col_cont" style="width:100% !important;">
	<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-bottom:30px; padding-right: 0px; padding-left: 0px;">
	<div style="color:#848484;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.5;padding-right:10px;padding-bottom:0px;padding-left:35px;">
	<div style="line-height: 1.5; font-size: 12px; color: #848484; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;">
		<div style="color:#393d47;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.8;padding-right:35px;padding-bottom:10px;">
			<div style="line-height: 1.8; font-size: 12px; color: #393d47; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;">
				<div style=" font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Arial,'Karla'; font-size: 16px; line-height: 26px; font-weight: bold; color: #666363; padding: 8px 0;" align="left" bgcolor="#f7f7fc" valign="middle">
					<h3 data-key="1468272_payment_info" style="font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Arial,'Karla'; color: #bdbdbd; font-size: 16px; line-height: 52px; font-weight: 700; text-transform: uppercase; border-bottom-width: 0; border-bottom-color: #dadada; border-bottom-style: solid; letter-spacing: 1px; margin: 0;" align="left">Payment Info</h3>
					<div width="40" style=" font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Arial,'Karla'; font-size: 16px; line-height: 26px; font-weight: bold; color: #666363; padding: 8px 10px 8px 0;" align="left" bgcolor="#f7f7fc" valign="middle">
						@if($orderDetails->cardBrand == 'mastercard')
						<img width="40" style="width: 40px; vertical-align: middle; height: auto !important; font-weight: bold;" alt="Mastercard Icon" src="{{ asset('images/mobile-receipt-mastercard.png') }}">
						@elseif($orderDetails->cardBrand == 'visa')
						<img width="40" style="width: 40px; vertical-align: middle; height: auto !important; font-weight: bold;" alt="Mastercard Icon" src="{{ asset('images/visa.png') }}">
						@elseif($orderDetails->cardBrand == 'amex')
						<img width="40" style="width: 40px; vertical-align: middle; height: auto !important; font-weight: bold;" alt="Mastercard Icon" src="{{ asset('images/American-Express-Logo-Small.png') }}">
						@elseif($orderDetails->cardBrand == 'cartes_bancaires')
						<img width="40" style="width: 40px; vertical-align: middle; height: auto !important; font-weight: bold;" alt="Mastercard Icon" src="{{ asset('images/cartes_bancaires.jpg') }}">
						@elseif($orderDetails->cardBrand == 'diners_club')
						<img width="40" style="width: 40px; vertical-align: middle; height: auto !important; font-weight: bold;" alt="Mastercard Icon" src="{{ asset('images/diners-club-international-logo.png') }}">
						@elseif($orderDetails->cardBrand == 'discover')
						<img width="40" style="width: 40px; vertical-align: middle; height: auto !important; font-weight: bold;" alt="Mastercard Icon" src="{{ asset('images/discover-network.png') }}">
						@elseif($orderDetails->cardBrand == 'jcb')
						<img width="40" style="width: 40px; vertical-align: middle; height: auto !important; font-weight: bold;" alt="Mastercard Icon" src="{{ asset('images/jcb.svg') }}">
						@elseif($orderDetails->cardBrand == 'unionpay')
						<img width="40" style="width: 40px; vertical-align: middle; height: auto !important; font-weight: bold;" alt="Mastercard Icon" src="{{ asset('images/unionpay.svg') }}">
						@endif
					<span class="table-muted" style="font-size: 14px; font-weight: bold; color: #bdbdbd; font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Arial,'Karla';"> (•••••••••••• {{ $orderDetails->last4 }})</span>
				  </div>
				</div>
			</div>
		</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	<div class="col num3" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 168px; width: 170px;padding-top: 57px;">
	<div class="col_cont" style="width:100% !important;">
	<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
	<div style="color:#666666;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.5;padding-top:10px;padding-right:10px;padding-bottom:0px;padding-left:35px;">
	<div style="line-height: 1.5; font-size: 12px; color: #666666; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;">
	<p style="font-size: 14px; line-height: 1.5; word-break: break-word; text-align: left; margin: 0;"><span style="font-size: 14px;">$ {{ $orderDetails->totalPrice }}</span></p>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>

	<div style="background-color:transparent;">
	<div class="block-grid mixed-two-up" style="min-width: 320px; max-width: 680px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: #f7f7fc;">
	<div style="border-collapse: collapse;display: table;width: 100%;background-color:#f7f7fc;">
	<div class="col num9" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 504px; width: 510px;">
	<div class="col_cont" style="width:100% !important;">
	<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-bottom:30px; padding-right: 0px; padding-left: 0px;">
	<div style="color:#848484;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.5;padding-right:10px;padding-bottom:0px;padding-left:35px;">
	<div style="line-height: 1.5; font-size: 12px; color: #848484; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;">
		<div style="color:#393d47;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.8;padding-right:35px;padding-bottom:10px;">
			<div style="line-height: 1.8; font-size: 12px; color: #393d47; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;">
				<div style=" font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Arial,'Karla'; font-size: 16px; line-height: 26px; font-weight: bold; color: #666363; padding: 8px 0;" align="left" bgcolor="#f7f7fc" valign="middle">
					<h3 data-key="1468273_bill_to" style="font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Arial,'Karla'; color: #bdbdbd; font-size: 16px; line-height: 52px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; margin: 0;" align="left">Delivery To</h3>
					<div width="40" style=" font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Arial,'Karla'; font-size: 16px; line-height: 26px; font-weight: bold; color: #666363; padding: 8px 10px 8px 0;" align="left" bgcolor="#f7f7fc" valign="middle">
						<p style=" font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Arial,'Karla'; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; margin: 0;" align="left">{{ $orderDetails->firstname }}{{ $orderDetails->lastname }}<br>
							{{ $orderDetails->company }} <br>
							{{ $orderDetails->streetAddress }} <br>
							{{ $orderDetails->floor }} <br>
							{{ $orderDetails->cityName }} <br>
							{{ $orderDetails->postCode }}<br>
							{{ $orderDetails->email }} <br></p>
				  </div>
				</div>
			</div>
			</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	<div class="col num3" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 168px; width: 170px;">
		<div class="col_cont" style="width:100% !important;">
		<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
		<div style="color:#666666;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.5;padding-right:10px;padding-bottom:0px;">
		<div style="line-height: 1.5; font-size: 12px; color: #666666; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;">
			<div style=" font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Arial,'Karla'; font-size: 16px; line-height: 26px; font-weight: bold; color: #666363; padding: 8px 0;" align="left" bgcolor="#f7f7fc" valign="middle">
				<h3 data-key="1468273_bill_to" style="font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Arial,'Karla'; color: #bdbdbd; font-size: 16px; line-height: 52px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; margin: 0;" align="left">Placed at</h3>
		<p style="font-size: 14px; line-height: 1.5; word-break: break-word; text-align: left; margin: 0;"><span style="font-size: 35px;">{{ \Carbon\Carbon::parse($orderDetails->created_at)->format('H:m') }}</span></p>
		</div>
		</div>
	</div>
		</div>
		</div>
		<div class="col num3" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 168px; width: 170px;">
			<div class="col_cont" style="width:100% !important;">
			<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
			<div style="color:#666666;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.5;padding-right:10px;padding-bottom:0px;">
			<div style="line-height: 1.5; font-size: 12px; color: #666666; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;">
				<div style=" font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Arial,'Karla'; font-size: 16px; line-height: 26px; font-weight: bold; color: #666363; padding: 8px 0;" align="left" bgcolor="#f7f7fc" valign="middle">
					<h3 data-key="1468273_bill_to" style="font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Arial,'Karla'; color: #bdbdbd; font-size: 16px; line-height: 52px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; margin: 0;" align="left">Est. Arrival</h3>
			<p style="font-size: 14px; line-height: 1.5; word-break: break-word; text-align: left; margin: 0;"><span style="font-size: 35px;">{{ \Carbon\Carbon::parse($orderDetails->deliveryTime)->format('H:m') }}</span></p>
			</div>
			</div>
		</div>
			</div>
			</div>
			</div>
		</div>
		
	</div>
	</div>
	</div>
<div style="background-color:#4f4fef;">
<div class="block-grid" style="min-width: 320px; max-width: 680px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: #f7f7fc;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:#f7f7fc;">
<div class="col num12" style="min-width: 320px; max-width: 680px; display: table-cell; vertical-align: top; width: 680px;">
<div class="col_cont" style="width:100% !important;">
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
<table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse;   min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
<table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse;   border-top: 1px solid #D6D3D3; width: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse;   min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 5px; padding-right: 5px; padding-bottom: 5px; padding-left: 5px;" valign="top">
<table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" height="0" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse;   border-top: 0px solid transparent; height: 0px; width: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td height="0" style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<div style="color:#030303;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.2;padding-top:15px;padding-right:10px;padding-bottom:10px;padding-left:35px;">
<div style="line-height: 1.2; font-size: 12px; color: #030303; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;">
<p style="font-size: 18px; line-height: 1.2; word-break: break-word; margin: 0;"><span style="font-size: 18px;"><strong><span>Order Note</span></strong></span></p>
</div>
</div>
<div style="color:#393d47;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.8;padding-top:10px;padding-right:35px;padding-bottom:10px;padding-left:35px;">
<div style="line-height: 1.8; font-size: 12px; color: #393d47; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;">
<p style="font-size: 14px; line-height: 1.8; word-break: break-word; margin: 0;">{{ $orderDetails->orderNote }}</p>
</div>
</div>
<div align="center" class="button-container" style="padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:35px;">
</div>
<table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse;   min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 5px; padding-right: 5px; padding-bottom: 5px; padding-left: 5px;" valign="top">
<table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" height="10" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse;   border-top: 0px solid transparent; height: 10px; width: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td height="10" style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
<div style="background-color:transparent;">
<div class="block-grid" style="min-width: 320px; max-width: 680px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: #ffb0af;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:#ffb0af;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;">
<div class="col num12" style="min-width: 320px; max-width: 680px; display: table-cell; vertical-align: top; width: 680px;">
<div class="col_cont" style="width:100% !important;">
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
<div style="color:#393d47;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
<div style="line-height: 1.2; font-size: 12px; color: #393d47; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;">
<p style="font-size: 14px; line-height: 1.2; word-break: break-word; text-align: center; margin: 0;"><strong>{{ \Carbon\Carbon::parse($orderDetails->created_at)->format('F d, Y H:m') }} <br></strong></p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div style="background-color:transparent;">
<div style="margin: auto;max-width: 655px;width: 100%;height: 1px;background-image: linear-gradient(to right, #ebebeb 0%, #ebebeb 50%, transparent 50%);background-size: 25px 1px;background-repeat: repeat-x;"></div>
<div class="block-grid" style="min-width: 320px; max-width: 680px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: #3939ad;border-top-left-radius: 15px;border-top-right-radius: 15px;padding-top: 25px;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:#3939ad;border-top-left-radius: 15px;border-top-right-radius: 15px;padding-top: 25px;">
<div class="col num12" style="min-width: 320px; max-width: 680px; display: table-cell; vertical-align: top; width: 680px;">
<div class="col_cont" style="width:100% !important;">
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
<table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse;   min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
<table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" height="0" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse;   border-top: 0px solid transparent; height: 0px; width: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td height="0" style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<div style="color:#f7f7fc;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.5;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
<div style="line-height: 1.5; font-size: 12px; color: #f7f7fc; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;">
<p style="font-size: 16px; line-height: 1.5; word-break: break-word; text-align: center; margin: 0;"><span style="font-size: 16px;">Thanks, ❤️</span></p>
<p style="font-size: 16px; line-height: 1.5; word-break: break-word; text-align: center; margin: 0;"><span style="font-size: 16px;">Super Mario team</span></p>
</div>
</div>
<table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse;   min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
<table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse;   border-top: 1px solid #f7f7fc; width: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
<div style="background-color:transparent;">
<div class="block-grid" style="min-width: 320px; max-width: 680px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: #3939ad;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:#3939ad;">
<div class="col num12" style="min-width: 320px; max-width: 680px; display: table-cell; vertical-align: top; width: 680px;">
<div class="col_cont" style="width:100% !important;">

<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
<div style="color:#f7f7fc;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.5;padding-top:10px;padding-right:10px;padding-bottom:0px;padding-left:35px;">
<div style="line-height: 1.5; font-size: 12px; color: #f7f7fc; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;">
<p style="font-size: 16px; line-height: 1.5; word-break: break-word; text-align: left; margin: 0;"><span style="font-size: 16px;">Notice something wrong?</span></p>
</div>
</div>
<div style="color:#f8f8f8;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.2;padding-top:10px;padding-right:35px;padding-bottom:10px;padding-left:35px;">
<div style="line-height: 1.2; font-size: 12px; color: #f8f8f8; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;">
<p style="font-size: 14px; line-height: 1.2; word-break: break-word; margin: 0;">Contact us and we'll be happy to help.</p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div style="background-color:transparent;">
<div class="block-grid two-up" style="min-width: 320px; max-width: 680px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: #3939ad;padding-bottom: 25px;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:#3939ad;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;">
<div class="col num6" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 336px; width: 340px;">
<div class="col_cont" style="width:100% !important;">

<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">

<div style="color:#f8f8f8;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.2;padding-top:10px;padding-right:35px;padding-bottom:10px;padding-left:35px;">
<div style="line-height: 1.2; font-size: 12px; color: #f8f8f8; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;">
<p style="font-size: 14px; line-height: 1.2; word-break: break-word; margin: 0;"><a href="http://www.example.com" rel="noopener" style="text-decoration: underline; color: #f7f7fc;" target="_blank">Track your order</a></p>
</div>
</div>
<div style="color:#f8f8f8;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.2;padding-top:10px;padding-right:35px;padding-bottom:10px;padding-left:35px;">
<div style="line-height: 1.2; font-size: 12px; color: #f8f8f8; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;">
<p style="font-size: 14px; line-height: 1.2; word-break: break-word; margin: 0;"><a href="http://www.example.com" rel="noopener" style="text-decoration: underline; color: #f7f7fc;" target="_blank">Order Issue</a></p>
</div>
</div>
</div>
</div>
</div>
<div class="col num6" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 336px; width: 340px;">
<div class="col_cont" style="width:100% !important;">
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
<div style="color:#f8f8f8;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.2;padding-top:10px;padding-right:35px;padding-bottom:10px;padding-left:35px;">
<div style="line-height: 1.2; font-size: 12px; color: #f8f8f8; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;">
<p style="font-size: 14px; line-height: 1.2; word-break: break-word; margin: 0;"><a href="http://www.example.com" rel="noopener" style="text-decoration: underline; color: #f7f7fc;" target="_blank">Return &amp; Refund</a></p>
</div>
</div>
<div style="color:#f8f8f8;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.2;padding-top:10px;padding-right:35px;padding-bottom:10px;padding-left:35px;">
<div style="line-height: 1.2; font-size: 12px; color: #f8f8f8; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;">
<p style="font-size: 14px; line-height: 1.2; word-break: break-word; margin: 0;"><a href="http://www.example.com" rel="noopener" style="text-decoration: underline; color: #f7f7fc;" target="_blank">Customer Care</a></p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div style="background-color:transparent;">
<div style="margin: auto;max-width: 655px;width: 100%;height: 1px;background-image: linear-gradient(to right, #ebebeb 0%, #ebebeb 50%, transparent 50%);background-size: 25px 1px;background-repeat: repeat-x;"></div>
<div class="block-grid two-up" style="min-width: 320px; max-width: 680px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: #3939ad;border-top-left-radius: 15px;border-top-right-radius: 15px;padding-top: 25px;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:#3939ad;border-top-left-radius: 15px;border-top-right-radius: 15px;">
<div class="col num6" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 336px; width: 340px;">
<div class="col_cont" style="width:100% !important;">
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
<div style="color:#f7f7fc;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:25px;">
<div style="line-height: 1.2; font-size: 12px; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; color: #f7f7fc;">
<p style="font-size: 18px; line-height: 1.2; text-align: left; word-break: break-word; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; margin: 0;"><strong><span style="color: #f7f7fc;">Social Media</span></strong></p>
</div>
</div>
<div style="color:#C0C0C0;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.8;padding-top:10px;padding-right:10px;padding-bottom:20px;padding-left:25px;">
<div style="line-height: 1.8; font-size: 12px; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; color: #C0C0C0;"><span>
<p style="font-size: 12px; line-height: 1.8; text-align: left; word-break: break-word; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; margin: 0;"><span style="color: #C0C0C0; font-size: 12px;">Stay up-to-date with current activities and future events by following us on your favorite social media channels.</span></p>
</span></div>
</div>
<table cellpadding="0" cellspacing="0" class="social_icons" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse;  " valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td style="word-break: break-word; vertical-align: top; padding-top: 0px; padding-right: 0px; padding-bottom: 15px; padding-left: 20px;" valign="top">
<table align="left" cellpadding="0" cellspacing="0" class="social_table" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse;">
<tbody>
<tr align="left" style="vertical-align: top; display: inline-block; text-align: left;" valign="top">
<td style="word-break: break-word; vertical-align: top; padding-bottom: 5px; padding-right: 15px; padding-left: 0px;" valign="top"><a href="https://www.facebook.com/" target="_blank"><img alt="Facebook" height="32" src="images/facebook2x.png" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;" title="Facebook" width="32"/></a></td>
<td style="word-break: break-word; vertical-align: top; padding-bottom: 5px; padding-right: 15px; padding-left: 0px;" valign="top"><a href="https://twitter.com/" target="_blank"><img alt="Twitter" height="32" src="images/twitter2x.png" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;" title="Twitter" width="32"/></a></td>
<td style="word-break: break-word; vertical-align: top; padding-bottom: 5px; padding-right: 15px; padding-left: 0px;" valign="top"><a href="https://plus.google.com/" target="_blank"><img alt="Google+" height="32" src="images/googleplus2x.png" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;" title="Google+" width="32"/></a></td>
<td style="word-break: break-word; vertical-align: top; padding-bottom: 5px; padding-right: 15px; padding-left: 0px;" valign="top"><a href="https://instagram.com/" target="_blank"><img alt="Instagram" height="32" src="images/instagram2x.png" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;" title="Instagram" width="32"/></a></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div><div class="col num6" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 336px; width: 340px;">
<div class="col_cont" style="width:100% !important;">

<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
<div style="color:#f7f7fc;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:25px;">
<div style="line-height: 1.2; font-size: 12px; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; color: #f7f7fc;">
<p style="font-size: 18px; line-height: 1.2; text-align: left; word-break: break-word; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; margin: 0;"><strong><span style="color: #f7f7fc;">Where To Find Us</span></strong></p>
</div>
</div>
<div style="color:#C0C0C0;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.8;padding-top:10px;padding-right:10px;padding-bottom:20px;padding-left:25px;">
<div style="line-height: 1.8; font-size: 12px; color: #C0C0C0; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;"><span style="color: #C0C0C0; font-size: 12px;"><a href="http://www.supermarioristorante.com" rel="noopener" style="text-decoration: none; color: #C0C0C0;" target="_blank">www.supermarioristorante.com</a></span><br>
	<span style="color: #C0C0C0; font-size: 12px;">Bürglistrasse 2 - 9000 St.Gallen<br/>071 534 64 00</span></div>
</div>
<div style="color:#C0C0C0;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:25px;">
<div style="line-height: 1.2; font-size: 12px; color: #C0C0C0; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;"><span style="color: #C0C0C0; font-size: 12px;">Changed your mind? <a href="http://www.example.com" rel="noopener" style="text-decoration: underline; color: #f7f7fc;" target="_blank">Return &amp; Refund</a> </span></div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div style="background-color:transparent;">
<div class="block-grid" style="min-width: 320px; max-width: 680px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: #3939ad;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:#3939ad;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;">
<div class="col num12" style="min-width: 320px; max-width: 680px; display: table-cell; vertical-align: top; width: 680px;">
<div class="col_cont" style="width:100% !important;">

<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
<table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse;   min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
<table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" height="0" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse;   border-top: 0px solid transparent; height: 0px; width: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td height="0" style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
<div style="background-color:transparent;">
<div class="block-grid" style="min-width: 320px; max-width: 680px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
<div class="col num12" style="min-width: 320px; max-width: 680px; display: table-cell; vertical-align: top; width: 680px;">
<div class="col_cont" style="width:100% !important;">
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
<div class="mobile_hide">
	<div style="margin:0px auto;max-width:600px;">
		<table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width: 100%;border-collapse: collapse;">
		  <tbody>
			<tr>
			  <td style="direction: ltr;font-size: 0px;padding: 0px 0 30px 0;text-align: center;vertical-align: top;border-collapse: collapse;">
				<div class="mj-column-per-100 outlook-group-fix" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
				  <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align: top;border-collapse: collapse;" width="100%">
					<tr>
					  <td align="center" style="font-size: 0px;padding: 10px 25px;border-collapse: collapse;">
						<div style="font-family:Lato, Helvetica, sans;font-size:12px;line-height:18px;text-align:center;color:#939DA8;">
						  <p style="display: block;margin: 13px 0;">Copyright © 2020 Super Mario Ristorante<br>
							Bürglistrasse 2, 9000 St.Gallen<br>
							<p style="display: block;margin: 13px 0;">You are receiving this email because you made a purchase from our website.<br>
							  You can object to receiving further mailings from us by sending an email to <a href="mailto:supermarioristorante@info.com" style="color:#939DA8;">supermarioristorante@info.com</a></p>
							<p style="display: block;margin: 13px 0;">Our <a href="https://us17.mailchimp.com/mctx/click?url=https%3A%2F%2Fpitch.com%2Fprivacy-policy&xid=b3a8a664e6&uid=85563785&pool=&subject=" style="color:#939DA8;">Privacy Policy</a>
							</p>
						</div>
					  </td>
					</tr>
				  </table>
				</div>
			  </td>
			</tr>
		  </tbody>
		</table>
	  </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</td>
</tr>
</tbody>
</table>
</body>
</html>
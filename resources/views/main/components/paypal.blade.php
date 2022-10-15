@if ($status == 'approved')
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Paypal</title>
    </head>
    <body>
        <div style="max-width: 400px; margin: 0 auto; text-align: center;">
            <h4>Processing your order...</h4>
        </div>
        <script>
            let paymentId = "{{ $paymentId }}";
            let paypalUserId = "{{ $paypalUserId }}"

            self.opener.order.setPaypalInfo(paymentId,paypalUserId);
            self.opener.order.submitOrder();
            window.close();
        </script>
    </body>
</html>
    @else
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Payment cancelled</title>
    </head>
    <body>
    <script>
        window.close();
    </script>
    </body>
</html>
@endif
<!DOCTYPE html>
<html>

<head>
    <title>Shipment Delivered</title>
</head>

<body>
    <h1>Dear {{ $customerName }},</h1>
    <p>Your shipment has been delivered with the following details:</p>
    <ul>
        <li>Shipment Number: {{ $shipmentDetails->shipment_number }}</li>
        <li>Tracking Number: {{ $shipmentDetails->tracking_number }}</li>
        <li>Delivered On: {{ $shipmentDetails->delivery_date }}</li>
    </ul>
    <p>Thank you for choosing our service!</p>
</body>

</html>

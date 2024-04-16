<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #007bff;
        }

        .content {
            margin-top: 20px;
        }

        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 12px;
            color: #888888;
        }
    </style>
</head>

<body>
    <h1>Welcome to Our Event</h1>

    <div class="content">
        <p>Dear <strong>{{ $name }}</strong>,</p>
        <p>Your Qr Code is:</p>
        <p>
            <img src="data:image/png;base64, {!! base64_encode(QrCode::size(200)->generate('#' . $code)) !!} ">

        </p>
    </div>

    <div class="footer">
        Best Regards,<br>
        <strong>Events Planner Team</strong>
    </div>
</body>

</html>

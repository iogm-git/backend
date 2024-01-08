<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Otp</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .email-container {
            max-width: 600px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h3 {
            color: #fff;
            background-color: #333;
            padding: 10px 15px;
            border-radius: 4px;
            width: max-content;
        }

        p {
            line-height: 1.6;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <h1>Your Otp is :</h1>
        <h3>{{ $otp }}</h3>
        <p>Use this OTP to verify your identity.</p>
    </div>
</body>

</html>

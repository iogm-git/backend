<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate</title>
    <style>
        * {
            padding: 0;
            margin: 0;
        }

        .set-middle {
            position: relative;
            left: 50%;
            transform: translate(-50%);
        }
    </style>
</head>

<body style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; box-sizing: border-box; padding: 111px;">
    <table style="width: 100%;">
        <tr>
            <td style="width: 120px;">
                <img src="data:image/png;base64,{{ base64_encode($qrCode) }}" alt="QR Code" width="120">
            </td>
            <td>
                <div class="set-middle">
                    <p style="font-size: 25pt; text-align: center;">IOGM - Code</p>
                    <br>
                    <br>
                    <p style="text-align: center">This acknowledges that</p>
                    <br>
                    <h1 style="text-align: center; margin: 15px 0;">{{ $studentName }}</h1>
                    <br>
                    <p style="text-align: center">Has successfully completed the course in {{ $courseName }}</p>
                    <br>
                    <h2 style="color: #4a4a4a; font-size: 17pt; text-align: center">IOGM Code Certified</h2>
                    <br>
                    <h1 style="font-size:25pt; text-align: center">{{ $courseName }}</h1>
                </div>
            </td>
            <td style="width: 120px; position: relative">
                <img src="{{ public_path('code') }}/badge-certificate.png" alt="TTD"
                    style="width: 120px; height: 120px;">
                <p
                    style="
                            color: #BF9B30;
                            position: absolute; 
                            z-index: 2; 
                            font-size: 9pt;
                            top: 175px; 
                            max-width:80px; 
                            left:50%; 
                            transform: translateX(-50%); 
                            width: min-content; 
                            text-align: center;">
                    {{ $courseName }}</p>
            </td>
        </tr>
    </table>
    <br>
    <br>
    <table style="width: 100%; margin-top: 77px; border-collapse: collapse;">
        <tr>
            <td>
                <table>
                    <tr>
                        <td>Certification Id</td>
                        <td>: {{ $certificationId }}</td>
                    </tr>
                    <tr>
                        <td>Issues Date</td>
                        <td>: {{ $issuesDate }}</td>
                    </tr>
                    <tr>
                        <td>Expiration Date</td>
                        <td>: {{ $expirationDate }}</td>
                    </tr>
                    <tr>
                        <td>Certification</td>
                        <td>: {{ $courseName }} </td>
                    </tr>
                </table>
            </td>
            <td style="width: 146px;">
                <img src="{{ public_path('code') }}/ttd-founder.png" alt="TTD" width=120>
                <br>
                <p style="width: 146px; padding-top: 4px; margin-top: 3px; border-top: 1px solid black;">Ilham
                    Rahmat Akbar</p>
                <small>Fulstack Developer</small>
            </td>
        </tr>

    </table>
</body>

</html>

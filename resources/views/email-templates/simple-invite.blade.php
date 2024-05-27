<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>Hello, there
    <p>We hope this email finds you well.</p>
    <p>You have just been added as {{ $role }} for {{ $union_name }}. Kindly login to your NDRS dashboard to have access to the Union</p>
    <p>If you feel this was sent to you in error, kindly ignore this email or you can contact us at {{ env("CONTACT_EMAIL") }} for more information.</p>
    <p>Cheers,</p>
    <p>{{ env("APP_NAME") }} Team</p>
</body>
</html>

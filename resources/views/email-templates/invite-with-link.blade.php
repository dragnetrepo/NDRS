<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @php $email_invite_url = url('/union-invite/'.$url_token); @endphp

    <p>Hello, there</p>
    <p>We hope this email finds you well.</p>
    <p>
        You have just received an invite to join from <strong>{{ $union_name }}</strong> to join as a <strong>{{ $role }}</strong>.
        Click on the URL below to create an account on NDRS and have access to the Union
    </p>
    <p><a href='{{ $email_invite_url }}'>{{ $email_invite_url }}</a></p>
    <p>If you feel this was sent to you in error, kindly ignore this email or you can contact us at {{ env("CONTACT_EMAIL") }} for more information.</p>
    <p>Cheers,</p>
    <p>{{ env("APP_NAME") }} Team</p>
</body>
</html>

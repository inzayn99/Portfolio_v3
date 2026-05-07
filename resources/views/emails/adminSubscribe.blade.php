
<!DOCTYPE html>
<html>
<head>
    <title>New Subscription email</title>
</head>
<body>
    <p>New member has been subscribed your website.</p>
    Email: {{ $userEmail }}<br>
    <p>Regards,</p>
    <h3>{{ env("APP_NAME") }}.</h3>
</body>
</html>
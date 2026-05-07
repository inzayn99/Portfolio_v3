
<!DOCTYPE html>
<html>
<head>
    <title>Admin Booking Mail</title>
</head>
<body>
    <p>You have got a new booking request from email : {{$data['email']}} </p><br>
    <p>Regards,</p>
    <h3>{{ env("APP_NAME") }}.</h3>
</body>
</html>
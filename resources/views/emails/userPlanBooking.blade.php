<!DOCTYPE html>
<html>
<head>
    <title>Form Received</title>
</head>
<body>
    <p>Dear Customer,</p>
    <p>We have received your form via our official site. We will get back to you soon. The following information of your Plan booking form: 
    </p>
    <table class="table" border="1">
        <thead>
        <tr>
            <th>Full name</th>
            <th>Address</th>
            <th>Contact</th>
            <th>Plan type</th>
            <th>Plan title</th>
            <th>Price</th>

        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{ $data['name'] }}</td>
            <td>{{ $data['address'] }}</td>
            <td>{{ $data['contact_no'] }}</td>
            <td>{{ $data['plan_type'] }}</td>
            <td>{{ $data['plan_title'] }}</td>
            <td>{{ $data['plan_price'] }}</td>
        </tr>
        </tbody>
    </table>

    <p>Thank You.</p>
    <p>Regards,</p>
    <h3>{{ env("APP_NAME") }}.</h3>
</body>
</html>

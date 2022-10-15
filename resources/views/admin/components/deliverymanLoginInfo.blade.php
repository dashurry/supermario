<!DOCTYPE html>
<html>

<body>

<h1>Hello, <b>{{ $data['name'] }}</b></h1>
<h3>Your new delivery account has been created</h3>
<h3>User name: <b>{{ $data['email'] }}</b> </h3>
<h3>Password: <b>{{ $data['password'] }}</b> </h3>
<p>Please follow <a href="{{ route('deliveryman.dashboard') }}">following link</a> to login with your staff account and see today's open orders</p>
</body>
</html>
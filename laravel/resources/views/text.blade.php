<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>昵称： {{ $user['nickname'] }}</h1>
    头像：<img src="{{ $user['avatar'] }}" alt="">
<h1>OpenId:{{ $user['original']['openid'] }}</h1>
<h1>性别:{{ $user['original']['sex'] }}</h1>
<h1>地区:{{ $user['original']['country'] }}</h1>
</body>
</html>
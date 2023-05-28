<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tập Farmework Laravel</title>
</head>
<body>
    <p>okk</p>
    @foreach($mang as $m)
        <li style="color:gold">{{$m}}</li>
    @endforeach
    <p style="color:gold">{{$name}}</p>
</body>
</html>
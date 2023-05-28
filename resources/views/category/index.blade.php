<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phan trang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $dt)
                <tr>
                    <th scope="row">{{$dt->id}}</th>
                    <td>{{$dt->name}}</td>
                </tr>
            @endforeach
        </tbody>
        {!! $data->links() !!}
    </table>
</body>

</html>
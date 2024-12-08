<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Khoa</h1>
    {{-- không khuyến khích lấy bằng cách này --}}
    {{-- <p>{{ env('MY_NAME') }}</p> --}}

    {{-- .nên lấy qua controller --}}
    <p>{{ $myName }}</p>
</body>
</html>
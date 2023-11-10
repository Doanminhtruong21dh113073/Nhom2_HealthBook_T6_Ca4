<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($user as $item)
    <label for="">Số Điện Thoại</label>
    <input type="text" class="form-control" name="phone"  value="{{$item->phone}}">
    <label for="exampleInputEmail1">Địa chỉ Email</label>
    <input type="email" class="form-control" name="email" value="{{$item->email}}">
    @endforeach
    
</body>
</html>
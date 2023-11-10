@foreach ($barber as $item)
    <label for="exampleInputEmail1">Số Điện Thoại</label>
    <input type="text" class="form-control" name="phone" placeholder="0123456789" value="{{$item->phone}}">
<label for="exampleInputEmail1">Email</label>
    <input type="email" class="form-control" name="email" placeholder="Enter email" value="{{$item->email}}">
@endforeach

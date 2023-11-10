@extends('admin.master')
@section('module', 'Đăng Ký')
@section('action', 'Bác Sĩ')



@section('content')


    <div class="card">
        <form action="{{ route('admin.user.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-header">
                <h3 class="card-title">Đăng Ký Bác Sĩ</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>

            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Bạn Là :</label>
                    <select name="role" id="" class="form-control">
                        <option value="doctor">Doctor</option>
                        <option value="admin">Admin</option>
                    </select>
                    @error('role')
                        <span style="color: red">!!!{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Họ và Tên</label>
                    <input type="text" class="form-control" name="name" placeholder="Nguyen Van A"
                        value="{{ old('name') }}">
                    @error('name')
                        <span style="color: red">!!!{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Số Điện Thoại</label>
                    <input type="text" class="form-control" name="phone" placeholder="0123456789"
                        value="{{ old('phone') }}">
                    @error('phone')
                        <span style="color: red">!!!{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter email"
                        value="{{ old('email') }}">
                    @error('email')
                        <span style="color: red">!!!{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Mật Khẩu</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    @error('password')
                        <span style="color: red">!!!{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Nhập lại Mật Khẩu</label>
                    <input type="password" class="form-control" name="confirm" id="" placeholder="Password">
                    @error('confirm')
                        <span style="color: red">!!!{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Giới Tính</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" checked="" value="men">
                        <label class="form-check-label mr-5">Nam</label>

                        <input class="form-check-input " type="radio" name="gender" value="woman">
                        <label class="form-check-label mr-5 ">Nữ</label>

                        <input class="form-check-input " type="radio" name="gender" value="order">
                        <label class="form-check-label ">Khác</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Dịch vụ làm: </label>
                    <div class="form-check">
                        @foreach ($categories as $item)
                            <input class="form-check-input" type="checkbox" name="category[]" value="{{ $item->id }}">
                            <label class="form-check-label mr-5">{{ $item->category }}</label>
                        @endforeach
                    </div>
                </div>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="images"
                            value="{{ old('images') }}">
                        <label class="custom-file-label" for="exampleInputFile">Tải Ảnh Lên</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">Thêm</span>
                    </div>
                </div>
                <div>
                    @error('file')
                        <span style="color: red">!!!{{ $message }}</span>
                    @enderror
                </div>


            </div>

            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Thêm</button>
            </div>
            <!-- /.card-footer-->
        </form>
    </div>
    <!-- /.card -->
@endsection

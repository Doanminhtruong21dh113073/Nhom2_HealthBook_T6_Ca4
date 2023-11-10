@extends('admin.master')
@section('module','Tạo')
@section('action','Dịch Vụ Khám Bệnh')
    


@section('content')
<div class="card">
    <form action="{{route('admin.service.store')}}" method="post">
        @csrf
        <div class="card-header">
            <h3 class="card-title">Chọn dịch vụ</h3>
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
                <label for="exampleInputEmail1">Dịch vụ</label>
                <input type="text" class="form-control" name="service" placeholder="Lấy máu xét nghiệm " value="{{old('service')}}">
            </div>
            <div>
                <label for="">Mô tả</label>
                <input type="text" class="form-control" name="des" placeholder="Đó là một dịch vụ....">

            </div>

            <div class="form-group">
                <label for="">Giá(VND)</label>
                <input type="text" class="form-control" name="price" placeholder="490000">
            </div>
            
            <div class="form-group">
                <label for="">Giá ưu đãi(VND)</label>
                <input type="text" class="form-control" name="discount" placeholder="490000">
            </div>
            <div class="form-group">
                <label for="exampleSelectRounded0">Combo</label>
                <select class="custom-select" id="category" name="category">
                    <option value=""></option>
                    @foreach ($category as $item)
                        <option  value="{{$item->id}}">{{$item->category}}</option>
                    @endforeach
                </select>
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
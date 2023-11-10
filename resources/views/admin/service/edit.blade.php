@extends('admin.master')
@section('module','Sửa')
@section('action','Dịch Vụ Khám Bệnh')
    


@section('content')
<div class="card">
    <form action="{{route('admin.service.update',['id'=>$service->id])}}" method="post">
        @csrf
        <div class="card-header">
            <h3 class="card-title">Sửa dịch vụ</h3>
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
                <input type="text" class="form-control" name="service" placeholder="implant" value="{{$service->service}}">
            </div>
            <div>
                <label for="">Mô tả</label>
                <input type="text" class="form-control"value="{{$service->des}}" name="des" placeholder="Đó là một dịch vụ....">

            </div>

            <div class="form-group">
                <label for="">Giá(VND)</label>
                <input type="text" class="form-control" name="price" value="{{$service->price}}">
            </div>
            
            <div class="form-group">
                <label for="">Giá ưu đãi</label>
                <input type="text" class="form-control" name="discount" value="{{$service->discount}}">
            </div>
            <div class="form-group">
                <label for="exampleSelectRounded0">Combo</label>
                <select class="custom-select" id="category" name="category">
                    @foreach ($category as $item)
                        <option  value="{{$item->id}}">{{$item->category}}</option>
                    @endforeach
                </select>
              </div>
        </div>

        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <!-- /.card-footer-->
    </form>
</div>
<!-- /.card -->
@endsection
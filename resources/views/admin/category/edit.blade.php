@extends('admin.master')
@section('module','Tạo')
@section('action','Chuyên Khoa Khám Bệnh')
    


@section('content')
<div class="card">
    <form action="{{route('admin.category.update',['id'=>$category->id])}}" method="post">
        @csrf
        <div class="card-header">
            <h3 class="card-title"></h3>
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
                <label for="exampleInputEmail1">Tên combo</label>
                <input type="text" class="form-control" name="category" placeholder="Combo ..." value="{{$category->category}}">
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
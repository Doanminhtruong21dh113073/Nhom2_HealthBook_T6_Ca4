@extends('admin.master')
@section('module', 'Đăng Ký')
@section('action', 'Bác Sĩ')

@push('datejs')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function () {
        $("select#select-barber").change(function () {
            var $id = $(this).val();

            $.ajax({
                type: "POST",
                url: "{{ route('admin.barber.getPhone_Email_Barber') }}",
                data: { idbarber: $id },
                dataType: "html",
                success: function (data) {
                    $("#phone_email_barber").html(data);
                }
            });
        });
    });
</script>
@endpush

@section('content')
<div class="card">
    <form action="{{ route('admin.barber.update', ['id' => $barber->id]) }}" method="post" enctype="multipart/form-data">
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
                <label for="select-barber">Họ Và Tên</label>
                <select name="name" id="select-barber" class="form-control">
                    <option value=""></option>
                    @foreach ($user as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $barber->name ? "selected" : "" }}>
                        {{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group" id="phone_email_barber">
                @foreach ($barberr as $item)
                <label for="exampleInputEmail1">Số Điện Thoại</label>
                <input type="text" class="form-control" name="phone" placeholder="0123456789" value="{{ $item->phone }}">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Enter email" value="{{ $item->email }}">
                @endforeach
            </div>

            <div class="form-group">
                <label for="category">Dịch Vụ</label>
                <select class="custom-select" id="category" name="category">
                    @foreach ($category as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $barber->category ? "selected" : "" }}>
                        {{ $item->category }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm</button>
        </div>
    </form>
</div>
@endsection

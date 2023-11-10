@extends('admin.master')
@section('module', 'Đăng Ký')
@section('action', 'Nghỉ')

@push('datejs')
    <link rel="stylesheet" type="text/css" href="{{ asset('administrator/dist/css/day.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("select#select-barber1").change(function() {
            var $id = $(this).val();

            $.ajax({
                type: "POST",
                url: "{{ route('admin.barber.getPhone_Email_Barber') }}",
                data: {
                    idbarber: $id
                },
                dataType: "html",
                success: function(data) {
                    $("#phone_email_barber").html(data);
                }
            });
        })
    </script>
    <script>
        $(function() {
            $("#datemask1").datepicker({
                dateFormat: 'dd/mm/yy'
            }).val();
        });
    </script>
@endpush

@section('content')
<div class="card">
    <form action="{{ route('admin.date_off.update', ['id' => $start_day->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-header">
            <h3 class="card-title">Đăng Ký Ngày Nghỉ</h3>
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
                <label for="exampleInputEmail1">Họ Và Tên</label>
                <select name="barber" id="select-barber1" class="form-control">
                    <option value=""></option>
                    @foreach ($user1 as $item)
                        <option value="{{ $item->id }}" {{ $item->id == $start_day->barber ? 'selected' : '' }}>
                            {{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group" id="phone_email_barber">
                @foreach ($user as $item)
                    <label for="exampleInputEmail1">Số Điện Thoại</label>
                    <input type="text" class="form-control" name="phone" placeholder="0123456789"
                        value="{{ $item->phone }}">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter email"
                        value="{{ $item->email }}">
                @endforeach
            </div>
            <div class="form-group">
                <label for="reason">Reason</label>
                <textarea name="reason" id="reason" class="form-control">{{ $start_day->reason }}</textarea>
            </div>
            <div class="form-group" >
                <label>Ngày Bắt Đầu</label>
                <div>
                    <input type="date" name="start_day" id="datemask2" class="form-control" >
                </div>
            </div>
            <div class="form-group" >
                <label>Ngày Kết Thúc</label>
                <div>
                    <input type="date" name="end_day" id="datemask3" class="form-control" >
                </div>
            </div>
        </div>
    </div>

    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Thêm</button>
    </div>
    <!-- /.card-footer-->
    </form>
</div>
<!--


    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Thêm</button>
    </div>
    <!-- /.card-footer-->
    </form>
    </div>
    <!-- /.card -->
@endsection

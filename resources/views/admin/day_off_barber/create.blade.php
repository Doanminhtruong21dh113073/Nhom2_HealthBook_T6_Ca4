@extends('admin.master')


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
   
    </script>
@endpush
@if (Auth::user())

@section('content')
    <div class="card">
        <form action="{{ route('admin.date_off.store') }}" method="post" enctype="multipart/form-data">
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
                        @foreach ($user as $item)
                        @if ($item->id == Auth::user()->id||Auth::user()->role == 'admin')

                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="reason">Reason</label>
                    <textarea name="reason" id="reason" class="form-control"></textarea>
                </div>
                <div class="form-group" id="phone_email_barber"></div>
              
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
    <!-- /.card -->
    @endif
@endsection

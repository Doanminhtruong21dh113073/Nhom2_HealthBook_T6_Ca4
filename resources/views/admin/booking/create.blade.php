@extends('admin.master')
@section('module', 'Đặt Lịch')
@section('action', 'Khám Bệnh')

@push('date')
    {{-- <link rel="stylesheet" href="{{asset('administrator/plugins/daterangepicker/daterangepicker.css')}}"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('administrator/dist/css/date.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('administrator/dist/css/time.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('administrator/dist/css/day.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('administrator/dist/css/img.css') }}">
@endpush
@push('datejs')
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> --}}
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#getDate").change(function() {
            var $id = $(this).val();
            $.ajax({
                type: "POST",
                url: "{{ route('admin.booking.getValue') }}",
                data: {
                    value: $id
                },
                dataType: "html",
                success: function(data) {

                    $("input#date-date").val(data);
                }
            });
        })

        $("#getDate").change(function() {
            var $id = $(this).val();
            var $id1 = $("input.radio-barber:checked").val();
            // alert($id1);
            $.ajax({
                type: "POST",
                url: "{{ route('admin.booking.getTime') }}",
                data: {
                    value: $id,
                    barber: $id1
                },
                dataType: "html",
                success: function(data) {
                    $("#getTime").html(data);
                }
            });
        })
        $("select#select-category").change(function() {
            var $categoryId = $(this).val();

            $.ajax({
                type: "POST",
                url: "{{ route('admin.booking.getBarber') }}",
                data: {
                    idcategory: $categoryId
                },
                dataType: "html",
                success: function(barberData) {
                    $("#getBarber").html(barberData);
                }
            });
          

            $.ajax({
                type: "POST",
                url: "{{ route('admin.booking.getPrice') }}",
                data: {
                    idservice: $categoryId
                },
                dataType: "html",
                success: function(priceData) {
                    $("#getPrice").html(priceData);
                }
            });
        });

        $("select#select-user").change(function() {
            var $id = $(this).val();
            $.ajax({
                type: "POST",
                url: "{{ route('admin.booking.getPhone_Email') }}",
                data: {
                    iduser: $id
                },
                dataType: "html",
                success: function(data) {
                    $("#phone-email").html(data);
                }
            });
        })
    </script>
    <script>
        $(function() {
            $("#getDate").datepicker({
                dateFormat: 'dd/mm/yy'
            }).val();
        });
    </script>
@endpush
@section('content')
    <div class="card">
        <form action="{{ route('admin.booking.store') }}" method="post">
            @csrf
            <div class="card-header">
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
                    <label for="exampleInputEmail1">Họ và Tên:</label>
                    <input type="text" class="form-control" name="customer" placeholder="Nguyen Van A"
                        value="{{ old('customer') }}">
                    @error('name')
                        <span style="color: red">!!!{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Số Điện Thoại:</label>
                    <input type="text" class="form-control" name="phone" placeholder="0123456789"
                        value="{{ old('phone') }}">
                    @error('phone')
                        <span style="color: red">!!!{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email:</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter email"
                        value="{{ old('email') }}">
                    @error('email')
                        <span style="color: red">!!!{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Dịch Vụ:</label>
                    <div class="d-flex" style="width:100%">
                        <select class="form-control " style="width:100%;" id="select-category" name="service">
                            <option selected="selected"></option>
                            @foreach ($service as $item)
                                <option value="{{ $item->id }}">{{ $item->service }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group" id="getPrice">
                </div>
                <div id="getBarber" style="margin-bottom: 50px"></div>


                <div class="form-group" id="lop-phu">
                    <div class="d-flex" style="width: 100%">
                        <div class="form-date">
                            <label for="date-date">
                                <div id="getDate" data-target="#getDate">
                                </div>
                                <div style="text-align: center">
                             Ngày :   <input type="text" name="date" data-target="#getDate" id="date-date">
                                </div>
                            </label>
                        </div>
                        <div class="form-time ">
                            <label for="">Thời gian:</label>
                            <div class="container">
                                <div class="row ">
                                    <div id="getTime"></div>
                                </div>

                            </div>
                        </div>
                        <br>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Chú thích:</label>
                    <textarea name="text" id="editor1"></textarea>
                    <script>
                        CKEDITOR.replace('editor1');
                    </script>
                </div>


                <input type="number" name="level" value="1" class="an-input">


            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Thêm</button>
            </div>
        </form>
    </div>
@endsection

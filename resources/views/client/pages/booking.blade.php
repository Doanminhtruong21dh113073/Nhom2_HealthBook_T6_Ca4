@extends('client.master')
@section('module', 'Đặt Lịch')
@section('action', 'Salon')

@push('date')
    <link rel="stylesheet" type="text/css" href="{{ asset('administrator/dist/css/date.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('administrator/dist/css/time.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('administrator/dist/css/day.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('administrator/dist/css/img.css') }}">
@endpush
@push('datejs')
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
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('client.booking.booking_store') }}" method="post">
        {{ csrf_field() }}
        <div class="row align-items-lg-end">
            <div class="col-md-6 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <div class="card border-0 rounded shadow p-4 ms-xl-3">
                    <div class="custom-form">

                        <div class="card-header">
                            <h3 class="card-title">Đặt Lịch</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Tên Bệnh Nhân <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="customer" placeholder="Nguyen Van A"
                                        value="{{ old('customer') }}" />
                                    @error('name')
                                        <span style="color: red">!!!{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!--end col-->

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter email"
                                        value="{{ old('email') }}" />
                                    @error('email')
                                        <span style="color: red">!!!{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Your Phone <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="phone" placeholder="0123456789"
                                        value="{{ old('phone') }}" />
                                    @error('phone')
                                        <span style="color: red">!!!{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Dịch vụ</label>
                                    <select class="form-select form-control" id="select-category" name="service">
                                        <option selected="selected"></option>
                                        @foreach ($service as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->service }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!--end col-->

                            <div class="form-group" id="getPrice"></div>

                            <!--end col-->

                            <div class="col-12">
                                <textarea class="form-control" name="text" id="editor1"></textarea>
                                <script>
                                    CKEDITOR.replace("editor1");
                                </script>
                            </div>

                            <!--end col-->

                            <div class="col-12"></div>
                            <!--end col-->

                            <div class="col-lg-12">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">
                                        Book An Appointment
                                    </button>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                </div>

            </div>
            <!--end col-->
            <div class="col-md-6">
                <div class="me-xl-3">
                    <div class="section-title mb-4 pb-2" id="getBarber">

                    </div>

                    <div class="row">



                        <div class="form-group" id="lop-phu">
                            <div class="d-flex" style="width: 100%">
                                <div class="form-date">
                                    <label for="date-date">
                                        <div id="getDate" data-target="#getDate">
                                        </div>
                                        <div style="text-align: center">
                                            Ngày : <input type="text" name="date" data-target="#getDate"
                                                id="date-date">
                                        </div>
                                    </label>
                                </div>
                                
                                <div class="col-6" id="getTime">
        
                                </div>
                                <br>
                            </div>
                        </div>


                    </div>
                </div>

                <input type="number" name="level" value="1" class="an-input">

                <!--end col-->
            </div>
    </form>
@endsection

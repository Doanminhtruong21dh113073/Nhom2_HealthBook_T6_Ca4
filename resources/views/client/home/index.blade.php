@extends('layouts.client.app')


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

    <!-- Start Hero -->
    <section class="bg-half-260 d-table w-100" style="background: url('/client/assets/images/bg/01.jpg') center;">
        <div class="bg-overlay bg-overlay-dark"></div>
        <div class="container">
            <div class="row mt-5 mt-lg-0">
                <div class="col-12">
                    <div class="heading-title">
                        <img src="{{ asset('client/assets/images/logo-icon.png') }}" height="50" alt="">
                        <h4 class="display-4 fw-bold text-white title-dark mt-3 mb-4">Meet The <br> Best Doctor</h4>
                        <p class="para-desc text-white-50 mb-0">Great doctor if you need your family member to get
                            effective immediate assistance, emergency treatment or a simple consultation.</p>

                        <div class="mt-4 pt-2">
                            <a href="{{ route('client.booking.booking_create') }}" class="btn btn-primary">Make
                                Appointment</a>
                            <p class="text-white-50 mb-0 mt-2">T&C apply. Please read <a href="#"
                                    class="text-white-50">Terms and Conditions <i
                                        class="ri-arrow-right-line align-middle"></i></a></p>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End Hero -->
    <!-- Start -->

    </section><!--end section-->
    <!-- End -->



    <!-- Start -->
    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="section-title text-center mb-4 pb-2">
                        <span class="badge rounded-pill bg-soft-primary">Find Doctors</span>
                        <h4 class="title mt-3 mb-4">Find Your Specialists</h4>
                        <p class="text-muted mx-auto para-desc mb-0">Great doctor if you need your family member to get
                            effective immediate assistance, emergency treatment or a simple consultation.</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row align-items-center">
                @foreach ($user as $i)
                    <div class="col-xl-3 col-lg-3 col-md-6 mt-4 pt-2">
                        <div class="card team border-0 rounded shadow overflow-hidden">
                            <div class="team-person position-relative overflow-hidden">
                                <img src="{{ asset($i->images) }}" alt="" class="img-fluid">

                            </div>
                            <div class="card-body">
                                <a href="doctor-team-two.html"
                                    class="title text-dark h5 d-block mb-0">{{ $i->name }}</a>

                                <ul class="list-unstyled mt-2 mb-0">
                                    <li class="d-flex">
                                        <i class="ri-map-pin-line text-primary align-middle"></i>
                                        <small class="text-muted ms-2">{{ $i->phone }}</small>
                                    </li>
                                    <li class="d-flex mt-2">
                                        <i class="ri-time-line text-primary align-middle"></i>
                                        <small class="text-muted ms-2">{{ $i->email }}</small>
                                    </li>

                                </ul>

                            </div>
                        </div>
                    </div><!--end col-->
                @endforeach


            </div><!--end row-->
        </div><!--end container-->


    </section>
    <!-- End -->

    <!-- Start -->
    <section class="container mt-4 mb-8">
        <form action="{{ route('client.booking.booking_store') }}" method="post" class="mb-5">
            {{ csrf_field() }}
            <div class="row align-items-lg-end">

                <div class="col-md-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <div class="card border-0 rounded shadow p-4 ms-xl-3">
                        <div class="custom-form">

                            <div class="card-header">
                                <h3 class="card-title">Đặt Lịch Ngay</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
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
                                        <input type="text" class="form-control" name="customer"
                                            placeholder="Nguyen Van A" value="{{ old('customer') }}" />
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
                                        <input type="text" class="form-control" name="phone"
                                            placeholder="0123456789" value="{{ old('phone') }}" />
                                        @error('phone')
                                            <span style="color: red">!!!{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12">
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

                                <div class="form-group col-6" id="getPrice"></div>

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

                                <div class="col-lg-12 mt-20">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">
                                            Book An Appointment
                                        </button>
                                    </div>
                                </div>

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                    </div>

                </div>
                <!--end col-->
        </form>


        <div class="row mb-5">
            <div class="col-12">
                <table class="table table-center bg-white mb-0">
                    <thead class="card-group col-12" id="getBarber">
                        <tr>
                        </tr>
                    </thead>
                    <hr>
                    <tbody id="getBarber"></tbody>
                </table>
            </div>
        </div>



        <div class="row">
            <div class="form-group col-6 mb-5" id="lop-phu">
                <div class="d-flex" style="width: 100%">
                    <div class="form-date">
                        <label for="date-date">
                            <div id="getDate" data-target="#getDate">
                            </div>
                            <div style="text-align: center">
                                Ngày : <input type="text" name="date" data-target="#getDate" id="date-date">
                            </div>
                        </label>
                    </div>

                    <div class="col-6" id="getTime">

                    </div>
                    <br>
                </div>




            </div>
            <input type="number" name="level" value="1" class="an-input">
        </div>
    </section>


    <!-- End -->

    <!-- Start -->

    <!-- End -->

    <!-- Partners start -->
    <section class="py-4 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-2 col-md-2 col-6 text-center py-4">
                    <img src="{{ asset('client/assets/images/client/amazon.png') }}" class="avatar avatar-client"
                        alt="">
                </div><!--end col-->

                <div class="col-lg-2 col-md-2 col-6 text-center py-4">
                    <img src="{{ asset('client/assets/images/client/google.png') }}" class="avatar avatar-client"
                        alt="">
                </div><!--end col-->

                <div class="col-lg-2 col-md-2 col-6 text-center py-4">
                    <img src="{{ asset('client/assets/images/client/lenovo.png') }}" class="avatar avatar-client"
                        alt="">
                </div><!--end col-->

                <div class="col-lg-2 col-md-2 col-6 text-center py-4">
                    <img src="{{ asset('client/assets/images/client/paypal.png') }}" class="avatar avatar-client"
                        alt="">
                </div><!--end col-->

                <div class="col-lg-2 col-md-2 col-6 text-center py-4">
                    <img src="{{ asset('client/assets/images/client/shopify.png') }}" class="avatar avatar-client"
                        alt="">
                </div><!--end col-->

                <div class="col-lg-2 col-md-2 col-6 text-center py-4">
                    <img src="{{ asset('client/assets/images/client/spotify.png') }}" class="avatar avatar-client"
                        alt="">
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- Partners End -->

@endsection

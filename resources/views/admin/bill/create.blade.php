@extends('admin.master')

@push('bill')
    <link rel="stylesheet" type="text/css" href="{{ asset('administrator/dist/css/bill.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript"></script>
@endpush
@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('administrator/dist/css/img.css') }}">
@endpush
@push('datejs')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("select#select-product").change(function() {
            var $id = $(this).val();
            $.ajax({
                type: "POST",
                url: "{{ route('admin.bill.getPrice') }}",
                data: {
                    idproduct: $id
                },
                dataType: "html",
                success: function(data) {
                    $("#getPrice").html(data);
                }
            });
        })
        $("select#select-category").change(function() {
            var $id = $(this).val();

            $.ajax({
                type: "POST",
                url: "{{ route('admin.bill.getProduct') }}",
                data: {
                    idcategory: $id
                },
                dataType: "html",
                success: function(data) {
                    $("select#select-product").html(data);
                }
            });
        })
    </script>
@endpush

@section('content')
    <div class="container mt-6 mb-7">
        <form action="{{ route('admin.cash.store', ['id' => $booking->id]) }}" method="post">
            @csrf
            <div class="row justify-content-center">
                <div class="col-lg-12 col-xl-7">
                    <div class="card">
                        <div class="card-body p-5">
                            <h2>Hóa Đơn Thanh Toán</h2>
                            <div class="border-top border-gray-200 pt-4 mt-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="customer">Customer:</label>
                                        <div class="form-control">{{ $booking->customer }}</div>
                                        <input type="text" class="form-control an-input" name="name"
                                            placeholder="Nguyen Van A" value="{{ $booking->id }}">
                                    </div>
                                    <div class="col-md-6 text-md-end">
                                        <label for="phone">Phone:</label>
                                        <div class="form-control">{{ $booking->phone }}</div>
                                        <input type="text" class="form-control an-input" name="phone"
                                            value="{{ $booking->id }}">
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-6 text-md-end">
                                        <label for="phone">Email:</label>
                                        <div class="form-control">{{ $booking->email }}</div>
                                        <input type="text" class="form-control an-input" name="email"
                                            value="{{ $booking->email }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        @foreach ($tct as $item)
                                            <label class="litter" for="exampleInputEmail1">Bác Sĩ :
                                                {{ $item->name }}</label>
                                        @endforeach

                                        <input type="" class="form-control an-input" name="barber"
                                            placeholder="Enter email" value="{{ $booking->barber }}">
                                    </div>
                                    <div class="col-md-6 text-md-end">
                                        <label class="litter" for="exampleInputEmail1">Dịch Vụ :
                                            @foreach ($service as $item)
                                                @if ($item->id == $booking->service)
                                                    {{ $item->service }}
                                                @endif
                                            @endforeach
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="litter" for="exampleInputEmail1">Ngày : {{ $booking->date }}</label>
                                        <input type="" class="form-control an-input" name="date"
                                            placeholder="Enter email" value="{{ $booking->date }}">
                                    </div>
                                    <div class="col-md-6 text-md-end">
                                        <input type="" class="form-control an-input" name="time"
                                            placeholder="Enter email" value="{{ $booking->time }}">
                                    </div>
                                </div>
                            </div>
                            <div class="border-top border-gray-200 mt-4 py-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="text-muted mb-2">Client</div>
                                        <strong> John McClane </strong>
                                        <p class="fs-sm">
                                            989 5th Avenue, New York, 55832
                                            <br />
                                            <a href="#!" class="text-purple"><span class="__cf_email__"
                                                    data-cfemail="f49e9b9c9ab49199959d98da979b99">[email&#160;protected]</span>
                                            </a>
                                        </p>
                                    </div>
                                    <div class="col-md-6 text-md-end">
                                        <div class="text-muted mb-2">Payment To</div>
                                        <strong> Themes LLC </strong>
                                        <p class="fs-sm">
                                            9th Avenue, San Francisco 99383
                                            <br />
                                            <a href="#!" class="text-purple"><span class="__cf_email__"
                                                    data-cfemail="e7938f828a8294a7828a868e8bc984888a">[email&#160;protected]</span>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-5">

                                <div class="d-flex justify-content-end mt-3">
                                    <h5 class="me-3">Total:</h5>
                                    <h5 class="text-success">
                                        <div class="form-control">{{ $booking->price }}</div>
                                        <input type="hidden" name="price" value="{{ $booking->price }}">
                                </div>
                                </h5>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" style="width:100%" class="btn btn-primary">Thanh toán</button>
                        </div>

                    </div>


                </div>
        </form>
    </div>
    <!-- /.card -->
@endsection

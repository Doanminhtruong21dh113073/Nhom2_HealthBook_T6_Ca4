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
                                <!-- Customer Information -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="customer">Customer:</label>
                                        <div class="form-control">{{ $booking->customer }}</div>
                                        <input type="text" class="form-control an-input" name="name"
                                            placeholder="Nguyen Van A" value="{{ $booking->id }}">
                                    </div>
                                    <!-- ... (other customer fields) ... -->
                                </div>
                                <!-- Service Information -->
                                <div class="row">
                                    <!-- ... (service-related fields) ... -->
                                </div>
                                <!-- ... (other sections) ... -->
                            </div>
                            <!-- Total -->
                            <div class="mt-5">
                                <div class="d-flex justify-content-end mt-3">
                                    <h5 class="me-3">Total:</h5>
                                    <h5 class="text-success">
                                        <div class="form-control">{{ $booking->price }}</div>
                                        <input type="hidden" name="price" value="{{ $booking->price }}">
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" style="width:100%" class="btn btn-primary">Thanh toán</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

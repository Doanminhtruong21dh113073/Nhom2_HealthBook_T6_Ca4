@extends('admin.master')


@push('date')
    {{-- <link rel="stylesheet" href="{{asset('administrator/plugins/daterangepicker/daterangepicker.css')}}"> --}}


    <link rel="stylesheet" type="text/css" href="{{ asset('administrator/dist/css/img.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('administrator/dist/css/checkout.css') }}">
@endpush
@push('datejs')
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> --}}
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <script>
        $(function() {
            $("#getDate").datepicker({
                dateFormat: 'dd/mm/yy'
            }).val();

        });
    </script>
@endpush

@section('content')
    <div class="container mt-6 mb-7">
        <form action="{{ route('admin.cash.store', ['id' => $booking->id]) }}" method="post">
            @csrf
            <div class="row justify-content-center">
                <div class="col-lg-12 col-xl-7">
                    <div class="card">
                        <div class="card-body p-5" style="margin-left: 50px">
                            <h2 style="text-align: center">Hóa Đơn Thanh Toán</h2>
                            <div class="border-top border-gray-200 pt-4 mt-4">
                                <div class="form-group">
                                    <div class="line">
                                        <label class="tall" style="margin-left:30px" for="exampleInputEmail1">Khách hàng:
                                            {{ $booking->customer }}</label>
                                        <input type="" class="form-control an-input" name="customer"
                                            placeholder="Nguyen Van A" value="{{ $booking->customer }}">
                                        <label class="litter" style="margin-left:30px" for="exampleInputEmail1">Số Điện Thoại:
                                            {{ $booking->phone }}</label>
                                        <input type="" class="form-control an-input" name="phone"
                                            placeholder="0123456789" value="{{ $booking->phone }}">
                                        <label class="litter" style="margin-left:30px" for="exampleInputEmail1">Email: {{ $booking->email }}</label>
                                        <input type="" class="form-control an-input" name="email"
                                            placeholder="Enter email" value="{{ $booking->email }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="line">
                                        @foreach ($tct as $item)
                                            <label class="litter" style="margin-left:30px" for="exampleInputEmail1">Barber:
                                                {{ $item->name }}</label>
                                        @endforeach

                                        <input type="" class="form-control an-input" name="barber"
                                            placeholder="Enter email" value="{{ $booking->barber }}">

                                        <label class="litter" style="margin-left:30px" for="exampleInputEmail1">Dịch Vụ:
                                            @foreach ($service as $item)
                                                @if ($item->id == $booking->service)
                                                    {{ $item->service }}
                                                @endif
                                            @endforeach
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="line">
                                        <label class="litter" style="margin-left:30px" for="exampleInputEmail1">Ngày: {{ $booking->date }}</label>
                                        <input type="" class="form-control an-input" name="date"
                                           value="{{ $booking->date }}">

                                        <label class="litter" style="margin-left:30px" for="exampleInputEmail1">Thời gian:
                                            {{ $booking->time }}:00</label>
                                        <input type="" class="form-control an-input" name="time"
                                           value="{{ $booking->time }}">
                                        <input type="" class="form-control an-input" name="text"
                                           value="{{ $booking->text }}">
                                        <input type="" class="form-control an-input" name="level"
                                           value="0">
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end mt-3">
                                    <h5 class="me-3">Total:</h5>
                                    <h5 class="text-success">
                                        <div class="form-control">{{ $booking->price }}</div>
                                        <input type="hidden" name="price" value="{{ $booking->price }}">
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-footer">
                        <button type="submit" style="width:100%; text-align:center" class="btn btn-primary">In Phiếu</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

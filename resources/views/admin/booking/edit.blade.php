@extends('admin.master')

@section('module', 'Đặt Lịch')
@section('action', 'Khám Bệnh')

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
            data: { value: $id },
            dataType: "html",
            success: function(data) {
                $("input#date-date").val(data);
            }
        });
    });

    // ... (other Ajax functions)

    $(function() {
        $("#getDate").datepicker({
            dateFormat: 'dd/mm/yy'
        }).val();
    });
</script>
<script>
    CKEDITOR.replace('editor1');
</script>
@endpush

@section('content')
<div class="card">
    <form action="{{ route('admin.booking.update', ['id' => $booking->id]) }}" method="post">
        @csrf
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

        <div class="card-body">
            <div class="form-group">
                <label for="customer">Khách hàng</label>
                <input type="text" class="form-control" name="customer" id="customer" placeholder="Nguyen Van A"
                    value="{{ $booking->customer }}">
            </div>
            <div class="form-group">
                <label for="phone">Số Điện Thoại</label>
                <input type="text" class="form-control" name="phone" id="phone" placeholder="0123456789"
                    value="{{ $booking->phone }}">
                @error('phone')
                <span style="color: red">!!!{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email"
                    value="{{ $booking->email }}">
                @error('email')
                <span style="color: red">!!!{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="service">Dịch Vụ</label>
                <div class="d-flex" style="width:100%">
                    <select class="form-control select2 select2-hidden-accessible" style="width:100%;" id="select-category"
                        name="service">
                        <option selected="selected" data-select2-id="" value=""></option>
                        @foreach ($category as $item)
                        <option value="{{ $item->id }}" {{ $item->id == $booking->service ? "selected" : "" }}>
                            {{ $item->category }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- Barber --}}
            <div id="getBarber">
                <div class="container">
                    <label for="barber">Barber</label><br>
                    <div class="row barber-row">
                        @foreach ($barber as $item)
                        <label class="col-4" for="{{$item->bs+20}}">
                            <div>
                                <input class="radio-barber" type="radio" name="barber" value="{{$item->bs}}"
                                    id="{{$item->bs+20}}" onclick="show()"
                                    {{ $item->id == $booking->barber ? "checked" : "" }}>
                                <div class="img-card">
                                    <img class="img-barber" src="{{ asset($item->images) }}" alt="" width="200px">
                                    <p class="text-barber">Bác Sĩ {{ $item->name }}</p>
                                </div>
                            </div>
                        </label>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="d-flex" style="width: 100%">
                    <div class="form-date">
                        <label for="date-date">Ngày</label>
                        <div id="getDate" data-target="#getDate">
                            <input type="text" name="date" data-target="#getDate" id="date-date"
                                value="{{ $booking->date }}">
                        </div>
                    </div>
                    <div class="form-time">
                        <label for="time">Thời gian</label>
                        <div class="container">
                            <div class="row">
                                <div id="checkSchedule">
                                    <div class="container">
                                        <div class="row">
                                            @for ($i = 7; $i <= 18; $i++)
                                                @php
                                                $m=true;
                                                @endphp
                                                @foreach ($time as $item)
                                                    @php
                                                    if ($i==$item->time) {
                                                        $m=false;
                                                    }
                                                    @endphp
                                                @endforeach
                                                @if ($m==true)
                                                    <label class="col-2 " for="{{$i}}">
                                                        <div class="">
                                                            <input class="radio-time" type="radio" name="time"
                                                                id="{{$i}}" value="{{$i}}"
                                                                {{ $i == $booking->time ? "checked" : "" }}>
                                                            <div class="time-card">
                                                                <div class="time-text">{{$i}}:00</div>
                                                            </div>
                                                        </div>
                                                    </label>
                                                @endif
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="editor1">Chú thích</label>
                <textarea name="text" id="editor1">{{ $booking->text }}</textarea>
            </div>

            <input type="number" name="level" value="1" class="an-input">
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm</button>
        </div>
    </form>
</div>
@endsection

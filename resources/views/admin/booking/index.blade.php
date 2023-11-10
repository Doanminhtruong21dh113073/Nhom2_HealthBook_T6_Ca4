@extends('admin.master')

@section('module', 'Danh Sách')
@section('action', 'Đặt Lịch')

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('administrator/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('administrator/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('administrator/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@push('js')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('administrator/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('administrator/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('administrator/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('administrator/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('administrator/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('administrator/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('administrator/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('administrator/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('administrator/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('administrator/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('administrator/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('administrator/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
@endpush

@push('jshand')
    <script src="{{ asset('js/admin-handlers.js') }}"></script>
@endpush

@section('content')
@if (Auth::user())
    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Thông tin KH</th>
                        <th>Bác Sĩ</th>
                        <th>Combo</th>
                        <th>Dịch Vụ</th>
                        <th>Thời gian</th>
                        <th>Giá dự tính(VND)</th>
                        <th>Trạng thái</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($booking as $bookingItem)
                        @if ($bookingItem->barber == Auth::user()->id || Auth::user()->role == 'admin')
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    KH: {{ $bookingItem->customer }} <br>
                                    Phone: {{ $bookingItem->phone }}
                                </td>
                                <td>{{ $bookingItem->barber_name }}</td>
                                <td>Combo: {{ $bookingItem->category }}</td>
                                <td>{{ $bookingItem->service_name }}</td>
                                <td>
                                    {{ $bookingItem->date }}
                                    {{ $bookingItem->time . ':00' }}
                                </td>
                                <td>
                                    @if ($bookingItem->status == 1)
                                        Đã duyệt
                                    @else
                                        <form method="POST"
                                            action="{{ route('admin.booking.approve', ['id' => $bookingItem->id]) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">Duyệt</button>
                                        </form>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-warning"
                                        href="{{ route('admin.booking.edit', ['id' => $bookingItem->id]) }}">Sửa</a>
                                </td>
                                <td>
                                    <a class="btn btn-danger delete"
                                        data-confirm="Are you sure to delete this item?"
                                        href="{{ route('admin.booking.destroy', ['id' => $bookingItem->id]) }}">Xóa</a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif
@endsection

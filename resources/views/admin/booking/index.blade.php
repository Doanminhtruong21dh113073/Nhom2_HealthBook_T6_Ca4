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
    <script>
        var deleteLinks = document.querySelectorAll('.delete');

        for (var i = 0; i < deleteLinks.length; i++) {
            deleteLinks[i].addEventListener('click', function(event) {
                event.preventDefault();

                var choice = confirm(this.getAttribute('data-confirm'));

                if (choice) {
                    window.location.href = this.getAttribute('href');
                }
            });
        }
    </script>
    <!-- Page specific script -->
    <script type="text/javascript">
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
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
                    @foreach ($booking as $item)
                        @if ($item->barber == Auth::user()->id||Auth::user()->role == 'admin')
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    KH: {{ $item->customer }} <br>
                                    Phone: {{ $item->phone }}
                                </td>
                                <td>{{ $item->barber_name }}</td>
                                <td>Combo: {{ $item->category }}</td>
                                <td>{{ $item->service_name }}</td>
                                <td>
                                    {{ $item->date }}
                                    {{ $item->time . ':00' }}
                                </td>
                                <td>{{ $item->price }}</td>
                                <td>
                                    @if ($item->status == 1)
                                        Đã duyệt
                                    @else
                                        <form method="POST"
                                            action="{{ route('admin.booking.approve', ['id' => $item->id]) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">Duyệt</button>
                                        </form>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-warning"
                                        href="{{ route('admin.booking.edit', ['id' => $item->id]) }}">Sửa</a>
                                </td>
                                <td>
                                    <a class="btn btn-danger delete" data-confirm="Are you sure to delete this item?"
                                        href="{{ route('admin.booking.destroy', ['id' => $item->id]) }}">Xóa</a>
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


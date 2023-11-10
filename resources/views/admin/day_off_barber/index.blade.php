@extends('admin.master')
@section('module', 'Danh Sách')
@section('action', 'Ngày Nghỉ')

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

            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Bác Sĩ</th>
                            <th>Ngày bắt đầu</th>
                            <th>Ngày kết thúc</th>

                            <th>Reason</th>
                            <th>Trạng thái</th>
                            <th>Duyệt</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($date as $item)
                            @if ($item->name == Auth::user()->name || Auth::user()->role == 'admin')
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->start_day }}</td>
                                    <td>{{ $item->end_day }}</td>

                                    <td>{{ $item->reason }}</td>
                                    <td>{{ $item->status == 0 ? 'Chưa duyệt' : 'Đã duyệt' }}</td>
                                    <td>
                                        @if ($item->status == 'active' ||Auth::user()->role == 'admin')
                                            <form method="POST"
                                                action="{{ route('admin.date_off.approve', ['id' => $item->id]) }}">
                                                @csrf
                                                <button type="submit" class="btn btn-primary">Duyệt</button>
                                            </form>
                                        @endif
                                    </td>
                                    <td><a class="btn btn-warning"
                                            href="{{ route('admin.date_off.edit', ['id' => $item->id]) }} ">Sửa</a></td>
                                    <td><a class="delete btn btn-danger" data-confirm="Are you sure to delete this item?"
                                            href="{{ route('admin.date_off.destroy', ['id' => $item->id]) }}">Xóa</a></td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>

                </table>
    @endif
@endsection

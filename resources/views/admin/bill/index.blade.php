@extends('admin.master')
@section('module', 'Danh Sách')
@section('action', 'Bill')

@push('css')
    <link rel="stylesheet" href="{{ asset('administrator/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('administrator/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('administrator/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@push('js')
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
    <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>
                            Khách hàng | Số Điện Thoại </th>
                        <th>
                            Bác Sĩ
                        </th>
                        <th>
                            Combo | Dịch vụ :
                        </th>
                        <th>
                            Ngày | Thời gian
                        </th>
                        <th>Thanh toán</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($booking as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                {{ $item->customer }} <br>
                                {{ $item->phone }}
                            </td>
                            <td> {{ $item->barber_name }}
                            </td>
                            <td>
                                {{ $item->category }} |
                                {{ $item->service_name }}
                            </td>
                            <td>
                                Thời gian : {{ $item->time . ':00' }}
                                <br> Date : {{ $item->created_at }}
                            </td>
                            <td><a class="btn btn-warning"
                                    href="{{ route('admin.cash.create', ['id' => $item->id]) }}">Thanh toán</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

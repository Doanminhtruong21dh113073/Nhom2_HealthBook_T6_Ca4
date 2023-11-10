@extends('admin.master')
@section('module', 'Danh Sách')
@section('action', 'Dịch Vụ Khám Bệnh')

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
@endpush

@section('content')
    <div class="card">

        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Dịch vụ</th>
                        <th>Giá (VND)</th>
                        <th>Mô tả</th>
                        <th>Chuyên khoa khám bệnh</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>

                </thead>
                @foreach ($service as $item)
                    <tr>
                        <td>{{ $item->service }}</td>
                        <td>
                            @php
                                echo number_format(floatval($item->price), 0, '.', ',');
                            @endphp
                        </td>
                        <td>
                            @php
                                echo $item->des;
                            @endphp
                        </td>
                        <td>{{ $item->category }}</td>
                        <td><a href="{{ route('admin.service.edit', ['id' => $item->id]) }}"
                                class="btn btn-warning">Sửa</a></td>
                        <td>
                            <a data-confirm="Are you sure to delete this item?"
                            onsubmit="return confirm('Bạn có chắc chắn muốn xóa ?')"
                                href="{{ route('admin.service.destroy', ['id' => $item->id]) }} "
                                class="delete btn btn-danger">Xóa</a>
                        </td>

                    </tr>
                @endforeach


            </table>
        </div>
        <button type="button" class="btn btn-primary"><a href="{{ route('admin.service.create') }}"
                style="color:aliceblue" class="nav-link">Thêm</a></button>
    </div>
@endsection

@extends('admin.master')
@section('module', 'Danh Sách')
@section('action', 'Bác Sĩ')

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('administrator/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('administrator/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('administrator/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('administrator/dist/css/img.css') }}">
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
    @if (Auth::user())

        <div class="card">
            <div class="card-header">
                <h3 class="card-title"></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>
                                Thông tin Bác Sĩ
                            </th>
                            <th>Hình Đại Diện</th>
                            <th>Dịch vụ làm</th>
                            <th>Cấp bậc</th>
                            <th>Thông tin </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $id => $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    Họ và tên : {{ $user['user']->name }} <br>
                                    Phone : {{ $user['user']->phone }}<br>
                                    Email :{{ $user['user']->email }}
                                    <br>
                                    Giới Tính : {{ $user['user']->gender  }}
                                    <br>
                                    Ngày vào làm : {{ $user['created_at'] }}
                                </td>
                                <td><img src="{{ asset($user['user']->images) }}" alt="avatar" width="120"></td>
                                <td>
                                    <?php foreach ($user['services'] as $service): ?>
                                    <?php echo $service; ?><br><br>
                                    <?php endforeach; ?>
                                </td>
                                <td>{{ $user['user']->role }}</td>
                                <td>
                                    <a href="{{ route('admin.user.edit', $id) }}" class="btn btn-warning">Update</a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
    @endif
@endsection

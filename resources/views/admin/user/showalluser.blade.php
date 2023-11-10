@extends('admin.master')
@section('module', 'Danh Sách')
@section('action', 'Nhân Sự')

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
@endpush

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr style="text-align: center">
                        <th>STT</th>
                        <th>
                            Thông tin nhân sự
                        </th>
                        <th>Hình Đại Diện</th>

                        <th>Cấp bậc</th>
                        <th colspan="2">Tình Trạng</th>
                        <th>Ngày vào làm</th>
                    </tr>
                </thead>
                <tbody style="text-align: center">
                    @foreach ($user as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                {{ $item->name }} <br>
                                {{ $item->phone }} <br>
                                {{ $item->email }} <br>
                                {{ $item->gender == '1' ? 'Nam' : 'Nữ' }}
                            </td>
                            <td><img class="img_form" src="{{ asset($item->images) }}" width="100"
                                    style="border-radius:20%" alt="error"></td>

                            <td>{{ $item->role }}</td>
                            <td>
                                @if ($item->status == 'inactive')
                                @elseif($item->status == 'active')
                                    Đang làm
                                @endif

                                @if ($item->status == 'inactive' && $item->id !== 1)
                                    <form method="POST" action="{{ route('admin.user.approve', ['id' => $item->id]) }}"
                                        onsubmit="return confirm('Bạn có chắc chắn muốn kích hoạt tài khoản này?')">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Kích hoạt</button>
                                    </form>
                                @endif
                            </td>

                            <td>
                                @if ($item->status == 'active' && $item->id !== 1)
                                    <form method="POST" action="{{ route('admin.user.firer', ['id' => $item->id]) }}"
                                        onsubmit="return confirm('Bạn có chắc chắn muốn cho nhân viên này nghỉ việc?')">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Nghỉ việc ?</button>
                                    </form>
                                @endif

                            </td>


                            <td>{{ $item->created_at }}</td>

                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
@endsection

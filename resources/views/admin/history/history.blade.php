@extends('admin.master')
@section('module','Lịch Sử')
@section('action','Khách Hàng') 

@push('css')
    <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('administrator/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('administrator/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('administrator/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endpush

@push('js')
<!-- DataTables  & Plugins -->
<script src="{{asset('administrator/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('administrator/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('administrator/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('administrator/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('administrator/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('administrator/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('administrator/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('administrator/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('administrator/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('administrator/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('administrator/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('administrator/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    
@endpush

@push('jshand')
    <!-- Page specific script -->
<script type="text/javascript">
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
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
                <th>Khách hàng</th>
                <th>Số Điện Thoại</th>
                <th>Email</th>
                <th>Combo</th>
                <th>Dịch vụ</th>
                <th>Bác Sĩ</th>
                <th>Ngày</th>
                <th>Thời gian</th>
                <th>Tình trạng</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($booking as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->customer}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->category}}</td>
                    <td>{{$item->service_name}}</td>
                    <td>{{$item->barber_name}}</td>
                    <td>{{$item->date}}</td>
                    <td>{{$item->time.':00'}}</td>
                    <td>Đã thanh toán</td>
                </tr>
            
            @endforeach
            
           
        </tbody>
    </table>
@endsection
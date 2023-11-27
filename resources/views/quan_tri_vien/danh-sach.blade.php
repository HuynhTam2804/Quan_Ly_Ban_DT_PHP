@extends('layout')
@section('page-js')
    @if (session('thong_bao'))
        <script>
            Swal.fire("{{session('thong_bao')}}")
        </script>
    @endif
@endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Danh Sách Quản Trị Viên</h1>
        <a href="{{ route('quantrivien.them-moi') }}">Thêm Mới</a>
    </div>
    <table class="table table-hover">
        <tr>
            <th>ID</th>
            <th>Quản Trị Viên</th>
            <th>Giới Tính</th>
            <th>Số Điện Thoại</th>
            <th>Email</th>
            <th>Địa Chỉ</th>
            <th>Chức Năng</th>
        </tr>
        @foreach ($QTV as $quanTriVien)
            <tr>
                <th>{{ $quanTriVien->id }}</th>
                <th>{{ $quanTriVien->ten }}</th>
                <th>{{ $quanTriVien->gioi_tinh }}</th>
                <th>{{ $quanTriVien->sdt }}</th>
                <th>{{ $quanTriVien->email }}</th>
                <th>{{ $quanTriVien->dia_chi }}</th>
                <th>
                    <a href="{{ route('quantrivien.xl-capnhat', ['id' => $quanTriVien->id]) }}">Sửa</a>|
                    <a href="{{ route('quantrivien.xoa', ['id' => $quanTriVien->id]) }}">Xóa</a>
                </th>
            </tr>
        @endforeach
    </table>

@endsection

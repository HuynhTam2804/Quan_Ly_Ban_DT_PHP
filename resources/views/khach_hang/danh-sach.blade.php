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
        <h1 class="h2">Danh Sách Khách Hàng</h1>
        <a href="{{ route('khachhang.them-moi') }}">Thêm Mới</a>
    </div>
    <table class="table table-hover">
        <tr>
            <th>ID</th>
            <th>Khách Hàng</th>
            <th>Email</th>
            <th>Giới Tính</th>
            <th>Số Điện Thoại</th>
            <th>Địa Chỉ</th>
            <th>Chức Năng</th>
        </tr>
        @foreach ($KH as $khachHang)
            <tr>
                <th>{{ $khachHang->id }}</th>
                <th>{{ $khachHang->ten }}</th>
                <th>{{ $khachHang->email }}</th>
                <th>{{ $khachHang->gioi_tinh }}</th>
                <th>{{ $khachHang->sdt }}</th>
                <th>{{ $khachHang->dia_chi }}</th>
                <th>
                    <a href="{{ route('khachhang.xl-capnhat', ['id' => $khachHang->id]) }}">Sửa</a>|
                    <a href="{{ route('khachhang.xoa', ['id' => $khachHang->id]) }}">Xóa</a>
                </th>
            </tr>
        @endforeach
    </table>

@endsection

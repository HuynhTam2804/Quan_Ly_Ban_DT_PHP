@extends('layout')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Chi Tiết Hóa Đơn Xuất</h1>
        <a href="{{ route('hoadonxuat.them-moi') }}">Thêm Mới</a>
    </div>

    <table class="table table-hover">
        <tr>
            <th>ID</th>
            <th>Tên Sản Phẩm</th>
            <th>Giá Bán</th>
            <th>Số Lượng</th>
            <th>Thành Tiền</th>
            <th>Chức Năng</th>
        </tr>
        @foreach ($CTHDX as $CTHoaDonXuat)
            <tr>
                <th>{{ $CTHoaDonXuat->id }}</th>

                <th>{{ $CTHoaDonXuat->san_pham->ten }}</th>

                <th>{{ $CTHoaDonXuat->gia_ban }}</th>
                
                <th>{{ $CTHoaDonXuat->so_luong }}</th>
                
                <th>{{ $CTHoaDonXuat->thanh_tien }}</th>
                
                <th>
                    {{-- <a href="{{ route('hoadonnhap.xl-capnhat', ['id' => $CTHDN->id]) }}">Cập Nhật</a> --}}
                </th>
            </tr>
        @endforeach
    </table>
    <button class="btn"><a href="{{ route('hoadonxuat.danh-sach') }}">Xem Danh Sách Hóa Đơn Xuất</a></button>
@endsection
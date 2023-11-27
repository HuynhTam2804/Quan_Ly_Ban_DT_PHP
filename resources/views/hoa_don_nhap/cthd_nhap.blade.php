@extends('layout')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Chi Tiết Hóa Đơn Nhập</h1>
        <a href="{{ route('hoadonnhap.them-moi') }}">Thêm Mới</a>
    </div>

    <table class="table table-hover">
        <tr>
            <th>ID</th>
            <th>Tên Sản Phẩm</th>
            <th>Giá Nhập</th>
            <th>Giá Bán</th>
            <th>Số Lượng</th>
            <th>Thành Tiền</th>
            <th>Chức Năng</th>
        </tr>
        @foreach ($CTHDN as $CTHoaDonNhap)
            <tr>
                <th>{{ $CTHoaDonNhap->id }}</th>

                <th>{{ $CTHoaDonNhap->san_pham->ten }}</th>

                <th>{{ $CTHoaDonNhap->gia_nhap }}</th>
                
                <th>{{ $CTHoaDonNhap->gia_ban }}</th>
                
                <th>{{ $CTHoaDonNhap->so_luong }}</th>
                
                <th>{{ $CTHoaDonNhap->thanh_tien }}</th>
                
                <th>
                    {{-- <a href="{{ route('hoadonnhap.xl-capnhat', ['id' => $CTHDN->id]) }}">Cập Nhật</a> --}}
                </th>
            </tr>
        @endforeach
    </table>
    <button class="btn"><a href="{{ route('hoadonnhap.danh-sach') }}">Xem Danh Sách Hóa Đơn Nhập</a></button>
@endsection
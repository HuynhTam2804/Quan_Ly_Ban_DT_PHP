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
        <h1 class="h2">Danh Sách Sản Phẩm</h1>
        <a href="{{ route('sanpham.them-moi') }}">Thêm Mới</a>

    </div>
    <table class="table table-hover">
        <tr>
            <th>ID</th>
            <th>Sản Phẩm</th>
            <th>Giá Nhập</th>
            <th>Giá Bán</th>
            <th>Số Lượng</th>
            <th>Loại Sản Phẩm</th>
            <th>Mô Tả</th>
            <th>Hình Ảnh</th>
            <th>Chức Năng</th>
        </tr>
        @foreach ($SP as $sanPham)
            <tr>
                <th>{{$sanPham->id}}</th>
                <th>{{ $sanPham->ten }}</th>
                <th>{{ $sanPham->gia_nhap }}</th>
                <th>{{ $sanPham->gia_ban }}</th>
                <th>{{ $sanPham->so_luong }}</th>
                <th>{{ $sanPham->loai_san_pham->ten}}</th>
                <th>{{ $sanPham->mo_ta }}</th>
                <th>
                    @foreach ($hinh as $dsHinh)
                        @if ($dsHinh->san_pham_id == $sanPham->id)
                            <img src="{{ asset($dsHinh->url) }}" style="width:50px" />
                        @endif
                    @endforeach
                </th>
                <th>
                    <a href="{{ route('sanpham.xl-capnhat', ['id' => $sanPham->id]) }}">Sửa</a>|
                    <a href="{{ route('sanpham.xoa', ['id' => $sanPham->id]) }}">Xóa</a>
                </th>
            </tr>
        @endforeach
    </table>

@endsection

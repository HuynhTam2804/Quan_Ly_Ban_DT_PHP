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
        <h1 class="h2">Danh Sách Loại Sản Phẩm</h1>
        
        <a href="{{ route('loaisanpham.them-moi')}}">Thêm Mới</a>

        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>
    <table class="table table-hover">
        <tr>
            <th>ID</th>
            <th>Loại Sản Phẩm</th>
            <th>Chức Năng</th>
        </tr>
        @foreach($LSP as $loaiSanPham)
        <tr>
            <th>{{$loaiSanPham->id}}</th>
            <th>{{$loaiSanPham->ten}}</th>
            <th>
                <a href="{{route('loaisanpham.xl-capnhat',['id'=>$loaiSanPham->id])}}">Sửa</a>|
                <a href="{{route('loaisanpham.xoa',['id'=>$loaiSanPham->id])}}">Xóa</a>
            </th>
        </tr>
        @endforeach
    </table>
@endsection

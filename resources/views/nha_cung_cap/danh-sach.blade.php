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
        <h1 class="h2">Danh Sách Các Nhà Cung Cấp </h1>
        <a href="{{ route('nhacungcap.them-moi')}}">Thêm Mới</a>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>
    <table class="table table-hover">
        <tr>
            <th>ID</th>
            <th>Nhà Cung Cấp</th>
            <th>Số Điện Thoại</th>
            <th>Địa Chỉ</th>
            <th>Mô Tả</th>
            <th>Chức Năng</th>
        </tr>
        @foreach($NCC as $nhaCungCap)
        <tr>
            <th>{{$nhaCungCap->id}}</th>
            <th>{{$nhaCungCap->ten}}</th>
            <th>{{$nhaCungCap->sdt}}</th>
            <th>{{$nhaCungCap->dia_chi}}</th>
            <th>{{$nhaCungCap->mo_ta}}</th>

            <th>
                <a href="{{route('nhacungcap.xl-capnhat',['id'=>$nhaCungCap->id])}}">Sửa</a>|
                <a href="{{route('nhacungcap.xoa',['id'=>$nhaCungCap->id])}}">Xóa</a>
            </th>
        </tr>
        @endforeach
    </table>
@endsection

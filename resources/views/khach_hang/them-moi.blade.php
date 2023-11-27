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
    </div>
    <form method="POST" action="{{ route('khachhang.xl-themmoi') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputTen" class="form-label">Khách Hàng</label>
            <input type="text" class="form-control" name="ten">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail" class="form-label">Email</label>
            <input type="email" class="form-control" name="email">
        </div>
        <div class="mb-3">
            <label for="exampleInputGioiTinh" class="form-label">Giới Tính</label>
            <input type="text" class="form-control" name="gioi_tinh">
        </div>
        <div class="mb-3">
            <label for="exampleInputGioiTinh" class="form-label">Số Điện Thoại</label>
            <input type="text" class="form-control" name="sdt">
        </div>
        <div class="mb-3">
            <label for="exampleInputDiaChi" class="form-label">Địa Chỉ</label>
            <input type="text" class="form-control" name="dia_chi">
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
@endsection

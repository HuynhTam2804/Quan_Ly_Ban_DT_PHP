@extends('layout')
{{-- @section('page-js')
    @if (session('thong_bao'))
        <script>
            Swal.fire("{{session('thong_bao')}}")
        </script>
    @endif
@endsection --}}
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Cập Nhật Nhà Cung Cấp</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
</div>
    <form method="POST" action="{{ route('nhacungcap.xl-capnhat', ['id' => $NCC->id]) }}">
        @csrf
        <div class="mb-3">
            <label for="exampleInputTen" class="form-label">Nhà Cung Cấp</label>
            <input type="text" class="form-control" name="ten" value="{{$NCC->ten}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputSDT" class="form-label">Số Điện Thoại</label>
            <input type="text" class="form-control" name="sdt" value="{{$NCC->sdt}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputDiaChi" class="form-label">Địa Chỉ</label>
            <input type="text" class="form-control" name="dia_chi" value="{{$NCC->dia_chi}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputMoTa" class="form-label">Mô Tả</label>
            <input type="text" class="form-control" name="mo_ta" value="{{$NCC->mo_ta}}">
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
@endsection

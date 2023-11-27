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
        <h1 class="h2">Thêm Nhà Cung Cấp</h1>
    </div>
    <form method="POST" action="{{ route('nhacungcap.xl-themmoi') }}" >
        @csrf
        
        <div class="mb-3">
            <label for="exampleInputTen" class="form-label">Nhà Cung Cấp</label>
            <input type="text" class="form-control" name="ten">
        </div>
        <div class="mb-3">
            <label for="exampleInputTen" class="form-label">Số Điện Thoại</label>
            <input type="text" class="form-control" name="sdt">
        </div>
        <div class="mb-3">
            <label for="exampleInputGiaNhap" class="form-label">Địa Chỉ</label>
            <input type="text" class="form-control" name="dia_chi">
        </div>
        <div class="mb-3">
            <label for="exampleInputGiaNhap" class="form-label">Mô Tả</label>
            <input type="text" class="form-control" name="mo_ta">
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
@endsection

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
        <h1 class="h2">Cập Nhật Sản Phẩm</h1>
    </div>
    <form method="POST" action="{{ route('sanpham.xl-capnhat', ['id' => $SP->id]) }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputTen" class="form-label">Sản Phẩm</label>
            <input type="text" class="form-control" name="ten" value="{{ $SP->ten }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputGiaBan" class="form-label">Giá Nhập</label>
            <input type="number" class="form-control" name="gia_nhap" value="{{ $SP->gia_nhap }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputGiaBan" class="form-label">Giá Bán</label>
            <input type="number" class="form-control" name="gia_ban" value="{{ $SP->gia_ban }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputSoLuong" class="form-label">Số Lượng</label>
            <input type="number" class="form-control" name="so_luong"  value="{{ $SP->so_luong }}">
        </div>
        <div class="mb-3">
            <select class="form-control" name="loai_san_pham_id">
                @foreach ($LSP as $loaiSanPham)
                    <option value="{{ $loaiSanPham->id }}" 
                        @if( $loaiSanPham->id == $SP->loai_san_pham_id) selected @endif>
                        {{ $loaiSanPham->ten }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputHinhAnh" class="form-label">Chọn Hình</label>
            <input type="file" class="form-control" name="hinh_anh[]" multiple value="{{ $SP->hinh_anh }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputMota" class="form-label">Mô Tả</label>
            <input type="text" class="form-control" name="mo_ta" value="{{ $SP->mo_ta }}">
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
@endsection

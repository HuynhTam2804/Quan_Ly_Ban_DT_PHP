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
        <h1 class="h2">Thêm Loại Sản Phẩm</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>
    <form method="POST" action="{{ route('loaisanpham.xl-themmoi') }}">
        @csrf
        <div class="mb-3">
            <label for="exampleInputTen" class="form-label">Loại Sản Phẩm</label>
            <input type="text" class="form-control"  name="ten">
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>

@endsection

@extends('layout')
@section('content')
    @if (session('thong_bao'))
        <script>
            Swal.fire("{{ session('thong_bao') }}")
        </script>
    @endif
    <h2>Nhập Hàng </h2>
    <div class="mb-3">
        <label for="exampleInputNhaCungCap" class="form-label">Chọn Nhà Cung Cấp</label>
        <select name="nha_cung_cap_id" id="ncc">
            @foreach ($NCC as $nhacungcap)
                <option value="{{ $nhacungcap->id }}">{{ $nhacungcap->ten }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="exampleInputGiaNhap" class="form-label"h2>Ngày Nhập</label>
        <input type="date" class="form-control" name="ngay_nhap" id="ngaynhap">
    </div>
    <h2>Danh Sách Sản Phẩm </h2>
    <div class="mb-3">
        <label for="exampleInputTen" class="form-label">Chọn Sản Phẩm</label>
        <select name="san_pham_id" id="san_pham_id">
            @foreach ($SP as $sanpham)
                <option value="{{ $sanpham->id }}">{{ $sanpham->ten }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="exampleInputSoLuong" class="form-label">Giá Nhập</label>
        <input type="number" class="form-control" name="gia_nhap" id="gia_nhap">
    </div>
    <div class="mb-3">
        <label for="exampleInputSoLuong" class="form-label">Giá Bán</label>
        <input type="number" class="form-control" name="gia_ban" id="gia_ban">
    </div>
    <div class="mb-3">
        <label for="exampleInputSoLuong" class="form-label">Số Lượng </label>
        <input type="number" class="form-control" name="so_luong" id="so_luong">
    </div>
    <button id="btn-them" class="btn btn-primary ">Thêm</button>

    <form method="POST" id="myForm">
        @csrf
        <table id="myTable" class="table table-hover">
            <tr>
                <td>STT</td>
                <td>Sản Phẩm</td>
                <td>Giá Nhập</td>
                <td>Giá Bán</td>
                <td>Số Lượng</td>
                <td>Thành Tiền</td>
                <td>Chức Năng</td>
            </tr>


        </table>
        <input value="1" type="hidden" name="nha_cung_cap_id" id="nha_cung_cap_id" class="form-control">
        <input class="form-control" type="hidden" name="ngay_nhap" id="ngay_nhap">
        <button type="submit" class="btn btn-primary btnSave">Lưu</button>
    </form>
    
@endsection

@section('page-js')
   
    <script>
        function xoaHang(button) {

            var row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }

        $(document).ready(function() {
            var stt = 0;

            $("#btn-them").click(function() {
                stt = stt + 1;
                var tenSP = $("#san_pham_id").find(":selected").text();
                var IDtenSP = $("#san_pham_id").find(":selected").val();
                var soluong = $("#so_luong").val();
                var giaban = $("#gia_ban").val();
                var gianhap = $("#gia_nhap").val();
                var thanhtien = soluong * gianhap;

                var row = `  <tr>
                <td>${stt}</td>
                <td>${tenSP}    <input type="hidden"  name="san_pham_id[]"  value="${IDtenSP}"></td>
                <td>${soluong}  <input type="hidden"  name="so_luong[]"     value="${soluong}"></td>
                <td>${giaban}   <input type="hidden"  name="gia_ban[]"      value="${giaban}"></td>
                <td>${gianhap}  <input type="hidden"  name="gia_nhap[]"     value="${gianhap}"></td>
                <td>${thanhtien}<input type="hidden"  name="thanh_tien[]"   value="${thanhtien}"></td>
                <td>
                <button onclick="xoaHang(this)">Xóa</button>
                </td>
                </tr>`;

                $("#myTable").append(row);
            })
            $("#ncc").change(function() {
                $("#nha_cung_cap_id").val(this.value);
            });

            $("#ngaynhap").change(function() {
                $("#ngay_nhap").val(this.value);
            });

        });
    </script>
@endsection

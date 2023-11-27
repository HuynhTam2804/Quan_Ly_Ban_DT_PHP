@extends('layout')
@section('content')
    @if (session('thong_bao'))
        <script>
            Swal.fire("{{ session('thong_bao') }}")
        </script>
    @endif
    <h2>Xuất Hàng </h2>
    <div class="mb-3">
        <label for="exampleInputNhaCungCap" class="form-label">Chọn Khách Hàng</label>
        <select name="khach_hang_id" id="kh">
            @foreach ($KH as $khachHang)
                <option value="{{ $khachHang->id }}">{{ $khachHang->ten }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="exampleInputGiaNhap" class="form-label"h2>Ngày Xuất</label>
        <input type="date" class="form-control" name="ngay_xuat" id="ngayxuat">
    </div>
    <h2>Danh Sách Sản Phẩm </h2>
    <div class="mb-3">
        <label for="exampleInputTen" class="form-label">Chọn Sản Phẩm</label>
        <select name="san_pham_id" id="san_pham_id">
            @foreach ($SP as $sanpham)
                <option data-sluongton="{{ $sanpham->so_luong }}" data-price="{{ $sanpham->gia_ban }}" value="{{ $sanpham->id }}">{{ $sanpham->ten }}</option>
            @endforeach
        </select>
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
                <td>Số Lượng</td>
                <td>Giá Bán</td>
                <td>Thành Tiền</td>
                <td>Chức Năng</td>
            </tr>


        </table>
        <input value="1" type="hidden" name="khach_hang_id" id="khach_hang_id" class="form-control">
        <input class="form-control" type="hidden" name="ngay_xuat" id="ngay_xuat">
        <button type="submit" class="btn btn-primary btnSave">Lưu</button>
    </form>
    <input type="text" id="sl">
    
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
                var thanhtien = soluong * giaban;

                var SLT = $("#sl").val();
                if(soluong>SLT){
                    alert("Số lượng bạn vừa nhập đã vượt quá số lượng tồn trong kho!!");
                }

                var row = `  <tr>
                <td>${stt}</td>
                <td>${tenSP}    <input type="hidden"  name="san_pham_id[]"  value="${IDtenSP}"></td>
                <td>${soluong}  <input type="hidden"  name="so_luong[]"     value="${soluong}"></td>
                <td>${giaban}   <input type="hidden"  name="gia_ban[]"      value="${giaban}"></td>
                <td>${thanhtien}<input type="hidden"  name="thanh_tien[]"   value="${thanhtien}"></td>
                <td>
                <button onclick="xoaHang(this)">Xóa</button>
                </td>
                </tr>`;

                $("#myTable").append(row);
            })
            $("#kh").change(function() {
                $("#khach_hang_id").val(this.value);
            });

            $("#ngayxuat").change(function() {
                $("#ngay_xuat").val(this.value);
            });

            $('#san_pham_id').change(function(){
                var GB =$("#san_pham_id option:selected").data("price");
                console.log(GB);
                $('#gia_ban').val(GB);

            });
            $('#san_pham_id').change(function(){
                var SL = $("#san_pham_id option:selected").data("sluongton");
                $('#sl').val(SL);
            })
        });
    </script>
@endsection

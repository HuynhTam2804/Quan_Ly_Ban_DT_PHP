@extends('layout')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Danh Sách Hóa Đơn Nhập</h1>
        <a href="{{ route('hoadonnhap.them-moi') }}">Thêm Mới</a>
        <button class="btn"><a href="{{ route('hoadonnhap.view-pdf') }}">View PDF</a></button>
        <button class="btn"><a href="{{ route('hoadonnhap.download-pdf') }}">Download PDF</a></button>
    </div>

    <table class="table table-hover">
        <tr>
            <th>ID</th>
            <th>Nhà Cung Cấp</th>
            <th>Người Quản Lý</th>
            <th>Ngày Nhập</th>
            <th>Chức Năng</th>
        </tr>
        @foreach ($HDN as $HoaDonNhap)
            <tr>
                <th>{{$HoaDonNhap->id}}</th>
                
                <th>{{ $HoaDonNhap->nha_cung_cap->ten }}</th>

                <th>{{ $HoaDonNhap->admin->ten_dang_nhap }}</th>

                <th>{{ $HoaDonNhap->ngay_nhap }}</th>

                <th>
                    <a href="{{ route('cthoadonnhap.chi-tiet', ['hd_nhap_id' => $HoaDonNhap->id]) }}">Chi Tiết</a>|
                    <a href="{{ route('hoadonnhap.viewdetail-pdf', ['id' => $HoaDonNhap->id]) }}">In</a>|
                    <a href="{{ route('hoadonnhap.xoa', ['id' => $HoaDonNhap->id]) }}">Xóa</a>
                </th>

            </tr>
        @endforeach
    </table>
@endsection

@section('page-js')
    @if (session('thong_bao'))
        <script>
            Swal.fire("{{ session('thong_bao') }}")
        </script>
    @endif

    {{-- <script>
        $(document).ready(function() {
            $(".btn-tim").click(function() {
                var hoaDonId = $(this).data('id');
                console.log(hoaDonId);
                $('table#hover').empty();

                $.ajax({
                    url: "{{ route('hoadon.LayChiTietHoaDonNhap', '') }}/" + hoaDonId,
                    method: 'GET',
                    success: function(data) {
                        console.log(data);
                        var newRow = '<tr>' +
                            '<td>' + 'Sản Phẩm ID' + '</td>' +
                            '<td>' + 'Số Lượng' + '</td>' +
                            '<td>' + 'Giá Nhập' + '</td>' +
                            '<td>' + 'Giá Bán' + '</td>' +
                            '<td>' + 'Thành Tiền' + '</td>' +
                           
                            '</tr>';
                        $('table#hover').append(newRow);

                        data.forEach(function(item) {
                            var newRow = '<tr>' +
                                '<td>' + item.san_pham_id + '</td>' +
                                '<td>' + item.so_luong + '</td>' +
                                '<td>' + item.gia_nhap + '</td>' +
                                '<td>' + item.gia_ban + '</td>' +
                                '<td>' + item.thanh_tien + '</td>' +
                                '</tr>';
                            $('table#hover').append(newRow);
                        });
                    },
                });
            });
        });
    </script> --}}
@endsection

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Chi Tiết Hóa Đơn Xuất</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        *{
            font-family: DejaVu Sans, sans-serif;
        }
        body{
            font-size: 12px;
        }
        td{
            vertical-align: middle;
            text-align: center;
        }
        table{
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <table class="table table-hover">
        <tr>
            <th>STT</th>
            <th>Sản Phẩm</th>
            <th>Giá Bán</th>
            <th>Số Lượng</th>
            <th>Thành Tiền</th>
        </tr>
        @foreach ($data as $item)
            <tr>
                <th>{{$item->id}}</th>
                <th>{{ $item->san_pham->ten }}</th>
                <th>{{ $item->gia_ban }}</th>
                <th>{{ $item->so_luong }}</th>
                <th>{{ $item->thanh_tien }}</th>
            </tr>
        @endforeach
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html> 

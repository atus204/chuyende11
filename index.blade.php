<!DOCTYPE html>
<html>
<head>
    <title>Quản lý sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-4">

<h2>Quản lý sản phẩm</h2>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<form method="GET" class="mb-3">
    <input type="text" name="search" class="form-control" placeholder="Tìm sản phẩm...">
</form>

<a href="{{ route('products.create') }}" class="btn btn-success mb-3">Thêm</a>

<table class="table table-bordered">
<tr>
    <th>Tên</th>
    <th>Giá</th>
    <th>Số lượng</th>
    <th>Danh mục</th>
    <th>Trạng thái</th>
    <th>Hành động</th>
</tr>

@foreach($products as $p)
<tr>
    <td>{{ $p->name }}</td>
    <td>{{ $p->price }}</td>
    <td>{{ $p->quantity }}</td>
    <td>{{ $p->category }}</td>

    <td>
        @if($p->quantity == 0)
            <span class="text-danger">Hết hàng</span>
        @elseif($p->quantity < 5)
            <span class="text-warning">Sắp hết</span>
        @else
            <span class="text-success">Còn hàng</span>
        @endif
    </td>

    <td>
        <a href="{{ route('products.edit',$p->id) }}" class="btn btn-warning btn-sm">Sửa</a>

        <form action="{{ route('products.destroy',$p->id) }}" method="POST" style="display:inline">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm">Xóa</button>
        </form>
    </td>
</tr>
@endforeach
</table>

{{ $products->links() }}

</body>
</html>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm sinh viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-4">

<h2>Thêm sinh viên</h2>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST" action="{{ route('students.store') }}">
    @csrf

    <input type="text" name="name" class="form-control mb-2" placeholder="Tên">
    <input type="text" name="major" class="form-control mb-2" placeholder="Ngành">
    <input type="email" name="email" class="form-control mb-2" placeholder="Email">

    <button class="btn btn-primary">Lưu</button>
    <a href="{{ route('students.index') }}" class="btn btn-secondary">Quay lại</a>
</form>

</body>
</html>
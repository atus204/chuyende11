<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Thêm sinh viên</title>
    <style>body{background:#f7f7fb}</style>
</head>
<body>
<div class="container py-4">
    <div class="card mx-auto shadow-sm" style="max-width:720px">
        <div class="card-body">
            <h3 class="card-title mb-3">Thêm sinh viên</h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('students.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Tên</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Ngành</label>
                    <input type="text" name="major" class="form-control" value="{{ old('major') }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                </div>

                <div class="d-flex gap-2">
                    <button class="btn btn-primary">Lưu</button>
                    <a href="{{ route('students.index') }}" class="btn btn-secondary">Hủy</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
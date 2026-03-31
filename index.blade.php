<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Danh sách sinh viên</title>
    <style>
        body{background:#f7f7fb}
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
  <div class="container">
    <a class="navbar-brand" href="#">Quản lý</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link active" href="{{ route('students.index') }}">Sinh viên</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('courses.index') }}">Môn học</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('enrollments.index') }}">Đăng ký</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4">Danh sách sinh viên</h1>
        <a class="btn btn-success" href="{{ route('students.create') }}">Thêm sinh viên</a>
    </div>

    <form class="row g-2 mb-3" method="get" action="{{ route('students.index') }}">
        <div class="col-auto">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Tìm theo tên">
        </div>
        <div class="col-auto">
            <button class="btn btn-outline-primary">Tìm</button>
        </div>
    </form>

    <div class="table-responsive bg-white shadow-sm rounded">
    <table class="table table-striped mb-0">
        <thead class="table-light">
        <tr>
            <th>#</th>
            <th>Tên</th>
            <th>Ngành</th>
            <th>Email</th>
            <th>Tổng tín chỉ</th>
        </tr>
        </thead>
        <tbody>
        @forelse($students as $i => $s)
            <tr>
                <td>{{ $students->firstItem() + $i }}</td>
                <td>{{ $s->name }}</td>
                <td>{{ $s->major }}</td>
                <td>{{ $s->email }}</td>
                <td>{{ $s->totalCredits() }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">Không có dữ liệu</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    </div>

    <div class="d-flex justify-content-between align-items-center mt-3">
        <div>Hiển thị {{ $students->firstItem() ?? 0 }} - {{ $students->lastItem() ?? 0 }} / {{ $students->total() }}</div>
        <div>{{ $students->links('pagination::bootstrap-5') }}</div>
    </div>

</div>

</body>
</html>
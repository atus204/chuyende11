<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách sinh viên</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-4">

    <h2 class="mb-4">📚 Danh sách sinh viên</h2>

    <!-- Thông báo -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Nút thêm -->
    <a href="{{ route('students.create') }}" class="btn btn-success mb-3">
        ➕ Thêm sinh viên
    </a>

    <!-- Bảng -->
    <table class="table table-bordered table-hover text-center">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Tên</th>
                <th>Ngành</th>
                <th>Email</th>
                <th width="180">Hành động</th>
            </tr>
        </thead>

        <tbody>
            @forelse($students as $key => $sv)
            <tr>
                <td>{{ $students->firstItem() + $key }}</td>
                <td>{{ $sv->name }}</td>
                <td>{{ $sv->major }}</td>
                <td>{{ $sv->email }}</td>
                <td>
                    <!-- Sửa -->
                    <a href="{{ route('students.edit', $sv->id) }}" class="btn btn-warning btn-sm">
                        ✏️ Sửa
                    </a>

                    <!-- Xoá -->
                    <form action="{{ route('students.destroy', $sv->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Bạn có chắc muốn xoá?')" class="btn btn-danger btn-sm">
                            🗑 Xoá
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5">Không có dữ liệu</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Phân trang -->
    <div class="d-flex justify-content-center">
        {{ $students->links('pagination::bootstrap-5') }}
    </div>

</body>
</html>
<form method="POST" action="{{ route('products.store') }}">
@csrf

<input name="name" class="form-control mb-2" placeholder="Tên">
<input name="price" class="form-control mb-2" placeholder="Giá">
<input name="quantity" class="form-control mb-2" placeholder="Số lượng">
<input name="category" class="form-control mb-2" placeholder="Danh mục">

<button class="btn btn-primary">Lưu</button>
</form>
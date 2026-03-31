<form method="POST" action="{{ route('products.update',$product->id) }}">
@csrf
@method('PUT')

<input name="name" value="{{ $product->name }}" class="form-control mb-2">
<input name="price" value="{{ $product->price }}" class="form-control mb-2">
<input name="quantity" value="{{ $product->quantity }}" class="form-control mb-2">
<input name="category" value="{{ $product->category }}" class="form-control mb-2">

<button class="btn btn-primary">Cập nhật</button>
</form>
<form action="{{ route('products.update', ['id' => $product->id]) }}" method="post" enctype="multipart/form-data">
    @csrf  

    <div class="form-group">
        <label for="name">Tên sản phẩm</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
    </div>

    <div class="form-group">
        <label for="price">Giá bán</label>
        <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}">
    </div>

    <div class="form-group">
        <label for="description">Mô tả</label>
        <textarea class="form-control" id="description" name="description">{{ $product->description }}</textarea>
    </div>

    <div class="form-group">
        <label for="image">Hình ảnh</label>
        <input type="file" class="form-control-file" id="image" name="image">
    </div>

    <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>
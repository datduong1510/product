<table class="table">
    <thead>
        <tr>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Giá bán</th>
            <th>Mô tả</th>
            <th> </th>
            <th> </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td><img height="200" width="300" src="{{ asset($product->image) }}" alt="{{ $product->name }}" ></td>
            <td>{{ auth()->check() ? $product->price : "Lien he" }}</td>
            <td>{{ $product->description }}</td>
             <td> <a href="{{ route('products.detail', $product->id) }}" class="btn btn-primary">Sửa</a></td>
             <td> <a href="{{ route('products.destroy', $product->id) }}" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')">Xóa</a>
</td>
        </tr>

        @endforeach
    </tbody>
</table>
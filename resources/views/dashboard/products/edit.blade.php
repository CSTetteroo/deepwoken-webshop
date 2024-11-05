@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Product</h1>
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
        </div>

        <div class="form-group">
            <label for="description">Product Description</label>
            <textarea class="form-control" id="description" name="description" required>{{ $product->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="price">Product Price</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
        </div>

        <div class="form-group">
            <label for="stock">Product Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" value="{{ $product->amount_available }}" required>
        </div>

        <div class="form-group">
            <label for="type">Product Type</label>
            <select class="form-control" id="type" name="type" required>
                @foreach ($types as $type)
                <option value="{{ $type->id }}" @if($product->type_id == $type->id) selected @endif>{{ $type->type }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="image">Product Image</label>
            <input type="text" class="form-control" id="image" name="image" value="{{ $product->image }}" required>
        </div>

        <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
</div>
@endsection

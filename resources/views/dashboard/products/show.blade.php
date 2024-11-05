@extends('layouts.app')
@extends('layouts.base')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Stock</th>
                <th scope="col">Type</th>
                <th scope="col">Image</th>
                <th scope="col">Buy</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->amount_available }}</td>
                <td>{{ $product->type }}</td>
                <td><img class="product_logo" src="{{ $product->image }}" alt="{{ $product->name }}"></td>
                <td>
                    <form action="{{ route('cart.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="number" name="quantity" min="1" max="{{ $product->stock }}" value="1" class="form-control mb-2">
                        <button type="submit" class="btn btn-success">Add to Cart</button>
                    </form>
                </td>
                <td>
                    <a href="/dashboard/products/{{ $product->id }}/edit" class="btn btn-primary">Edit</a>
                    <form action="/dashboard/products/{{ $product->id }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
@endsection

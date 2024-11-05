@extends('layouts.app')
@extends('layouts.base')

@section('main-content')
    <h1>Products</h1>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Stock</th>
                <th scope="col">Type</th>
                <th scope="col">Image</th>
                <th scope="col">Buy</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <th scope="row">{{ $product->id }}</th>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->amount_available }}</td>
                <td>{{ $product->type }}</td>
                <td><img class="product_logo" src="{{ $product->image }}"></td>
                <td>
                <a href="/dashboard/products/{{ $product->id }}" class="btn btn-primary">Buy</a>
            @endforeach
        </tbody>
@endsection

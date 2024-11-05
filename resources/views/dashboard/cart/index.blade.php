
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
                <th scope="col">Product Name</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cart_items as $cart_item)
                <tr>
                    <td>{{ $cart_item->product->name }}</td>
                    <td>{{ $cart_item->product->description }}</td>
                    <td>{{ $cart_item->product->price }}</td>
                    <td>{{ $cart_item->quantity }}</td>
                    <td>{{ $cart_item->quantity * $cart_item->product->price }}</td>
                    <td>
                        <form action="{{ route('cart.destroy', $cart_item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Remove</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

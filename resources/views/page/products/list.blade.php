@extends('index')

@section('title', 'Product List')

@section('content')
<div class="container-fluid">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $index => $product)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->kategory }}</td>
                    <td>${{ number_format($product->price, 2) }}</td>
                    <td>
                        <form action="#" method="POST" style="display:inline;">
                            @csrf
                            <button class="btn btn-success btn-sm">Add to Cart</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No products found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
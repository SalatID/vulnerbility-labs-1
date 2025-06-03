@extends('index')

@section('title','Keranjang Belanja')

@section('content')
<div class="container">
    <h1 class="mb-4">Your Cart</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(count($cartItems) > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($cartItems as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->product->product_name }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>Rp{{ number_format($item->product->price, 0, ',', '.') }}</td>
                        <td>Rp{{ number_format($item->product->price * $item->qty, 0, ',', '.') }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Remove this item?')">Remove</button>
                            </form>
                        </td>
                    </tr>
                    @php $total += $item->product->price * $item->qty; @endphp
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4" class="text-end">Total</th>
                    <th colspan="2">Rp{{ number_format($total, 0, ',', '.') }}</th>
                </tr>
            </tfoot>
        </table>
    @else
        <div class="alert alert-info">Your cart is empty.</div>
        <a href="{{ route('products.view') }}" class="btn btn-secondary">Shop Now</a>
    @endif
</div>
@endsection
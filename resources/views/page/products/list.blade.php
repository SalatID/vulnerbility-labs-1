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
                        <form action="{{route('cart.add')}}" method="POST" style="display:inline;">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="quantity" value="1">
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
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
<script>
    document.querySelectorAll('form[action="{{route('cart.add')}}"]').forEach(function(form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(form);
            let obj = {};
            formData.forEach((value, key) => {
                obj[key] = value;
            });

            const base64Body = btoa(JSON.stringify(obj));

            fetch(form.action, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value
                },
                body: JSON.stringify({ data: base64Body })
            })
            .then(response => response.json())
            .then(data => {
                let oldAlert = document.getElementById('cart-error-alert');
                if (oldAlert) oldAlert.remove();

                // Create Bootstrap alert
                let alertDiv = document.createElement('div');
                alertDiv.id = 'cart-error-alert';
                alertDiv.className = 'alert alert-'+(data.error?'danger':'success')+' alert-dismissible fade show';
                alertDiv.role = 'alert';
                alertDiv.innerHTML = `
                    <strong>Pesan</strong> ${data.message || 'Error adding to cart.'}
                `;

                // Append below <body>
                document.getElementById('alert-location').appendChild(alertDiv);
            })
        });
    });
</script>
@endsection
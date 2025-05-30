@extends('index')

@section('title', 'Transaction List')

@section('content')
<div class="container-fluid">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Transaction ID</th>
                <th>User</th>
                <th>Date</th>
                <th>Amount</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($transactions as $index => $transaction)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $transaction->id }}</td>
                <td>{{ $transaction->user->name ?? 'N/A' }}</td>
                <td>{{ $transaction->created_at->format('Y-m-d') }}</td>
                <td>{{ number_format($transaction->amount, 2) }}</td>
                <td>
                    <a href="{{ route('transaction.detail', $transaction->id) }}" class="btn btn-info btn-sm">Detail</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">No transactions found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
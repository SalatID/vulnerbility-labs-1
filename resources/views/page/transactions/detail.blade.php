@extends('index')
@section('title', 'Transaction Detail')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Transaction ID</th>
                    <td>{{ $transaction->id ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td>{{ $transaction->transaction_date ?? '-' }}</td>
                </tr>
                <tr>
                    <th>User</th>
                    <td>{{ $transaction->user->name ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Amount</th>
                    <td>{{ $transaction->amount ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{{ $transaction->description ?? '-' }}</td>
                </tr>
            </table>
            <a href="{{ route('transactions.view') }}" class="btn btn-secondary mt-3">Back to Transactions</a>
        </div>
    </div>
</div>
@endsection
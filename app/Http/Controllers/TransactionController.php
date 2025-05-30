<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function list()
    {
        $user = auth()->user();
        if ($user->getRoleNames()->contains('administrator')) {
            $transactions = \App\Models\Transaction::all();
        } else if ($user->getRoleNames()->contains('general_user')) {
            $transactions = \App\Models\Transaction::where('user_id', $user->id)->get();
        } else {
            $transactions = collect(); // empty collection for other roles
        }
        return view('page.transactions.list', ['transactions' => $transactions]);
    }

    public function detail($id)
    {
        // Example: Fetch transaction by ID (replace with actual model)
        $transaction = \App\Models\Transaction::find($id);
        if (!$transaction) {
            return view('page.transactions.notfound');
        }
        return view('page.transactions.detail', ['transaction' => $transaction]);
    }
}

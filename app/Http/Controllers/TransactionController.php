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
        // $id = decrypt($id);
        $transaction = \App\Models\Transaction::find($id);
        // $user = auth()->user();
        // if ($transaction && !$user->getRoleNames()->contains('administrator')) {
        //     if ($transaction->user_id !== $user->id) {
        //     $transaction = null;
        //     }
        // }
        if (!$transaction) {
            abort(404);
        }
        return view('page.transactions.detail', ['transaction' => $transaction]);
    }
}

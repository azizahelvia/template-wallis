<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionHistoryController extends Controller
{
    public function index()
    {
        $transaction_by_invoices = Transaction::groupBy('invoice_id')
                                    ->get();

        return view('pages.admin.riwayat_transaksi', compact('transaction_by_invoices'));
    }
}

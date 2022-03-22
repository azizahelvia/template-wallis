<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Models\Transaction;
use Illuminate\Http\Request;

class CasheerMerchantController extends Controller
{
    public function index()
    {
        $shop_by_invoices = Transaction::where('type', 2)
                            ->groupBy('invoice_id')
                            ->get();

        $shop_submissions = Transaction::where("type", 2)->get();

        return view('pages.merchants.index', compact('shop_by_invoices', 'shop_submissions'));
    }

    public function approved($invoice_id)
    {
        $transactions = Transaction::where("invoice_id", $invoice_id);

        $total_data = 0;

        foreach ($transactions->get() as $transaction) {
            $total_data += ($transaction->amount * $transaction->inventory->price);
        }

        $transactions->update([
            "status"    => 3 // APPROVED
        ]);

        return redirect()->back()->with("status", "Belanja telah diterima!");
    }

    public function rejected($invoice_id)
    {
        $transactions = Transaction::where("invoice_id", $invoice_id);

        $total_data = 0;

        foreach ($transactions->get() as $transaction) {
            $total_data += ($transaction->amount * $transaction->inventory->price);
        }

        $balance = Balance::where("user_id", $transactions->get()[0]->user_id)->first();

        $balance->update([
            "balance"   => $balance->balance + $total_data
        ]);

        $transactions->update([
            "status"    => 4 // REJECTED
        ]);
    }

    public function history()
    {
        $shop_by_invoices = Transaction::where('type', 2)
                            ->groupBy('invoice_id')
                            ->get();

        return view('pages.merchants.riwayat_transaksi', compact('shop_by_invoices'));
    }
}

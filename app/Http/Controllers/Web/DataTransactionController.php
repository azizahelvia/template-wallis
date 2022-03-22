<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataTransactionController extends Controller
{
    public function index()
    {
        $shop_by_invoices = Transaction::where('type', 2)
                            ->groupBy('invoice_id')
                            ->get();

        $shop_submissions = Transaction::where("type", 2)->get();

        return view('pages.admin.data_transaksi', compact('shop_by_invoices', 'shop_submissions'));
    }

    public function destroy($id)
    {
        $transaction = Transaction::find($id);

        $transaction->delete();

        return redirect()->back()->with("status", "Berhasil Menghapus Data Transaksi");
    }
}

<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopupBalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $balances = Transaction::where("type", 1)
                    ->where("status", 1)
                    ->get();

        return view('pages.banks.pengajuan_saldo', compact('balances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function history()
    {
        return view('pages.banks.riwayat_pengajuan_saldo');
    }

    public function approved($transaction_id)
    {
        $transaction = Transaction::find($transaction_id);

        $balances = Balance::where("user_id", $transaction->user_id)->first();

        Balance::where("user_id", $transaction->user_id)->update([
            "balance"  => $balances->balance + $transaction->amount
        ]);

        $transaction->update([
            "status"    => 3
        ]);

        return redirect()->back()->with("status", "Menyetujui Topup Saldo!");
    }

    public function rejected($transaction_id)
    {
        $transaction = Transaction::find($transaction_id);

        $transaction->delete();

        // $transaction->update([
        //     "status" => 4
        // ]);

        return redirect()->back()->with("status", "Menolak Topup Saldo!");
    }
}

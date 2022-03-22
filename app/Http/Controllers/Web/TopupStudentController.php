<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Models\Inventory;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopupStudentController extends Controller
{
    public function index()
    {
        $balance     = Balance::where("user_id", Auth::user()->id)->first();

        $balance_submissions = Balance::where("user_id", Auth::user()->id)->first();

        return view('pages.students.topup', [
            "balance"   => $balance,
            'balance_submissions' => $balance_submissions
        ]);
    }

    public function store(Request $request)
    {
        if ($request->type == 1) {
            $invoice_id = "BAL_" . Auth::user()->id . now()->timestamp;

            Transaction::create([
                "user_id"       => Auth::user()->id,
                "amount"        => $request->amount,
                "invoice_id"    => $invoice_id,
                "type"          => $request->type,
                "status"        => 1
            ]);

            return redirect()->back()->with("status", "Top Up Saldo Sedang Diproses");
        }
    }
}

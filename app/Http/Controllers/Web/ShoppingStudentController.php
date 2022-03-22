<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Models\Inventory;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingStudentController extends Controller
{
    public function index()
    {
        $inventories    = Inventory::all();
        $balances        = Balance::where("user_id", Auth::user()->id)->first();
        $carts          = Transaction::where("user_id", Auth::user()->id)
                            ->where("status", 0)
                            ->where("type", 2)->get();
        $checkouts      = Transaction::where("user_id", Auth::user()->id)
                            ->where("status", 1)
                            ->where("type", 2)->get();

        $total_cart     = 0;
        $total_checkout = 0;

        foreach ($carts as $cart) {
            $total_cart += ($cart->inventory->price * $cart->amount);
        }

        foreach ($checkouts as $checkout ) {
            $total_checkout += ($checkout->inventory->price *$checkout->amount);
        }

        return view('pages.students.shopping', [
            "inventories"   => $inventories,
            "carts"         => $carts,
            "checkouts"     => $checkouts,
            "total_cart"    => $total_cart,
            "total_checkout"=> $total_checkout,
            "balances"       => $balances
        ]);
    }

    public function addToCart(Request $request)
    {
        Transaction::create([
            "user_id"   => Auth::user()->id,
            "inventory_id" => $request->inventory_id,
            "amount"    => $request->amount,
            "type"      => 2,
            "status"    => 0,
        ]);

        return redirect()->back()->with("status", "Berhasil Menambahkan Barang ke Keranjang!");
    }

    public function checkout()
    {
        $invoice_id = "INV_" . Auth::user()->id . now()->timestamp;

        Transaction::where("user_id", Auth::user()->id)->where("type", 2)->where("status", 0)->update([
            "invoice_id"    => $invoice_id,
            "status"        => 1
        ]);

        return redirect()->back()->with("status", "Berhasil Checkout!");
    }

    public function pay()
    {
        $datas = Transaction::where("user_id", Auth::user()->id)->where("type", 2)->where("status", 1);

        $total_data = 0;

        foreach ($datas->get() as $data) {
            $total_data += ($data->inventory->price * $data->amount);
        }

        $balance = Balance::where("user_id", Auth::user()->id)->first();

        $balance->update([
            "balance"   => $balance->balance - $total_data
        ]);

        $datas->update([
            "status"    => 2
        ]);

        return redirect()->back()->with("status", "Berhasil Bayar! Menunggu Konfirmasi Dari Kantin");
    }

    public function history()
    {
        $shop_by_invoices = Transaction::groupBy('invoice_id')
                            ->get();

        return view('pages.students.riwayat_transaksi', compact('shop_by_invoices'));
    }
}

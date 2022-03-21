<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
use Illuminate\Http\Request;

class EntryInventoryController extends Controller
{
    public function index()
    {
        $inventories = Inventory::all();

        return view('pages.merchants.add_inventory', compact('inventories'));
    }

    public function store(Request $request)
    {
        Inventory::create([
            "name"      => $request->name,
            "price"     => $request->price,
            "stock"     => $request->stock,
            "desc"      => $request->desc
        ]);

        return redirect()->back()->with("status", "Berhasil Menambahkan Data Barang!");
    }

    public function update(Request $request, $id)
    {
        Inventory::find($id)->update([
            "name"      => $request->name,
            "price"     => $request->price,
            "stock"     => $request->stock,
            "desc"      => $request->desc
        ]);

        return redirect()->back()->with("status", "Berhasil Mengedit Data Barang!");
    }

    public function destroy($id)
    {
        $inventory = Inventory::find($id);

        $inventory->delete();

        return redirect()->back()->with("status", "Berhasil Menghapus Data Barang");
    }
}

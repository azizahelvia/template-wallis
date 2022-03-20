<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EntryInventoryController extends Controller
{
    public function index()
    {
        return view('pages.merchants.add_inventory');
    }
}

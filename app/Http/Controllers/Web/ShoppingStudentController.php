<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShoppingStudentController extends Controller
{
    public function index()
    {
        return view('pages.students.shopping');
    }

    public function history()
    {
        return view('pages.students.riwayat_transaksi');
    }
}

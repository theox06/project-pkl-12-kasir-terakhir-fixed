<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages.cashier.home', [
            'title' => 'Dashboard Kasir'
        ]);
    }

    public function success($id) 
    {
        return view('pages.cashier.success', [
            'title' => 'Transaksi Sukses',
            'transaction' => Transaction::find($id)
        ]);
    }

    // public funtion print($id)
    // {
    //     return view('pages.cashier.print', [
    //         'title' => 'Sukses',
    //         'transaction' => Transaction::find($id)
    //     ]);
    // }

    public function order_list()
    {
        return view('pages.cashier.order-list', [
            'title' => 'Order List',
            'orders' => Transaction::orderBy('id', 'DESC')->where('status', '!=', 'Cart')->get()
        ]);

    }

    public function order_list_status(Request $request) {
        $order = Transaction::find($request->transaction_id);
        $order->update(['status' => $request->status]);
        return redirect()->back()->with('status', 'Order #' . $request->transaction_id . ' berhasil diubah menjadi ' . $request->status);
    }
}

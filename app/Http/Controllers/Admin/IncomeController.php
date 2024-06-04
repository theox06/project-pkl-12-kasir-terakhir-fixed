<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function index()
    {
        return view('pages.admin.incomes.index', [
            'title' => 'Pendapatan',
            'incomes' => Transaction::whereYear('created_at', date('Y'))->whereMonth('created_at', date('m'))->get()
        ]);
    }
}

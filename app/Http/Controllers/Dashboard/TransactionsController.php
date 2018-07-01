<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Transaction;
use App\Http\Controllers\Controller;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd(23123);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        dd(23123);
    }


}

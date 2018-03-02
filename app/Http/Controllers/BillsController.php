<?php

namespace App\Http\Controllers;

use App\Bill;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Bill::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \Cache::forget('api::products');

        $data = $request->all();
        return Bill::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function show(Bill $bill)
    {
        return $bill;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit(Bill $bill)
    {
        return $bill;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $requestEloquent, Bill $bill)
    {
        $bill->update($requestEloquent->all());

        return $bill;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $requestEloquent, Bill $bill)
    {
        $bill->delete();
        return $bill;
    }

    public function total(Bill $bill){
        $bills = $bill->all();
        $sum = 0;

        foreach ($bills as $value){
            $sum += (float)$value['value'];
        }
        return $sum;
    }
}

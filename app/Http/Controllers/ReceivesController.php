<?php

namespace App\Http\Controllers;

use App\Receive;
use Illuminate\Http\Request;

class ReceivesController extends Controller
{
    public function index()
    {
        return Receive::all();
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
        return Receive::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function show(Receive $receive)
    {
        return $receive;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit(Receive $receive)
    {
        return $receive;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $requestEloquent, Receive $receive)
    {
        $receive->update($requestEloquent->all());

        return $receive;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $requestEloquent, Receive $receive)
    {
        $receive->delete();
        return $receive;
    }

    public function total(Receive $receive){
        $receives = $receive->all();
        $sum = 0;

        foreach ($receives as $value){
            $sum += (float)$value['value'];
        }
        return $sum;
    }
}

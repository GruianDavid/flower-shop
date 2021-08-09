<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get list of all orders
        //create custom filters
        $orders = Order::all();
        return response($orders,200);
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
        //create new order
        //validate fields
        try {
            Validator::make($request->all(), [
                'invoice' => 'required|max:255',
                'destination' => 'max:255',
                'payment_status' => 'max:255',
                'payment_method' => 'max:255',
                'delivery_status' => 'max:255',
                'value' => 'numeric',
            ])->validate();
            Order::create($request->all());
            return response("New order was placed");
        }catch (\Exception $e){
            return response("The values provided did not pass the validator",400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Order $order)
    {
        //update order
        //validate fields
        try {
            Validator::make($request->all(), [
                'invoice' => 'required|max:255',
                'destination' => 'max:255',
                'payment_status' => 'max:255',
                'payment_method' => 'max:255',
                'delivery_status' => 'max:255',
                'value' => 'numeric',
            ])->validate();
            $order->update($request->all());
            return response("The order number $order->id was updated");
        }catch (\Exception $e){
            return response("The values provided did not pass the validator",400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

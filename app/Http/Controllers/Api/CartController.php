<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CheckoutRequest;
use App\Order;
use App\OrderProduct;
use App\Product;
use Illuminate\Support\Facades\DB;
use Exception;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    

    public function order(CheckoutRequest $Request)
    {

       
        try {
            DB::beginTransaction();
            $data = $Request->only('name', 'email', 'phone', 'address','user_id','note');
            // dd($data);
            $orders = Order::create($data);
            
            // dd($orders);
            // $cart = json_decode($Request->cart);
            // dd($data);
            // return $cart;
            foreach ($Request->cart as $key=>$item) {
                 
                OrderProduct::create([
                    'order_id' => $orders->id,
                    'quantity' => $item['quantity'],
                    'price' =>$item['price']*$item['quantity'],
                    'product_id' => $item['id']
                ]);
                
                // DB::enableQueryLog();
                // Product::find($item['id'])->update(['quantity' => 'quantity'- $item['quantity']]);
                // dd(DB::getQueryLog());
                
            }
            

            DB::commit();
            return response()->json(['success'=>'Successful'],200);


        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['fail'=>'fail'],400);
            
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

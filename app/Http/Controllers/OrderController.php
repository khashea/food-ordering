<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = [] ;
        if(!auth()->user()->hasRoles('customer'))
            $orders = Order::all();
        else
            $orders = auth()->user()->orders;
        $first_item = Item::all()->first();

        return view('order-index')->with(['orders'=>$orders,'first_item'=>$first_item]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Item $item)
    {

        return view('order-create')->with(["items"=>Item::all(),"item_selected"=>$item]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //TODO rules
        $data = $request->all();
        $data['user_id']= auth()->user()->id;
        $data['status']='Received';
        $item = Item::where('name',$data['item_selected'])->first() ;
        $data['price'] = $item->price ;
        $order = Order::create($data);
        $order->items()->attach([$item->id => ['quantity' => $data['quantity']]]);
        return redirect(route('order'))->with(['msg'=>'order added successfully']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(order $order)
    {
        return view('order-edit')->with(['order'=>$order,"items"=>Item::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, order $order)
    {
        //TODO rules
        $data = $request->all();
        $order->update($data);
        $order->items()->sync([Item::where('name',$data['item_selected'])->pluck('id')->first() => ['quantity' => $data['quantity']]]);

        return redirect(route('order'))->with(['msg'=>'order updated successfully']);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(order $order)
    {

        if($order->status == "Received"){
            $order->destroy($order->id);
            return redirect(route('order'))->with(['msg'=>'order Deleted Successfully']);
        }
        else {
            return redirect(route('order'))->with(['error'=>'Cannot Delete order']);
        }



    }
}

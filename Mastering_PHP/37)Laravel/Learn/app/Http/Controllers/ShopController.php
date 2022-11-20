<?php

namespace App\Http\Controllers;

use App\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shop_data = Shop::all();
        return view('jqueryCrud.shopView',['shop_data' => $shop_data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jqueryCrud.shopCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Way:1 for store data
        /* 
        $flight = Shop::create([
               'shop_owner' => $request->shop_owner,
               'shop_name' => $request->shop_name,
               'shop_location' => $request->shop_location,
           ]);
        */

        // Way:2 for store data
        $shop = Shop::create($request->all());

        // Way:3 for store data
        /* 
         $Shop = new Shop;
         $Shop->shop_owner = $request->input('shop_owner');
         $Shop->shop_name = $request->input('shop_name');
         $Shop->shop_location = $request->input('shop_location');
         $Shop->save();
         */

        return redirect()->route('shopView')->with('alert-success','You have successfully created shop.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $shop_data = Shop::find($id);
         return view('jqueryCrud.shopEdit', ['shop_data' => $shop_data]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $shop = Shop::find($id);
        $shop['shop_owner']    = $request['shop_owner'];
        $shop['shop_name']      = $request['shop_name'];
        $shop['shop_location']  = $request['shop_location'];
        $shop->save();

        return redirect()->route('shopView')->with('alert-success','You have successfully update shop.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
         $shop = Shop::find($id);
         $shop->delete();
        return redirect()->route('shopView')->with('alert-success','You have successfully created shop.');
    }
}

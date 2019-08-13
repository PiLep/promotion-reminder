<?php

namespace App\Http\Controllers;

use App\Promotion;
use Illuminate\Http\Request;


class PromotionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promotions = Promotion::all();

        // return view('promotions.index', compact('promotions'));

        return response()->json($promotions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('promotions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_lib'=>'required',

        ]);


        $promotion = new Promotion([
            'product_lib' => $request->get('product_lib'),
            'product_code' => $request->get('product_code'),
            'shop' => $request->get('shop'),
            'number_products_needed' => $request->get('number_products_needed'),
            'discount' => $request->get('discount'),
            'minimum_basket_price' => $request->get('minimum_basket_price'),
            'expiration' => $request->get('expiration'),
            'code' => $request->get('code'),
            'used' => ($request->get('used') == 'on') ? 1 : 0,
            'notify_me' => ($request->get('notify_me') == 'on') ? 1 : 0
        ]);
        $promotion->save();
        return redirect('/promotions')->with('success', 'Promotion saved!');
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
        $promotion = Promotion::find($id);
        return view('promotions.edit', compact('promotion'));
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
        $request->validate([
            'product_lib'=>'required'
        ]);



        $promotion = Promotion::find($id);
        $promotion->shop =  $request->get('shop');
        $promotion->product_lib =  $request->get('product_lib');
        $promotion->product_code =  $request->get('product_code');
        $promotion->number_products_needed =  $request->get('number_products_needed');
        $promotion->discount =  $request->get('discount');
        $promotion->minimum_basket_price =  $request->get('minimum_basket_price');
        $promotion->expiration =  $request->get('expiration');
        $promotion->code =  $request->get('code');
        $promotion->used = ($request->get('used') == 'on') ? 1 : 0 ;
        $promotion->notify_me = ($request->get('notify_me') == 'on') ? 1 : 0 ;

        $promotion->save();

        return redirect('/promotions')->with('success', 'Promotion updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $promotion = Promotion::find($id);
        $promotion->delete();

        return redirect('/promotions')->with('success', 'promotion deleted!');
    }
}

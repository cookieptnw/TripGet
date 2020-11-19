<?php

namespace App\Http\Controllers;

use App\MyVoucher;
use App\Voucher;
use Illuminate\Http\Request;

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $groupID = false;
        foreach ($request->cart_ids as $cart) {

            $req = $request->all();
            $req['user_id'] = $request->user()->id;
            $req['amount'] = 1;

            $req['group_id'] = $groupID;
            $req['voucher_id'] = $cart;
            $voucher = Voucher::whereId($cart)->first();

            $req['price_sum'] = $voucher->price;
            $myVoucher = MyVoucher::create($req);

            if (!$groupID) {
                $groupID = $myVoucher->id;
                $myVoucher->update([
                    'group_id' => $myVoucher->id,
                ]);

            }

        }
        return 'ok';
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

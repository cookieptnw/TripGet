<?php

namespace App\Http\Controllers;

use App\MyVoucher;

class MyVoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user_id = request()->user()->id;
        $user_id = 1;
        $myVouchers = MyVoucher::where('user_id', $user_id)->with('voucher')->with('voucher.details')->get()->groupBy('group_id');
        return ['result' => $myVouchers];
    }

}

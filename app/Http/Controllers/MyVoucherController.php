<?php

namespace App\Http\Controllers;

use App\MyVoucher;
use App\MyVoucherUse;
use Carbon\Carbon;

class MyVoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = request()->user()->id;
        // $user_id = 1;
        $myVouchers = MyVoucher::where('user_id', $user_id)->with('voucher')->with('voucher.details')->get();

        foreach ($myVouchers as $voucher) {
            $voucher->can_cancel = $voucher->voucher->end_date > Carbon::now()->subDays(7);
            $voucher->no = $voucher->created_at->format('Ymd') . $voucher->id;
        }
        return ['result' => collect($myVouchers)->all()];
    }

    public function show($id)
    {
        $user_id =
            request()->user()->id;

        $show = MyVoucher::where('id', $id)->with('voucher')->with('voucher.details')->first();


        $url = ($show->key);
        $show->url = $url;
        $show->qr = "https://api.qrserver.com/v1/create-qr-code/?data={$url}";
        if (isset($show->voucher)) {
            foreach ($show->voucher->details as $detail) {
                $mvus = MyVoucherUse::where([['my_voucher_id', $show->id], ['user_id', $user_id], ['voucher_detail_id', $detail->id]])->with('staff')->get();
                $detail->mvus = $mvus;

                $mvu = MyVoucherUse::where([['my_voucher_id', $show->id], ['user_id', $user_id], ['voucher_detail_id', $detail->id]])->count();
                $detail->use = $mvu;
            }
        }


        return ['result' => $show];
    }

    public function showKey($id)
    {

        $user_id =
            request()->user()->id;

        $show = MyVoucher::where('key', $id)->with('voucher')->with('voucher.details')->first();

        $url = ($show->key);
        $show->url = $url;
        $show->qr = "https://api.qrserver.com/v1/create-qr-code/?data={$url}";
        if (isset($show->voucher)) {
            foreach ($show->voucher->details as $detail) {
                $mvus = MyVoucherUse::where([['my_voucher_id', $show->id], ['user_id', $user_id], ['voucher_detail_id', $detail->id]])->with('staff')->get();
                $detail->mvus = $mvus;
                $mvu = MyVoucherUse::where([['my_voucher_id', $show->id], ['user_id', $user_id], ['voucher_detail_id', $detail->id]])->count();
                $detail->use = $mvu;
            }
        }


        return ['result' => $show];
    }
    public function use($id)
    {
        $req = request();
        $staff_id = request()->user()->id;

        $show = MyVoucher::where('key', $id)->first();


        $m = MyVoucherUse::create(['my_voucher_id' => $show->id, 'user_id' => $show->user_id, 'voucher_detail_id' => $req->voucher_detail_id, 'staff_id' => $staff_id]);

        return
            $m;
    }

    public function cancel($id)
    {
        $req = request();
        $staff_id = request()->user()->id;

        $show = MyVoucher::where('id', $id)->first();

        $show->update([
            'status' => 0
        ]);

        return
            'ok' . time();
    }
}
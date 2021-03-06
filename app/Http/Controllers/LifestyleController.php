<?php

namespace App\Http\Controllers;

use App\Lifestyle;
use App\UserLifestyle;
use App\VoucherLifestyle;

use Illuminate\Http\Request;

class LifestyleController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lifestyle  $lifestyle
     * @return \Illuminate\Http\Response
     */
    public function show($lifestyle)
    {

        $vid = request()->voucher_id;

        $lifestyles = Lifestyle::where('type', $lifestyle)->get();
        $user = request()->user();
        foreach ($lifestyles as $l) {
            if ($vid) {
                $f = VoucherLifestyle::where('lifestyle_id', $l->id)->where('voucher_id', $vid)->first();
            } else {
                $f = UserLifestyle::where('lifestyle_id', $l->id)->where('user_id', $user->id)->first();
            }
            $l->active = ($f) ? true : false;
        }
        return ['mode' => $vid ? 'voucher' : 'user', 'result' => $lifestyles, 'items' => ["data" => $lifestyles]];
    }

    public function set($lifestyle)
    {
        $vid = request()->voucher_id;

        $user = request()->user();

        if ($vid) {
            $f = VoucherLifestyle::where('lifestyle_id', $lifestyle)->where('voucher_id', $vid)->get();
            if (count($f)) {
                $uf = VoucherLifestyle::query()->where('lifestyle_id', $lifestyle)->where('voucher_id', $vid)->delete();
            } else {
                VoucherLifestyle::create([
                    'lifestyle_id' => $lifestyle,
                    'voucher_id' => $vid
                ]);
            }
        } else {
            $f = UserLifestyle::where('lifestyle_id', $lifestyle)->where('user_id', $user->id)->get();
            if (count($f)) {
                $uf = UserLifestyle::query()->where('lifestyle_id', $lifestyle)->where('user_id', $user->id)->delete();
            } else {
                UserLifestyle::create([
                    'lifestyle_id' => $lifestyle,
                    'user_id' => $user->id
                ]);
            }
        }


        return 'ok';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lifestyle  $lifestyle
     * @return \Illuminate\Http\Response
     */
    public function edit(Lifestyle $lifestyle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lifestyle  $lifestyle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lifestyle $lifestyle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lifestyle  $lifestyle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lifestyle $lifestyle)
    {
        //
    }
}
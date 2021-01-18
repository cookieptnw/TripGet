<?php

namespace App\Http\Controllers;

use App\UserLifestyle;
use App\Voucher;
use App\VoucherLifestyle;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class VoucherApproveController extends Controller
{
    private $mainModel;

    public function __construct()
    {
        $this->mainModel = new Voucher();
    }

    public function index(Request $request)
    {
        $showItem = $request->item ? $request->item : 10;
        $keyword = $request->q ? $request->q : '';
        $sortBy = $request->sortBy ? $request->sortBy : 'desc';

        $items = $this->mainModel::where(function ($q) use ($keyword) {
            $q->orWhere('name', 'LIKE', "%$keyword%");
        })->whereNull('approved_at')->with(['hotel', 'category'])->orderBy('created_at', $sortBy)->paginate($showItem);

        return [
            "items" =>
            $items,
        ];
    }

    public function matching()
    {
        $user_id = request()->user()->id;

        $matchs = [];
        $user_lifestyles = UserLifestyle::select('lifestyle_id')->where('user_id', $user_id)->get()->pluck('lifestyle_id');

        $vls = VoucherLifestyle::whereIn('lifestyle_id', $user_lifestyles)->get();

        foreach ($vls as $vl) {
            foreach ($user_lifestyles as $id) {
                if ($id == $vl->lifestyle_id) {
                    $vl->match_count++;
                }
            }
        }

        $vId = $vls->groupBy('voucher_id');

        function get_percentage($total, $number)
        {
            if ($total > 0) {
                return round($number / ($total / 100), 2);
            } else {
                return 0;
            }
        }
        foreach ($vId as $id => $v) {
            $voucher = Voucher::where('id', $id)->first();
            $c = 0;

            $lifestyle_id_a = [];

            foreach ($v as $count) {
                $c += $count->match_count;
                array_push($lifestyle_id_a, $count->lifestyle_id);
            }

            $voucher['match_count'] = $c;
            $voucher['match_lifestyle_id'] = $lifestyle_id_a;

            $voucher['match_percent'] = get_percentage(count($user_lifestyles), $c);

            if (isset($voucher['id'])) {
                array_push($matchs, $voucher);
            }
        }

        $result = $matchs;
        $collection = collect($matchs);


        $sorted = $collection->sortByDesc(function ($product, $key) {
            return $product['match_count'];
        });
        return ["items" => ["data" => $sorted->values()->all()]];


        // foreach ($user_lifestyles as $user) {
        //     $vl =  VoucherLifestyle::where('lifestyle_id', $user->lifestyle_id)->get()->pluck('lifestyle_id');

        //     foreach ($vl as $l) {
        //     }
        // }
        // return array_count_values($matchs);
        // return ['s' => $user_lifestyles, 'x' =>  $matchs];
        // $vouchers = Voucher::whereHas('lifestyles', function ($q) use ($user_lifestyles) {
        //     foreach ($user_lifestyles as $l) {
        //         $q->orWhere('lifestyle_id', $l->lifestyle_id);
        //     }
        // })->with('lifestyles')->get();

        // return $vouchers;

        // $finds = $vouchers->groupBy('id');

        // $d = function ($id) use ($user_lifestyles) {
        //     $c = 0;
        //     foreach ($user_lifestyles as $u) {
        //         if ($u->lifestyle_id == $id) {
        //             $c++;
        //         }
        //     }

        //     return $c > 0 ? true : false;
        // };

        // return $finds;


        // return ['user' => $user, 'vouchers' => $vouchers];
    }

    public function store(Request $request)
    {
        $item = $this->mainModel::create($request->all());

        foreach ($request->details as $detail) {
            if ($detail['description']) {
                $item->details()->create($detail);
            }
        }

        if (!$item) {
            return response()->json([
                "message" => 'create failed',
            ], 400);
        }
        return ["message" => 'success'];
    }

    public function show($id)
    {
        $show = $this->mainModel::find($id);
        $show->details;
        $show->hotel;
        $show->hotel->vouchers;
        $show->hotel->province;


        return [
            "result" => $show,
        ];
    }

    public function update($id, Request $request)
    {
        $item = $this->mainModel::find($id);

        $update = $item->update([
            'approved_at' => \Carbon\Carbon::now()
        ]);

        if (!$update) {
            return response()->json([
                "message" => 'update failed',
            ], 400);
        }

        return 'ok';
    }

    public function destroy($id)
    {
        $item = $this->mainModel::find($id);
        $item->delete();
        return 'ok';
    }
}
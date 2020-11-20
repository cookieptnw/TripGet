<?php

namespace App\Http\Controllers;

use App\UserLifestyle;
use App\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
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
        })->with(['hotel', 'category'])->orderBy('created_at', $sortBy)->paginate($showItem);

        return [
            "items" =>
            $items,
        ];
    }

    public function matching()
    {
        $user_id = 1;
        $user_lifestyles = UserLifestyle::where('user_id', $user_id)->get();
        $vouchers = Voucher::whereHas('lifestyles', function ($q) use ($user_lifestyles) {
            foreach ($user_lifestyles as $l) {
                $q->orWhere('lifestyle_id', $l->lifestyle_id);
            }
        })->with('lifestyles')->get();

        return $vouchers;

        $finds = $vouchers->groupBy('id');

        $d = function ($id) use ($user_lifestyles) {
            $c = 0;
            foreach ($user_lifestyles as $u) {
                if ($u->lifestyle_id == $id) {
                    $c++;
                }
            }

            return $c > 0 ? true : false;

        };

        return $finds;

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

        $update = $item->update($request->all());

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

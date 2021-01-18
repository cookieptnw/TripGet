<?php

namespace App\Http\Controllers;

use App\VoucherCategory;
use Illuminate\Http\Request;

class VoucherCategoryController extends Controller
{
    private $mainModel;

    public function __construct()
    {
        $this->mainModel = new VoucherCategory();
    }

    public function index(Request $request)
    {
        $showItem = $request->item ? $request->item : 10;
        $keyword = $request->q ? $request->q : '';
        $sortBy = $request->sortBy ? $request->sortBy : 'desc';


        $items = $this->mainModel::where(function ($q) use ($keyword) {
            $q->orWhere('name', 'LIKE', "%$keyword%");
        })->orderBy('created_at', $sortBy)->paginate($showItem);

        return [
            "items" =>
            $items
        ];
    }




    public function searchq(Request $request)
    {
        $province_id = $request->province_id ? $request->province_id : false;
        $keyword = $request->q ? $request->q : '';
        $price_id = $request->price_id ? $request->price_id : false;

        $show = $this->mainModel::whereId($request->category_id)->with(['vouchers_approves' => function ($qx) use ($province_id, $keyword, $price_id) {

            if ($province_id) {
                $qx->whereHas('hotel', function ($x) use ($province_id) {
                    return $x->where('province_id', $province_id);
                });
            }
            return $qx;
        }])->first();


        return [
            "result" => $show,
        ];
    }

    public function store(Request $request)
    {
        $item = $this->mainModel::create($request->all());

        if (!$item) {
            return response()->json([
                "message" => 'create failed'
            ], 400);
        }
        return ["message" => 'success'];
    }


    public function show($id)
    {
        $show = $this->mainModel::find($id);
        $show->vouchers;
        $show->vouchers_approves;
        $show->vouchers_bkk;

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
                "message" => 'update failed'
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
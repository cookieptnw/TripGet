<?php

namespace App\Http\Controllers;

use App\MainHotel;
use Illuminate\Http\Request;

class MainHotelController extends Controller
{
    private $mainModel;

    public function __construct()
    {
        $this->mainModel = new MainHotel();
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

    public function store(Request $request)
    {
        $req = $request->all();
        $req['user_id'] = $request->user()->id;
        $item = $this->mainModel::create($req);

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
        return [
            "result" => $show
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
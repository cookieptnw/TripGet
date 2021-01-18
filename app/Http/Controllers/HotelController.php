<?php

namespace App\Http\Controllers;

use App\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    private $mainModel;

    public function __construct()
    {
        $this->mainModel = new Hotel();
    }

    public function index(Request $request)
    {
        $showItem = $request->item ? $request->item : 10;
        $keyword = $request->q ? $request->q : '';
        $sortBy = $request->sortBy ? $request->sortBy : 'desc';


        $items = $this->mainModel::where(function ($q) use ($keyword) {
            $q->orWhere('name', 'LIKE', "%$keyword%");
            $q->orWhere('description', 'LIKE', "%$keyword%");
        })->with('province')->orderBy('created_at', $sortBy)->paginate($showItem);

        return [
            "items" =>
            $items
        ];
    }

    public function indexMe(Request $request)
    {
        $showItem = $request->item ? $request->item : 10;
        $keyword = $request->q ? $request->q : '';
        $sortBy = $request->sortBy ? $request->sortBy : 'desc';
        $user = $request->user();

        $items = $this->mainModel::where(function ($q) use ($keyword, $user) {
            $q->orWhere('name', 'LIKE', "%$keyword%");
            $q->orWhere('description', 'LIKE', "%$keyword%");
        })->where('main_hotel_id', $user->main_hotel_id)->with('province')->orderBy('created_at', $sortBy)->paginate($showItem);

        return [
            "items" =>
            $items
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
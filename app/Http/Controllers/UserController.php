<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class UserController extends Controller
{
    private $mainModel;

    public function __construct()
    {
        $this->mainModel = new User();
    }

    public function roles()
    {
        $roles = Role::paginate(999);
        return [
            "items" =>
            $roles
        ];
    }

    public function index(Request $request)
    {
        $showItem = $request->item ? $request->item : 10;
        $keyword = $request->q ? $request->q : '';
        $sortBy = $request->sortBy ? $request->sortBy : 'desc';

        $isAdmin = $request->admin ? $request->admin : 0;


        $items = $this->mainModel::where(function ($q) use ($keyword) {
            $q->orWhere('first_name', 'LIKE', "%$keyword%");
            $q->orWhere('last_name', 'LIKE', "%$keyword%");
            $q->orWhere('email', 'LIKE', "%$keyword%");
            $q->orWhere('tel', 'LIKE', "%$keyword%");
        })->where(function ($q) use ($isAdmin) {
            if ($isAdmin) {
                $q->where('role_id', 3);
            }
        })->with('main_hotel')->orderBy('created_at', $sortBy)->paginate($showItem);

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
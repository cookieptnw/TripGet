<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class TestController extends Controller
{
    public function index(){
        $users = User::get();
        return $users; 
    }
    public function show($id){
        $users = User::find($id);
        return $user ;
    }
}
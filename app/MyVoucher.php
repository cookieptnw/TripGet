<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyVoucher extends Model
{
    protected $fillable = ['user_id', 'amount', 'sum', 'voucher_id'];
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyVoucher extends Model
{
    protected $fillable = ['user_id', 'voucher_id', 'price_sum', 'group_id'];
    public function voucher()
    {
        return $this->belongsTo('App\Voucher');
    }
}

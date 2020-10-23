<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VoucherDetail extends Model
{
    protected $fillable = ['description', 'amount', 'voucher_id'];
}
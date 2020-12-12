<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyVoucher extends Model
{
    protected $fillable = ['user_id', 'voucher_id', 'price_sum', 'group_id', 'key', 'status'];
    public function voucher()
    {
        return $this->belongsTo('App\Voucher');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    protected $appends = ['created_at_text', 'status_text'];
    public function getCreatedAtTextAttribute()
    {
        return $this->created_at ? \Carbon\Carbon::parse($this->created_at)->format('d/m/Y H:i:s') : '-';
    }
    public function getStatusTextAttribute()
    {
        return $this->status == 1  ? "ซื้อแล้ว" : 'ยกเลิก';
    }
}
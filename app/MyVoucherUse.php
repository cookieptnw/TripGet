<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyVoucherUse extends Model
{
    protected $fillable = ['voucher_detail_id', 'user_id', 'my_voucher_id', 'staff_id'];
    public function staff()
    {
        return $this->belongsTo('App\User', 'staff_id', 'id');
    }

    protected $appends = ['created_at_text'];
    public function getCreatedAtTextAttribute()
    {
        return $this->created_at ? \Carbon\Carbon::parse($this->created_at)->format('d/m/Y H:i:s') : '-';
    }
}
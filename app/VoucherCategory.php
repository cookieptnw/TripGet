<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VoucherCategory extends Model
{
    protected $fillable = ['name', 'image_url'];
    protected $appends = ['created_at_text'];
    public function getCreatedAtTextAttribute()
    {
        return $this->created_at ? \Carbon\Carbon::parse($this->created_at)->format('d/m/Y H:i:s') : '-';
    }


    public function vouchers()
    {
        return $this->hasMany(Voucher::class, 'category_id', 'id');
    }

    public function vouchers_approves()
    {
        return $this->hasMany(Voucher::class, 'category_id', 'id')->whereHas('hotel', function ($q) {
            $q->whereNotNull('approved_at');
        });
    }

    public function vouchers_bkk()
    {
        return $this->hasMany(Voucher::class, 'category_id', 'id')->whereHas('hotel', function ($q) {
            $q->where('name', 'like', "%bkk%");
        });
    }
}
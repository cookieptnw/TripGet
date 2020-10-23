<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $fillable = ['image_url', 'name', 'description', 'price', 'price_child', 'start_date', 'end_date', 'holiday_open', 'weekend_open', 'discount', 'discount_promotion', 'day_use', 'not_refund', 'pet_allow', 'category_id', 'hotel_id'];
    protected $appends = ['created_at_text'];
    public function getCreatedAtTextAttribute()
    {
        return $this->created_at ? \Carbon\Carbon::parse($this->created_at)->format('d/m/Y H:i:s') : '-';
    }


    public function category()
    {
        return $this->belongsTo('App\VoucherCategory', 'category_id', 'id');
    }
    public function hotel()
    {
        return $this->belongsTo('App\Hotel');
    }
}
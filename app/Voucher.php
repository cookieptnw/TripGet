<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $fillable = ['image_url', 'name', 'description', 'price', 'start_date', 'end_date', 'holiday_open', 'weekend_open', 'discount', 'discount_promotion', 'day_use', 'not_refund', 'pet_allow', 'category_id', 'hotel_id'];
    protected $appends = ['created_at_text', 'end_date_text', 'end_date_text_ex'];
    public function getCreatedAtTextAttribute()
    {
        return $this->created_at ? \Carbon\Carbon::parse($this->created_at)->format('d/m/Y H:i:s') : '-';
    }

    public function getEndDateTextAttribute()
    {
        return $this->end_date ? \Carbon\Carbon::parse($this->end_date)->format('d/m/Y H:i:s') : '-';
    }

    public function getEndDateTextExAttribute()
    {
        return $this->end_date ? \Carbon\Carbon::parse($this->end_date)->subDays(7)->format('d/m/Y H:i:s') : '-';
    }


    public function category()
    {
        return $this->belongsTo('App\VoucherCategory', 'category_id', 'id');
    }
    public function hotel()
    {
        return $this->belongsTo('App\Hotel');
    }

    public function details()
    {
        return $this->hasMany('App\VoucherDetail');
    }

    public function lifestyles()
    {
        return $this->hasMany('App\VoucherLifeStyle');
    }
}
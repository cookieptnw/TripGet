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
}
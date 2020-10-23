<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainHotel extends Model
{
    protected $fillable = ['name', 'description', 'user_id'];
    protected $appends = ['created_at_text'];
    public function getCreatedAtTextAttribute()
    {
        return $this->created_at ? \Carbon\Carbon::parse($this->created_at)->format('d/m/Y H:i:s') : '-';
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;
    protected $fillable = ['abbr', 'locale', 'name', 'direction', 'active', 'created_at', 'updated_at'];
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
    public function scopeSelection($query)
    {
        return $query->select('abbr', 'name', 'direction', 'active ');
    }
    public function getActiveAttribute($val)
    {
        return $val == 1 ? 'مفعل' : 'غير مفعل';
    }
}

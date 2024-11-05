<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GasLevel extends Model
{
    use HasFactory;

    protected $table = 'gas_levels';

    protected $fillable = [
        'gas_level',
    ];

    public $timestamps = true;

    // Atur default order berdasarkan created_at descending
    public function scopeLatestFirst($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}
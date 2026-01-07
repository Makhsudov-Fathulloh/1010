<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupplierItem extends Model
{
    protected $table = 'supplier_item';

    protected $fillable = [
        'supplier_id',
        'type',
        'amount',
        'currency',
        'rate',
        'description'
    ];

    public function scopeFilterByDate($query, $from, $to)
    {
        if ($from && $to) {
            return $query->whereBetween('created_at', [$from . ' 00:00:00', $to . ' 23:59:59']);
        } elseif ($from) {
            return $query->where('created_at', '>=', $from . ' 00:00:00');
        } elseif ($to) {
            return $query->where('created_at', '<=', $to . ' 23:59:59');
        }
        return $query;
    }
}

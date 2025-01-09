<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insurance_policy extends Model
{
    use HasFactory;
    protected $guarded = [];

    // Boot method for auto-incrementing PO numbers
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Get the last PO number
            $lastPo = static::latest('id')->first();
            $lastNumber = $lastPo ? intval(str_replace('PO-', '', $lastPo->po_number)) : 9;

            // Increment and assign the new PO number
            $model->po_number = 'PO-' . ($lastNumber + 1);
        });
    }
}

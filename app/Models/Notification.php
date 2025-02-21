<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notification extends Model
{
    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
        ];
    }

    const UPDATED_AT = null;

    //

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}

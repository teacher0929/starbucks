<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verification extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
        ];
    }

    //

    public function status()
    {
        return ['Pending', 'Verified', 'Canceled'][$this->status];
    }

    public function statusColor()
    {
        return ['warning', 'success', 'danger'][$this->status];
    }
}

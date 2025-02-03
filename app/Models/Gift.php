<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    /** @use HasFactory<\Database\Factories\GiftFactory> */
    use HasFactory;


    public function status()
    {
        return ['Unused', 'Used', 'Expired'][$this->status];
    }

    public function statusColor()
    {
        return ['warning', 'success', 'danger'][$this->status];
    }
}

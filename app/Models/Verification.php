<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verification extends Model
{
    /** @use HasFactory<\Database\Factories\VerificationFactory> */
    use HasFactory;


    public function status()
    {
        return ['Pending', 'Verified', 'Canceled'][$this->status];
    }

    public function statusColor()
    {
        return ['warning', 'success', 'danger'][$this->status];
    }
}

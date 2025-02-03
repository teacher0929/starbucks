<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;


    public function status()
    {
        return ['Out of stock', 'In stock'][$this->status];
    }

    public function statusColor()
    {
        return ['danger', 'success'][$this->status];
    }
}

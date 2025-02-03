<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;


    public function paymentMethod()
    {
        return ['Cash', 'Card', 'Gift'][$this->payment_method];
    }

    public function paymentStatus()
    {
        return ['Pending', 'Paid', 'Refunded'][$this->payment_status];
    }

    public function paymentStatusColor()
    {
        return ['warning', 'success', 'info'][$this->status];
    }

    public function status()
    {
        return ['Pending', 'Completed', 'Canceled'][$this->status];
    }

    public function statusColor()
    {
        return ['warning', 'success', 'danger'][$this->status];
    }
}

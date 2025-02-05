<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

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

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    //

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

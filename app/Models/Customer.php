<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guarded = ['id', 'remember_token'];

    protected $hidden = ['password', 'remember_token'];

    protected function casts(): array
    {
        return [
            'last_seen' => 'datetime',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    //

    public function invited(): BelongsTo
    {
        return $this->belongsTo(self::class, 'invited_id');
    }

    public function invites(): HasMany
    {
        return $this->hasMany(self::class, 'invited_id');
    }

    public function giftsFrom(): HasMany
    {
        return $this->hasMany(Gift::class, 'from_customer_id');
    }

    public function giftsTo(): HasMany
    {
        return $this->hasMany(Gift::class, 'to_customer_id');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class);
    }

    public function favorites(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'favorites');
    }

    //

    public function platform()
    {
        return ['Web', 'Android', 'iOS'][$this->platform];
    }

    public function language()
    {
        return ['English', 'Turkmen', 'Russian'][$this->language];
    }
}

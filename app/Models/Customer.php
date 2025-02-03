<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /** @use HasFactory<\Database\Factories\CustomerFactory> */
    use HasFactory;


    public function platform()
    {
        return ['Web', 'Android', 'iOS'][$this->platform];
    }

    public function language()
    {
        return ['English', 'Turkmen', 'Russian'][$this->language];
    }
}

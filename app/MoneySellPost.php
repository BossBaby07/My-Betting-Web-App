<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MoneySellPost extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'username', 'phone', 't_amount',
    ];
}

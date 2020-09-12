<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReferAmount extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'refer_amount', 'author_amount'
    ];
}

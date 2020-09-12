<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConfirmBet extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_id', 'placer_id', 'placer_team', 'taker_id', 'taker_team', 'confirm_price'
    ];
}

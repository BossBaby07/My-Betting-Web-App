<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'team_one', 'team_two', 'bet_price', 'sport_status',
        'match_date', 'venue', 'match_result'
    ];
}

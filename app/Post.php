<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_owner_id', 'sp_id', 'support_team', 'title', 'description', 'price'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = ['post_id', 'guest_ip'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}

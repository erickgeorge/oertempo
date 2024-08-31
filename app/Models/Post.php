<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Other model properties and methods...

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function isLikedByGuest()
    {
        return $this->likes()->where('guest_ip', request()->ip())->exists();
    }
}

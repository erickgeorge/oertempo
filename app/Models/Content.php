<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    public function creator(){
        return $this->belongsTo('App\Models\User' , 'creator_id');
    }

    public function categ()
    {
        return $this->belongsTo('App\Models\category', 'category');
    }

    public function approve(){
        return $this->belongsTo('App\Models\User' , 'approvedby');
    }

    public function qualityassuarance(){
        return $this->belongsTo('App\Models\User' , 'qa');
    }



    public function likes()
    {
        return $this->hasMany(Like::class, 'courses_id');
    }

    public function isLikedByGuest()
    {
        return $this->likes()->where('guest_ip', request()->ip())->exists();
    }


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function author()
{
    return $this->belongsTo(User::class, 'authorID');
}

public function categoryID()
{
    return $this->belongsTo(Category::class, 'category');
}
}

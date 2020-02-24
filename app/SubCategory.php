<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    public function ads() {
        return $this->hasMany(Ad::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
}

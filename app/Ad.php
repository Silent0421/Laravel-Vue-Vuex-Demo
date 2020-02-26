<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'price',
        'amount',
        'state',
        'category_id',
        'sub_category_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category() {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subCategory() {
        return $this->belongsTo(SubCategory::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name', 'description', 'price_base', 'price_sale', 'images', 'active', 'category_id'
    ];

    public function scopeCategoryId($query, $categoryId)
    {
        if ($categoryId !==null) {
            $query->where('category_id', $categoryId);
        }

        return $query;
    }

    public function scopeWhereLike($query, $column, $value) {
        if ($value !== "") {
            $query->where($column, 'like', '%' . $value . '%');
        }

        return $query;
    }

    public function scopeOrWhereLike($query, $column, $value) {
        if ($value !== "") {
            $query->orWhere($column, 'like', '%' . $value . '%');
        }

        return $query;
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
}

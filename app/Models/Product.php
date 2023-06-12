<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    use HasFactory;

    public function category() {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function orderItem() {
        return $this->hasMany( OrderItem::class, 'product_id' );
    }

    public function subCategory() {
        return $this->belongsTo( SubCategory::class, 'subcategory_id' );
    }

    public function attributeValue() {
        return $this->hasMany( AttributeValue::class, 'product_id' );
    }
}

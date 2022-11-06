<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkshopProduct extends Model
{
    use HasFactory;
    protected $fillable=['workshop_id','product_id','product_variant_id','stocks','sold_stock'];

    public function workshop(){
        return $this->belongsTo(Workshop::class,'workshop_id','id');
    }
    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
    public function productVariant(){
        return $this->belongsTo(ProductVariant::class,'product_variant_id','id');
    }
}

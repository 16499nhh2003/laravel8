<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = 
    [
    'name',
    'image',
    'price',
    'sale_price',
    'description',
    'image_list',
    'status',
    'category_id',
    'created_at',
    'updated_at',
    ];
    public function getNameCategoryById(){
        $result  = $this->hasOne(Category::class,'id','category_id');
        return $result;
    }
    public function details(){
        return $this->hasMany(OrderDetail::class,'product_id','id');
    }
    // localScope
    public function scopeSearch($query){
        if(isset(request()->keyword)){
            $query = $query->where('name','like','%'.request()->keyword.'%');
        }
        return $query;
    }
}

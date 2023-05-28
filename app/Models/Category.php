<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    
    // Join 1-n
    public function products(){
        return $this->hasMany(Product::class,'category_id','id');
    }

    // localScope
    public function scopeSearch($query){
        if(isset(request()->keyword)){
            $query = $query->where('name','like','%'.request()->keyword.'%');
        }
        return $query;
    }
}

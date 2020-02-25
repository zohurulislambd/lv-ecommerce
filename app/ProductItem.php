<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductItem extends Model
{
    // products ///this portion helped from Asif
    /*  protected $guarded = [];
      public function productImages(){
          return $this->hasMany(ProductImage::Class);
      }*/
//    protected $table='product';
    //get image from product_images table
   /* public function images(){
        return $this->hasMany('App\ProductImage'); //one to many relations
    }*/
    protected $fillable = [
        'title','price','quantity',
        'description'
    ];

    public function productPhotos(){
        return $this->hasMany(ProductImage::class,'products_id');
    }

    public static function find($id)
    {
    }

    public function get(string $string)
    {
    }
}

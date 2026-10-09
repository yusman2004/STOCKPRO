<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Product extends Model {
 protected $fillable=['sku','name','category_id','unit','purchase_price','selling_price','stock','minimum_stock','description'];
 protected $casts=['purchase_price'=>'decimal:2','selling_price'=>'decimal:2','stock'=>'integer','minimum_stock'=>'integer'];
 public function category(){return $this->belongsTo(Category::class);}
 public function transactions(){return $this->hasMany(StockTransaction::class);}
 public function getStockStatusAttribute(){return $this->stock <= $this->minimum_stock ? 'Menipis':'Aman';}
}

<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder; use App\Models\User; use App\Models\Category; use App\Models\Product; use App\Models\Supplier; use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder {
 public function run():void {
  User::firstOrCreate(['email'=>'admin@stockpro.test'],['name'=>'Administrator STOK_PRO','password'=>Hash::make('Admin123!'),'role'=>'admin']);
  $cat=Category::firstOrCreate(['name'=>'Umum'],['description'=>'Kategori awal']);
  Supplier::firstOrCreate(['name'=>'Supplier Demo'],['phone'=>'081234567890','email'=>'supplier@example.com','address'=>'Alamat supplier']);
  Product::firstOrCreate(['sku'=>'SKU-DEMO-001'],['name'=>'Produk Contoh','category_id'=>$cat->id,'unit'=>'pcs','purchase_price'=>10000,'selling_price'=>15000,'stock'=>25,'minimum_stock'=>5,'description'=>'Produk contoh, silakan ubah atau hapus.']);
 }
}

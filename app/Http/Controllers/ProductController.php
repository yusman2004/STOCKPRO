<?php
namespace App\Http\Controllers;
use App\Models\Product; use App\Models\Category; use Illuminate\Http\Request; use Illuminate\Validation\Rule;
class ProductController extends Controller {
 public function index(Request $r){$q=Product::with('category'); if($r->filled('search'))$q->where(function($x)use($r){$x->where('name','like','%'.$r->search.'%')->orWhere('sku','like','%'.$r->search.'%');}); if($r->filled('category_id'))$q->where('category_id',$r->category_id); $products=$q->latest()->paginate(10)->withQueryString(); $categories=Category::orderBy('name')->get(); return view('products.index',compact('products','categories'));}
 public function create(){ $product=new Product(); $categories=Category::orderBy('name')->get(); return view('products.form',compact('product','categories')); }
 public function store(Request $r){$data=$this->validated($r); if(empty($data['sku']))$data['sku']='SKU-'.strtoupper(substr(uniqid(),-8)); Product::create($data); return redirect()->route('products.index')->with('success','Produk berhasil ditambahkan.');}
 public function edit(Product $product){$categories=Category::orderBy('name')->get();return view('products.form',compact('product','categories'));}
 public function update(Request $r,Product $product){$data=$this->validated($r,$product); if(empty($data['sku']))$data['sku']=$product->sku; $product->update($data);return redirect()->route('products.index')->with('success','Produk berhasil diperbarui.');}
 public function destroy(Product $product){if($product->transactions()->exists())return back()->with('error','Produk sudah memiliki riwayat transaksi dan tidak dapat dihapus.');$product->delete();return back()->with('success','Produk dihapus.');}
 private function validated(Request $r,?Product $p=null){return $r->validate(['sku'=>['nullable','string','max:50',Rule::unique('products','sku')->ignore($p?->id)],'name'=>'required|string|max:150','category_id'=>'required|exists:categories,id','unit'=>'required|string|max:30','purchase_price'=>'required|numeric|min:0','selling_price'=>'required|numeric|min:0','stock'=>'required|integer|min:0','minimum_stock'=>'required|integer|min:0','description'=>'nullable|string']);}
}

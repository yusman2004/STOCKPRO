<?php
namespace App\Http\Controllers;
use App\Models\Category; use Illuminate\Http\Request;
class CategoryController extends Controller {
 public function index(){ $categories=Category::withCount('products')->orderBy('name')->paginate(10); return view('categories.index',compact('categories')); }
 public function create(){return view('categories.form',['category'=>new Category]);}
 public function store(Request $r){$d=$r->validate(['name'=>'required|string|max:100|unique:categories,name','description'=>'nullable|string']);Category::create($d);return redirect()->route('categories.index')->with('success','Kategori ditambahkan.');}
 public function edit(Category $category){return view('categories.form',compact('category'));}
 public function update(Request $r,Category $category){$d=$r->validate(['name'=>'required|string|max:100|unique:categories,name,'.$category->id,'description'=>'nullable|string']);$category->update($d);return redirect()->route('categories.index')->with('success','Kategori diperbarui.');}
 public function destroy(Category $category){if($category->products()->exists())return back()->with('error','Kategori masih digunakan produk.');$category->delete();return back()->with('success','Kategori dihapus.');}
}

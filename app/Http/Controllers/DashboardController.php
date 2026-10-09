<?php
namespace App\Http\Controllers;
use App\Models\Product; use App\Models\Category; use App\Models\Supplier; use App\Models\StockTransaction;
class DashboardController extends Controller {
 public function index(){
  $totalProducts=Product::count(); $totalCategories=Category::count(); $totalSuppliers=Supplier::count();
  $lowStock=Product::whereColumn('stock','<=','minimum_stock')->count();
  $stockValue=Product::selectRaw('COALESCE(SUM(stock * purchase_price),0) as total')->value('total');
  $recent=StockTransaction::with('product','user')->latest()->take(8)->get();
  $lowProducts=Product::whereColumn('stock','<=','minimum_stock')->orderBy('stock')->take(6)->get();
  return view('dashboard',compact('totalProducts','totalCategories','totalSuppliers','lowStock','stockValue','recent','lowProducts'));
 }
}

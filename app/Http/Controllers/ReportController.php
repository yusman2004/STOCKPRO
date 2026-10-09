<?php
namespace App\Http\Controllers;
use App\Models\Product; use App\Models\StockTransaction; use Illuminate\Http\Request;
class ReportController extends Controller {
 public function index(Request $r){$products=Product::with('category')->when($r->filled('search'),fn($q)=>$q->where('name','like','%'.$r->search.'%'))->orderBy('name')->paginate(15)->withQueryString();$transactions=StockTransaction::with('product','user')->when($r->filled('from'),fn($q)=>$q->whereDate('created_at','>=',$r->from))->when($r->filled('to'),fn($q)=>$q->whereDate('created_at','<=',$r->to))->latest()->take(100)->get();return view('reports.index',compact('products','transactions'));}
}

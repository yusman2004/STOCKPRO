<?php
namespace App\Http\Controllers;
use App\Models\Product; use App\Models\StockTransaction; use Illuminate\Http\Request; use Illuminate\Support\Facades\DB;
class StockController extends Controller {
 public function inForm(){ $products=Product::orderBy('name')->get(); return view('stock.form',['type'=>'in','products'=>$products]); }
 public function outForm(){ $products=Product::orderBy('name')->get(); return view('stock.form',['type'=>'out','products'=>$products]); }
 public function storeIn(Request $r){return $this->save($r,'in');}
 public function storeOut(Request $r){return $this->save($r,'out');}
 private function save(Request $r,string $type){
  $d=$r->validate(['product_id'=>'required|exists:products,id','quantity'=>'required|integer|min:1','note'=>'nullable|string|max:500']);
  try { DB::transaction(function()use($d,$type){$p=Product::whereKey($d['product_id'])->lockForUpdate()->firstOrFail(); if($type==='out' && $p->stock < $d['quantity'])throw new \RuntimeException('Stok tidak mencukupi. Stok tersedia: '.$p->stock); $p->stock += $type==='in' ? $d['quantity'] : -$d['quantity'];$p->save();StockTransaction::create(['code'=>'TRX-'.now()->format('YmdHis').'-'.random_int(10,99),'product_id'=>$p->id,'user_id'=>auth()->id(),'type'=>$type,'quantity'=>$d['quantity'],'note'=>$d['note']??null]);}); }
  catch(\RuntimeException $e){return back()->withInput()->with('error',$e->getMessage());}
  return redirect()->route('stock.history')->with('success',$type==='in'?'Stok masuk berhasil dicatat.':'Stok keluar berhasil dicatat.');
 }
 public function history(Request $r){$q=StockTransaction::with('product','user')->latest();if($r->filled('type'))$q->where('type',$r->type);if($r->filled('from'))$q->whereDate('created_at','>=',$r->from);if($r->filled('to'))$q->whereDate('created_at','<=',$r->to);$transactions=$q->paginate(15)->withQueryString();return view('stock.history',compact('transactions'));}
}

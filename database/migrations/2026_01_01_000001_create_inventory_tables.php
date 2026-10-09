<?php
use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; use Illuminate\Support\Facades\Schema;
return new class extends Migration { public function up():void {
 Schema::create('categories',function(Blueprint $t){$t->id();$t->string('name')->unique();$t->text('description')->nullable();$t->timestamps();});
 Schema::create('units',function(Blueprint $t){$t->id();$t->string('name');$t->string('symbol',20);$t->timestamps();});
 Schema::create('suppliers',function(Blueprint $t){$t->id();$t->string('name');$t->string('phone',30)->nullable();$t->string('email')->nullable();$t->text('address')->nullable();$t->timestamps();});
 Schema::create('products',function(Blueprint $t){$t->id();$t->string('sku',50)->unique();$t->string('name');$t->foreignId('category_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();$t->string('unit',30);$t->decimal('purchase_price',15,2)->default(0);$t->decimal('selling_price',15,2)->default(0);$t->unsignedInteger('stock')->default(0);$t->unsignedInteger('minimum_stock')->default(5);$t->text('description')->nullable();$t->timestamps();});
 Schema::create('stock_transactions',function(Blueprint $t){$t->id();$t->string('code')->unique();$t->foreignId('product_id')->constrained()->restrictOnDelete();$t->foreignId('user_id')->constrained()->restrictOnDelete();$t->enum('type',['in','out','adjustment']);$t->unsignedInteger('quantity');$t->text('note')->nullable();$t->timestamps();$t->index(['type','created_at']);});
} public function down():void {Schema::dropIfExists('stock_transactions');Schema::dropIfExists('products');Schema::dropIfExists('suppliers');Schema::dropIfExists('units');Schema::dropIfExists('categories');}};

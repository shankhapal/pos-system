<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public function up() {
    Schema::create('sales', function (Blueprint $table) {
        $table->id();
        $table->foreignId('transaction_id')->constrained()->onDelete('cascade');
        $table->foreignId('product_id')->constrained()->onDelete('cascade');
        $table->integer('quantity');
        $table->decimal('price', 8, 2);
        $table->timestamps();
    });
}

}
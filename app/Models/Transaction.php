<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function up() {
    Schema::create('transactions', function (Blueprint $table) {
        $table->id();
        $table->foreignId('customer_id')->constrained()->onDelete('cascade');
        $table->decimal('total_amount', 8, 2);
        $table->timestamps();
    });
}

}
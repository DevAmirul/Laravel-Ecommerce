<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    
/**
 * Run the migrations.
 *
 * @return void
 */
    public function up() {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->decimal('subtotal');
            $table->decimal('discount')->default(0);
            $table->decimal('tax');
            $table->decimal('total');
            $table->string('name');
            $table->string('mobile');
            $table->string('address');
            $table->text('extra_note')->nullable();
            $table->decimal('shipping_cost');
            $table->date('delivered_date')->nullable();
            $table->date('canceled_date')->nullable();
            $table->enum('shipping_address', ['inside', 'outside']);
            $table->enum('status', ['pending', 'delivered', 'canceled'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('orders');
    }
};

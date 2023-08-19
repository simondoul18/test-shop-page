<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vendor_id');
            $table->string('sku', 250);
            $table->text('title');
            $table->string('image', 250)->nullable();
            $table->longText('description')->nullable();
            $table->longText('attributes')->nullable();
            $table->text('color')->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->tinyInteger('rating')->nullable();
            $table->tinyInteger('isDynamicPrice')->default(0);
            $table->double('price')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->text('tax_ids')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

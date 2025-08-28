<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description');
            $table->text('short_description')->nullable();
            $table->string('sku')->unique();
            $table->decimal('price', 10, 2);
            $table->decimal('compare_price', 10, 2)->nullable(); // Original price for discounts
            $table->integer('quantity')->default(0);
            $table->decimal('weight', 8, 2)->nullable();
            $table->string('dimensions')->nullable(); // L x W x H
            $table->string('main_image')->nullable();
            $table->json('gallery_images')->nullable(); // Store multiple images as JSON
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->json('specifications')->nullable(); // Product specs as JSON
            $table->boolean('track_quantity')->default(true);
            $table->boolean('continue_selling_when_out_of_stock')->default(false);
            $table->boolean('featured')->default(false);
            $table->boolean('status')->default(1);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            
            // Indexes for performance
            $table->index('status');
            $table->index('featured');
            $table->index('published_at');
            $table->index('sku');
            $table->index('slug');
            
            // Full-text search index for product search
            $table->fullText(['name', 'description', 'short_description']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};

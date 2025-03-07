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
        Schema::create('dishes', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Tên món ăn
            $table->text('description')->nullable(); // Mô tả món ăn
            $table->decimal('price', 10, 2); // Giá tiền
            $table->integer('stock')->default(0); // Số lượng tồn kho (nếu có)
            $table->foreignId('sub_category_id')->nullable()->constrained('sub_categories')->onDelete('cascade');
            $table->string('image')->nullable(); // Ảnh món ăn
            $table->boolean('is_available')->default(1); // Món còn bán hay không
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dishes');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('dish_variants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dish_id')->constrained('dishes')->onDelete('cascade'); // Liên kết với món ăn
            $table->string('name'); // Tên biến thể (VD: Size L, Size M, Cay hơn,...)
            $table->decimal('price', 10, 2)->nullable(); // Giá riêng của biến thể
            $table->integer('stock')->default(0); // Số lượng tồn kho của biến thể
            $table->boolean('is_available')->default(1); // Biến thể có còn bán không
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dish_variants');
    }
};

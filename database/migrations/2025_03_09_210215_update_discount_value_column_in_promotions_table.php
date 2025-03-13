<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('promotions', function (Blueprint $table) {
            $table->decimal('discount_value', 10, 2)->change(); // Cho phép giá trị lớn hơn với 2 chữ số thập phân
        });
    }

    public function down()
    {
        Schema::table('promotions', function (Blueprint $table) {
            $table->integer('discount_value')->change(); // Quay lại kiểu dữ liệu cũ nếu rollback
        });
    }
};

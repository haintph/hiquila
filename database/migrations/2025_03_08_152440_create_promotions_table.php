<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('discount_type', ['fixed', 'percent', 'freeship']);
            $table->float('discount_value')->nullable();
            $table->dateTime('start_date'); // Xóa .change()
            $table->dateTime('end_date'); // Xóa .change()
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('promotions');
    }
};

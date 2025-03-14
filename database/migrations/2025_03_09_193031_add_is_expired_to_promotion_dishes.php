<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('promotion_dishes', function (Blueprint $table) {
            $table->boolean('is_expired')->default(false)->after('discount');
        });
    }
    public function down()
    {
        Schema::table('promotion_dishes', function (Blueprint $table) {
            $table->dropColumn('is_expired');
        });
    }

};

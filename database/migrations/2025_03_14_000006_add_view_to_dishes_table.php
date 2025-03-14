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
        Schema::table('dishes', function (Blueprint $table) {
            $table->integer('view')->default(0)->after('is_new');
        });
    }

    public function down()
    {
        Schema::table('dishes', function (Blueprint $table) {
            $table->dropColumn('view');
        });
    }

};

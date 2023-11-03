<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('locator')->unique();
            $table->decimal('discount', 6,2)->default(0);
            $table->enum('mode_discount', ['value', 'porc'])->default('porc');
            $table->decimal('limit', 6,2)->default(0);
            $table->enum('mode_limit', ['value', 'qtd'])->default('qtd');
            $table->dateTime('dthr_validity');
            $table->enum('active', ['S', 'N'])->default('S');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupons');
    }
};

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
        Schema::create('empolyees', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unique()->nullable();
            $table->string('name');
            $table->string('tel');
            $table->string('card_num');


            $table->string('depant_id');
            $table->string('branch_id');

            $table->datetime('start_time');
            $table->text('address');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empolyees');
    }
};

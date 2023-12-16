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
            $table->string('name')->nullable();
            $table->string('tel')->nullable();
            $table->string('card_num')->nullable();


            $table->string('depant_id')->nullable();
            $table->string('branch_id')->nullable();

            $table->datetime('start_time')->nullable();
            $table->text('address')->nullable();
            
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

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
        Schema::create('health_datas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained('users')->onDelete('cascade');
            $table->date('birthdate');
            $table->float('weight');
            $table->float('height');
            $table->integer('sleeptime');
            $table->string('disease');
            $table->string('food');
            $table->string('alergi_makanan');
            $table->string('obesity_status')->nullable();
            $table->integer('calorie_recommendation')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('health_datas');
    }
};

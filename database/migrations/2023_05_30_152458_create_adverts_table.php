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
        Schema::create('adverts', function (Blueprint $table) {
            $table->id();
            $table->string('status')->nullable();
            $table->string('type')->nullable();
            $table->string('title')->nullable();
            $table->string('city')->nullable();
            $table->string('town')->nullable();
            $table->string('address')->nullable();
            $table->decimal('price')->nullable();
            $table->string('number_rooms')->nullable();
            $table->integer('squaremeters')->nullable();
            $table->string('buildingage')->nullable();
            $table->string('floorlocation')->nullable();
            $table->string('description')->nullable();
            $table->string('isItem')->nullable();
            $table->string('map')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adverts');
    }
};

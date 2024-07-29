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
        Schema::create('children', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')
                ->references('user_id')
                ->on('owners');

            $table->string('first_name');
            $table->string('last_name');
            $table->enum('sex', [
                'male',
                'female'
            ]);
            $table->boolean('adopted');
            $table->timestamp('date_of_birth');
            $table->timestamps();

            $table->unique([
                'first_name', 'last_name'
            ], 'child_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('children');
    }
};

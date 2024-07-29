<?php

use App\Enum\AppointmentStatus;
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
        Schema::create('vaccin_appointments', function(Blueprint $table){
            $table->id();
            $table->foreignId('child_id')
                ->references('id')
                ->on('children')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreignId('vaccin_id')
                ->references('id')
                ->on('vaccins')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->bigInteger('with_appointment')->nullable();

            $table->timestamp("vaccin_date");

            $table->enum('status', AppointmentStatus::values());
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vaccin_appointments');
    }
};

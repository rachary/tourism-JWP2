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
        Schema::create('destination_regions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::table('destinations', function (Blueprint $table) {
            $table->foreignId('destination_region_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destination_regions');
    }


};

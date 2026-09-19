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
        Schema::create('circle_positions', function (Blueprint $table) {
            $table->id();

            $table->string('name', 100);

            $table->string('division', 100);

            $table->foreignId('role_id')
                ->nullable()
                ->constrained('circle_roles')
                ->nullOnDelete();

            $table->boolean('is_active')
                ->default(true);

            $table->timestamps();

            $table->unique(
                ['name', 'division'],
                'circle_positions_name_division_unique'
            );

            $table->index('division');
            $table->index('is_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('circle_positions');
    }
};

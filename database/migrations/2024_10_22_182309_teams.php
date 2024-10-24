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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->integer('skills_id');
            $table->string('image')->nullable();
            $table->string('member_name')->nullable();
            $table->string('member_details')->nullable();
            $table->string('company_name')->nullable();
            $table->string('designation')->nullable();
            $table->timestamps();
            // Foreign key constraint
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};

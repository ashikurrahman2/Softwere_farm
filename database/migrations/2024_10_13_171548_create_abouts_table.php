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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('self_image')->nullable();
            $table->string('title')->nullable();
            $table->string('sub_title')->nullable();
            $table->string('leader_name')->nullable();
            $table->string('leader_designation')->nullable();
            $table->string('company_name')->nullable();
            $table->text('our_mission')->nullable();
            $table->string('mission_details')->nullable();
            $table->integer('complete_projects')->nullable();
            $table->integer('happy_clients')->nullable();
            $table->integer('skills_experts')->nullable();
            $table->integer('media_posts')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};

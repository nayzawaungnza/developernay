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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('position');
            $table->text('bio');
            $table->text('ambition');
            $table->string('ambition_icon')->nullable();
            $table->text('purpose');
            $table->string('purpose_icon')->nullable();
            $table->string('image_1')->nullable();
            $table->string('image_2')->nullable();
            $table->integer('status')->default(0);
            $table->boolean('is_active')->default(false); // Field to indicate the active bio
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};

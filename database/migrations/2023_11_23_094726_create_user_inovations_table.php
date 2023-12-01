<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_inovations', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('publisher_name');
            $table->date('release_date');
            $table->text('description');
            $table->string('link_video');
            $table->string('category');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE user_inovations ADD photo MEDIUMBLOB");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_inovations');
    }
};

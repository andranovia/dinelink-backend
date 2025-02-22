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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('user_id')->nullable()->constrained();
            $table->string('email')->unique();
            $table->longText('img')->nullable();
            $table->string('code')->unique()->after('id');
            $table->string('phone_number')->nullable();
            $table->integer('rating')->nullable();
            $table->string('address')->nullable();
            $table->string('logo')->nullable();
            $table->boolean('open');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};

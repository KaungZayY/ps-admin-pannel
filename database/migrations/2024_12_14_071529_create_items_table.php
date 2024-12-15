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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->string('category');
            $table->double('price');
            $table->text('description');
            $table->string('item_condition');
            $table->string('item_type');
            $table->integer('status')->nullable();
            $table->string('item_photo')->nullable();
            $table->string('owner_name');
            $table->string('country_code');
            $table->string('phone_number');
            $table->string('address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};

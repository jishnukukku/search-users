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
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('Fk_department')->comment('Foreign key referencing department table');
            $table->unsignedBigInteger('Fk_designation')->comment('Foreign key referencing designation table');
            $table->string('mobile');
            $table->timestamps();


            $table->foreign('Fk_department')->references('id')->on('department')->onDelete('cascade');
            $table->foreign('Fk_designation')->references('id')->on('designation')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};

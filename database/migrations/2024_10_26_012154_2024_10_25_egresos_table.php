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
        Schema::create("egresos", function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->integer("monto");
            $table->dateTime("fecha");
            $table->text("descripcion");
            $table->foreignId("id_categoria")->constrained("categorias")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("egresos");
    }
};

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
        Schema ::create("ingresos", function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->integer("monto");
            $table->date("fecha");
            $table->text("descripcion")->nullable();
            $table->foreignId("id_categoria")->nullable()->constrained('categorias')->onDelete('set null');
            $table->foreignId("id_user")->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema ::dropIfExists('ingresos');
    }
};

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
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->string('numero', 7);
            $table->float('prix');
            $table->timestamps();

            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            
            $table->unsignedBigInteger('adresse_livraison_id')->nullable();
            $table->foreign('adresse_livraison_id')->references('id')->on('adresses')->onDelete('set null');

            $table->unsignedBigInteger('adresse_facturation_id')->nullable();
            $table->foreign('adresse_facturation_id')->references('id')->on('adresses')->onDelete('set null');

        }) ;
    }
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};

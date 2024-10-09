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
        Schema::table('products', function (Blueprint $table) {
            if (!Schema::hasColumn('products', 'image')) {
                $table->string('image')->nullable(); // Ajoute la colonne 'image' de type chaîne, nullable
            }
            if (!Schema::hasColumn('products', 'created_at')) {
                $table->timestamps(); // Ajoute les colonnes 'created_at' et 'updated_at' si elles n'existent pas
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            if (Schema::hasColumn('products', 'image')) {
                $table->dropColumn('image'); // Supprime la colonne 'image' si elle existe
            }
            if (Schema::hasColumn('products', 'created_at')) {
                $table->dropTimestamps(); // Supprime les colonnes 'created_at' et 'updated_at' si elles existent
            }
        });
    }
};

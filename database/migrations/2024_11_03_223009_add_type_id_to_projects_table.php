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
        Schema::table('projects', function (Blueprint $table) {
            // creo la colonna type_id
            $table->unsignedBigInteger('type_id')->nullable();
            // aggiungo foreign key sulla colonna type_id
            $table->foreign('type_id')
                ->references('id')
                ->on('types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // controllo che esista la colonna
            if (Schema::hasColumn('projects', 'type_id')) {
                /* 
                    Visto che non è possibile droppare una colonna foreign key,
                    prima rimuovo il vincolo di foreign key,
                    droppando l'indice della colonna specifica.
                */
                $table->dropForeign(['type_id']);
                // poi droppo la colonna
                $table->dropColumn('type_id');
            }
        });
    }
};

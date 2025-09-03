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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_id')->nullable();

            // Minor details
            $table->string('minore_cognome')->nullable();
            $table->string('minore_nome')->nullable();
            $table->string('minore_luogo_nascita')->nullable();
            $table->date('minore_data_nascita')->nullable();
            $table->string('minore_luogo_residenza')->nullable();
            $table->string('minore_indirizzo')->nullable();
            $table->string('minore_cod_fis', 16)->nullable();
            $table->string('guardian', 16)->nullable();

            // General person details
            $table->string('cognome')->nullable();
            $table->string('nome')->nullable();
            $table->string('luogo_nascita')->nullable();
            $table->date('data_nascita')->nullable();
            $table->string('luogo_residenza')->nullable();
            $table->string('indirizzo')->nullable();
            $table->string('cod_fis', 16)->nullable();

            // Document details
            $table->string('doc_tipo')->nullable();
            $table->string('doc_num')->nullable();
            $table->string('doc_luogo_rilascio')->nullable();
            $table->date('doc_data_rilascio')->nullable();

            // Contact details
            $table->string('tel')->nullable();
            $table->string('e_mail')->nullable();

            // Position
            $table->string('posizione')->nullable();

            // Minor flag
            $table->boolean('minor')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};

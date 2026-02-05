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
        Schema::create('supporting_members', function (Blueprint $table) {
            $table->id();
            $table->string('membership_type')->nullable();
            $table->string('company_name')->nullable();
            $table->string('applicant_role')->nullable();
            $table->string('full_name');
            $table->string('birth_place');
            $table->date('birth_date');
            $table->string('fiscal_code', 16);
            $table->string('id_type')->nullable();
            $table->string('id_number')->nullable();
            $table->date('id_expiry')->nullable();
            $table->string('residence')->nullable();
            $table->string('street')->nullable();
            $table->string('street_number')->nullable();
            $table->string('postal_code', 10)->nullable();
            $table->string('province')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email');
            $table->string('pec')->nullable();
            $table->decimal('contribution', 10, 2)->nullable();
            $table->string('payment_method')->nullable();
            $table->string('iban', 34)->nullable();
            $table->string('payment_note')->nullable();
            $table->date('submission_date')->nullable();
            $table->string('signing_place')->nullable();
            $table->date('signing_date')->nullable();
            $table->boolean('data_consent')->default(false);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supporting_members');
    }
};

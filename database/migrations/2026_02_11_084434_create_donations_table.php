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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();

            // Donor type: physical or legal
            $table->string('donor_type');

            // Physical person fields
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('tax_code')->nullable();
            $table->string('birth_place')->nullable();
            $table->date('birth_date')->nullable();

            // Legal entity fields
            $table->string('company_name')->nullable();
            $table->string('legal_role')->nullable();
            $table->string('vat_number')->nullable();

            // Address
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('province', 2)->nullable();
            $table->string('postal_code', 10)->nullable();

            // Contacts
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('pec')->nullable();

            // Donation data
            $table->decimal('amount', 10, 2);
            $table->year('donation_year')->default(2026);
            $table->string('project')->default('Rifacimento/restauro elementi obelisco di paglia');
            $table->date('donation_date')->nullable();
            $table->boolean('receipt_issued')->default(false);

            // Privacy
            $table->boolean('privacy_accepted')->default(false);
            $table->timestamp('privacy_accepted_at')->nullable();
            $table->string('ip_address')->nullable();

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};

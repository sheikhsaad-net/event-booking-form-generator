<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = [
        'donor_type',

        // Physical person
        'first_name',
        'last_name',
        'tax_code',
        'birth_place',
        'birth_date',

        // Legal entity
        'company_name',
        'legal_role',
        'vat_number',

        // Address
        'address',
        'city',
        'province',
        'postal_code',

        // Contacts
        'phone',
        'mobile',
        'email',
        'pec',

        // Donation
        'amount',
        'donation_year',
        'project',
        'donation_date',
        'receipt_issued',

        // Privacy
        'privacy_accepted',
        'privacy_accepted_at',
        'ip_address',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'birth_date' => 'date',
        'donation_date' => 'date',
        'receipt_issued' => 'boolean',
        'privacy_accepted' => 'boolean',
        'privacy_accepted_at' => 'datetime',
    ];

    // public function getDonorNameAttribute()
    // {
    //     if ($this->donor_type === 'physical') {
    //         return trim($this->first_name . ' ' . $this->last_name);
    //     }

    //     return $this->company_name;
    // }
}

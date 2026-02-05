<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SupportingMember extends Model
{
    use HasFactory;

    protected $table = 'supporting_members';

    protected $fillable = [
        'membership_type',
        'company_name',
        'applicant_role',
        'full_name',
        'birth_place',
        'birth_date',
        'fiscal_code',
        'id_type',
        'id_number',
        'id_expiry',
        'residence',
        'street',
        'street_number',
        'postal_code',
        'province',
        'phone',
        'mobile',
        'email',
        'pec',
        'contribution',
        'payment_method',
        'iban',
        'payment_note',
        'submission_date',
        'signing_place',
        'signing_date',
        'data_consent',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'id_expiry' => 'date',
        'submission_date' => 'date',
        'signing_date' => 'date',
        'data_consent' => 'boolean',
    ];
}

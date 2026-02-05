<?php

namespace App\Http\Controllers;

use App\Models\SupportingMember;
use Illuminate\Http\Request;


class SupportingMemberController extends Controller
{
    public function store(Request $request)
    {
        // Validate incoming request
        $validated = $request->validate([
            'membership_type' => 'required|string|max:255',
            'company_name'    => 'nullable|string|max:255',
            'applicant_role'  => 'nullable|string|max:255',
            'full_name'       => 'required|string|max:255',
            'birth_place'     => 'required|string|max:255',
            'birth_date'      => 'required|date',
            'fiscal_code'     => 'required|string|max:16',
            'id_type'         => 'nullable|string|max:50',
            'id_number'       => 'nullable|string|max:100',
            'id_expiry'       => 'nullable|date',
            'residence'       => 'required|string|max:255',
            'street'          => 'required|string|max:255',
            'street_number'   => 'nullable|string|max:50',
            'postal_code'     => 'nullable|string|max:20',
            'province'        => 'nullable|string|max:100',
            'phone'           => 'nullable|string|max:50',
            'mobile'          => 'nullable|string|max:50',
            'email'           => 'required|email|max:255',
            'pec'             => 'nullable|email|max:255',
            'contribution'    => 'nullable|numeric',
            'payment_method'  => 'nullable|string|max:255',
            'iban'            => 'nullable|string|max:50',
            'payment_note'    => 'nullable|string|max:255',
            'signing_place'   => 'nullable|string|max:255',
            'signing_date'    => 'nullable|date',
            'data_consent'    => 'required|accepted',
        ]);

        // Create new supporting member record
        $member = SupportingMember::create($validated);

        // Generate unique ID for reference
        $memberCode = 'SM-' . str_pad($member->id, 5, '0', STR_PAD_LEFT);

        // Redirect to thank-you page with message
        return redirect()->route('thanks')->with('success', 'La tua domanda come Socio Sostenitore è stata inviata con successo. ID: ' . $memberCode);
    }
}

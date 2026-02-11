<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;

class DonationController extends Controller
{
    public function create()
    {
        return view('user.donations');
    }

    public function store(Request $request)
    {
        $rules = [
            'donor_type' => 'required|string|in:physical,legal',

            'email' => 'required|email',
            'amount' => 'required|numeric|min:1',
            'donation_year' => 'required|integer',
            'privacy_accepted' => 'required|accepted',
        ];

        if ($request->donor_type === 'physical') {
            $rules = array_merge($rules, [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'tax_code' => 'nullable|string|max:16',
                'birth_place' => 'nullable|string|max:255',
                'birth_date' => 'nullable|date',
            ]);
        }

        if ($request->donor_type === 'legal') {
            $rules = array_merge($rules, [
                'company_name' => 'required|string|max:255',
                'legal_role' => 'required|string|max:255',
                'vat_number' => 'required|string|max:30',
            ]);
        }

        $validated = $request->validate($rules);

        $validated['privacy_accepted_at'] = now();
        $validated['ip_address'] = $request->ip();

        Donation::create($validated);

        // Redirect to thank-you page with message
        return redirect()->route('thanks')->with('success', 'Donazione registrata correttamente.');

    }
}

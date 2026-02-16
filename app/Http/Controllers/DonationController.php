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
            'first_name' => 'required|string|max:255', // Moved here
            'last_name' => 'required|string|max:255',  // Moved here
            'email' => 'required|email',
            'amount' => 'required|numeric|min:1',
            'donation_year' => 'required|integer',
            'privacy_accepted' => 'required|accepted',
        ];

        if ($request->donor_type === 'physical') {
            $rules = array_merge($rules, [
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

    public function index(Request $request)
    {
        $query = Donation::query();

        // Search by name or tax code
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('first_name', 'LIKE', "%$search%")
                  ->orWhere('last_name', 'LIKE', "%$search%")
                  ->orWhere('tax_code', 'LIKE', "%$search%");
            });
        }

        // Alphabet filter by last name
        if ($request->filled('letter')) {
            $letter = $request->letter;
            $query->where('last_name', 'LIKE', $letter . '%');
        }

        // Donor type filter
        if ($request->filled('donor_type')) {
            $query->where('donor_type', $request->donor_type);
        }

        // Date filter
        if ($request->filled('donation_date')) {
            $query->whereDate('donation_date', $request->donation_date);
        }

        $donations = $query->paginate(50)->appends($request->all());

        return view('donations', compact('donations'));
    }

    // Show details of a single donation
    public function show($id)
    {
        $donation = Donation::findOrFail($id);
        return view('donations-show', compact('donation'));
    }

    // Update donation data
    public function update(Request $request, $id)
    {
        $donation = Donation::findOrFail($id);

        $validated = $request->validate([
            'donor_type'       => 'required|string|max:255',
            'first_name'       => 'nullable|string|max:255',
            'last_name'        => 'nullable|string|max:255',
            'tax_code'         => 'nullable|string|max:255',
            'birth_place'      => 'nullable|string|max:255',
            'birth_date'       => 'nullable|date',
            'company_name'     => 'nullable|string|max:255',
            'legal_role'       => 'nullable|string|max:255',
            'vat_number'       => 'nullable|string|max:255',
            'address'          => 'nullable|string|max:255',
            'city'             => 'nullable|string|max:255',
            'province'         => 'nullable|string|max:2',
            'postal_code'      => 'nullable|string|max:10',
            'phone'            => 'nullable|string|max:255',
            'mobile'           => 'nullable|string|max:255',
            'email'            => 'nullable|email|max:255',
            'pec'              => 'nullable|email|max:255',
            'amount'           => 'required|numeric',
            'donation_year'    => 'required|digits:4',
            'project'          => 'required|string|max:255',
            'donation_date'    => 'nullable|date',
            'receipt_issued'   => 'boolean',
            'privacy_accepted' => 'required|accepted',
        ]);

        $donation->update($validated);

        return redirect()->route('donations.show', $id)
                         ->with('success', 'Dati della donazione aggiornati correttamente.');
    }

    // Delete donation
    public function destroy($id)
    {
        $donation = Donation::findOrFail($id);
        $donation->delete();

        return redirect()->route('donations.index')
                         ->with('success', 'Donazione eliminata correttamente.');
    }
}

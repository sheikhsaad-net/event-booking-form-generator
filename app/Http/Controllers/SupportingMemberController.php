<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SupportingMember;

class SupportingMemberController extends Controller
{

    public function create()
    {
        return view('user.supporting-members');
    }

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
            'payment_note'    => 'nullable|string|max:255',
            'data_consent'    => 'required|accepted',
        ]);

        // Create new supporting member record
        $member = SupportingMember::create($validated);

        // Generate unique ID for reference
        $memberCode = 'SM-' . str_pad($member->id, 5, '0', STR_PAD_LEFT);

        // Redirect to thank-you page with message
        return redirect()->route('thanks')->with('success', 'La tua domanda come Socio Sostenitore è stata inviata con successo. ID: ' . $memberCode);
    }

    // List all supporting members with filters
    public function index(Request $request)
    {
        $query = SupportingMember::query();

        // Search by name or surname
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('full_name', 'LIKE', "%$search%")
                  ->orWhere('fiscal_code', 'LIKE', "%$search%");
            });
        }

        // Alphabet filter by surname
        if ($request->filled('letter')) {
            $letter = $request->letter;
            $query->where('full_name', 'LIKE', $letter . '%');
        }

        // Membership type filter
        if ($request->filled('membership_type')) {
            $query->where('membership_type', $request->membership_type);
        }

        // Date filter
        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $members = $query->paginate(50)->appends($request->all());

        return view('members', compact('members'));
    }

    // Show details of a single member
    public function show($id)
    {
        $member = SupportingMember::findOrFail($id);
        return view('members-show', compact('member'));
    }

    // Update member data
    public function update(Request $request, $id)
    {
        $member = SupportingMember::findOrFail($id);

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
            'payment_note'    => 'nullable|string|max:255',
            'data_consent'    => 'required|accepted',
        ]);

        $member->update($validated);

        return redirect()->route('members.show', $id)->with('success', 'Dati del Socio aggiornati correttamente.');
    }

    // Delete member
    public function destroy($id)
    {
        $member = SupportingMember::findOrFail($id);
        $member->delete();

        return redirect()->route('members.index')
                         ->with('success', 'Socio Sostenitore eliminato correttamente.');
    }

}
<x-guest-layout>
    <main class="main-content mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 d-flex flex-column mx-auto">
                            <div class="card card-plain mt-5 pb-5">
                                <div class="card-header pb-0 text-left bg-transparent">
                                    <h3 class="font-weight-black text-dark display-6 mb-3">
                                        DONAZIONE LIBERALE – ANNO {{ now()->year }}
                                    </h3>
                                </div>

                                <div class="card-body">

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul class="mb-0">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <form method="POST" action="{{ route('donations.store') }}">
                                        @csrf

                                        {{-- Donor Type --}}
                                        <div class="row mb-3">
                                            <div class="col">
                                                <label class="form-label">Tipo Donatore*</label>
                                                <select id="donorType" name="donor_type" class="form-select" required>
                                                    <option value="">-- Seleziona --</option>
                                                    <option value="physical" {{ old('donor_type') === 'physical' ? 'selected' : '' }}>
                                                        Persona fisica
                                                    </option>
                                                    <option value="legal" {{ old('donor_type') === 'legal' ? 'selected' : '' }}>
                                                        Persona giuridica
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        {{-- Legal Entity Fields --}}
                                        <div id="legalFields" class="row mb-3 d-none">
                                            <div class="col">
                                                <label class="form-label">Ragione Sociale*</label>
                                                <input type="text" name="company_name" id="company_name"
                                                       class="form-control"
                                                       value="{{ old('company_name') }}">
                                            </div>
                                            <div class="col">
                                                <label class="form-label">Qualifica*</label>
                                                <input type="text" name="legal_role" id="legal_role"
                                                       class="form-control"
                                                       value="{{ old('legal_role') }}">
                                            </div>
                                            <div class="col">
                                                <label class="form-label">Partita IVA / Codice Fiscale*</label>
                                                <input type="text" name="vat_number" id="vat_number"
                                                       class="form-control"
                                                       value="{{ old('vat_number') }}">
                                            </div>
                                        </div>

                                        {{-- Physical Person Fields --}}
                                        <div id="physicalFields">
                                            <div class="row mb-3">
                                                <div class="col">
                                                    <label class="form-label">Nome*</label>
                                                    <input type="text" name="first_name" id="first_name"
                                                           class="form-control"
                                                           value="{{ old('first_name') }}">
                                                </div>
                                                <div class="col">
                                                    <label class="form-label">Cognome*</label>
                                                    <input type="text" name="last_name" id="last_name"
                                                           class="form-control"
                                                           value="{{ old('last_name') }}">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col">
                                                    <label class="form-label">Luogo di nascita</label>
                                                    <input type="text" name="birth_place"
                                                           class="form-control"
                                                           value="{{ old('birth_place') }}">
                                                </div>
                                                <div class="col">
                                                    <label class="form-label">Data di nascita</label>
                                                    <input type="date" name="birth_date"
                                                           class="form-control"
                                                           value="{{ old('birth_date') }}">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col">
                                                    <label class="form-label">Codice Fiscale</label>
                                                    <input type="text" name="tax_code"
                                                           class="form-control"
                                                           value="{{ old('tax_code') }}">
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Address --}}
                                        <div class="row mb-3">
                                            <div class="col">
                                                <label class="form-label">Indirizzo</label>
                                                <input type="text" name="address"
                                                       class="form-control"
                                                       value="{{ old('address') }}">
                                            </div>
                                            <div class="col">
                                                <label class="form-label">Città</label>
                                                <input type="text" name="city"
                                                       class="form-control"
                                                       value="{{ old('city') }}">
                                            </div>
                                            <div class="col">
                                                <label class="form-label">CAP</label>
                                                <input type="text" name="postal_code"
                                                       class="form-control"
                                                       value="{{ old('postal_code') }}">
                                            </div>
                                            <div class="col">
                                                <label class="form-label">Provincia</label>
                                                <input type="text" name="province"
                                                       class="form-control"
                                                       value="{{ old('province') }}">
                                            </div>
                                        </div>

                                        {{-- Contacts --}}
                                        <div class="row mb-3">
                                            <div class="col">
                                                <label class="form-label">Telefono</label>
                                                <input type="text" name="phone"
                                                       class="form-control"
                                                       value="{{ old('phone') }}">
                                            </div>
                                            <div class="col">
                                                <label class="form-label">Cellulare</label>
                                                <input type="text" name="mobile"
                                                       class="form-control"
                                                       value="{{ old('mobile') }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <label class="form-label">Email*</label>
                                                <input type="email" name="email"
                                                       class="form-control"
                                                       value="{{ old('email') }}" required>
                                            </div>
                                            <div class="col">
                                                <label class="form-label">PEC</label>
                                                <input type="email" name="pec"
                                                       class="form-control"
                                                       value="{{ old('pec') }}">
                                            </div>
                                        </div>

                                        {{-- Donation --}}
                                        <div class="row mb-3">
                                            <div class="col">
                                                <label class="form-label">Importo Donazione (€)*</label>
                                                <input type="number" name="amount" step="0.01"
                                                       class="form-control"
                                                       value="{{ old('amount') }}" required>
                                            </div>
                                            <div class="col">
                                                <label class="form-label">Data Donazione</label>
                                                <input type="date" name="donation_date"
                                                       class="form-control"
                                                       value="{{ old('donation_date') }}">
                                            </div>
                                        </div>

                                        <input type="hidden" name="donation_year" value="{{ now()->year }}">
                                        <input type="hidden" name="project"
                                               value="Rifacimento/restauro elementi obelisco di paglia">

                                        {{-- Privacy --}}
                                        <div class="form-check mb-3">
                                            <input type="checkbox" name="privacy_accepted"
                                                   value="1" class="form-check-input" required>
                                            <label class="form-check-label">
                                                Accetto l'informativa sul trattamento dei dati personali.
                                            </label>
                                        </div>

                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary w-100">
                                                INVIA DONAZIONE
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script>
        const donorSelect = document.getElementById('donorType');
        const legalFields = document.getElementById('legalFields');
        const physicalFields = document.getElementById('physicalFields');

        const companyName = document.getElementById('company_name');
        const legalRole = document.getElementById('legal_role');
        const vatNumber = document.getElementById('vat_number');

        const firstName = document.getElementById('first_name');
        const lastName = document.getElementById('last_name');

        function toggleFields() {
            if (donorSelect.value === 'legal') {
                legalFields.classList.remove('d-none');
                physicalFields.classList.add('d-none');

                companyName.required = true;
                legalRole.required = true;
                vatNumber.required = true;

                firstName.required = false;
                lastName.required = false;
            } else {
                legalFields.classList.add('d-none');
                physicalFields.classList.remove('d-none');

                companyName.required = false;
                legalRole.required = false;
                vatNumber.required = false;

                firstName.required = true;
                lastName.required = true;
            }
        }

        donorSelect.addEventListener('change', toggleFields);
        window.addEventListener('DOMContentLoaded', toggleFields);
    </script>
</x-guest-layout>
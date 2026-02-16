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
                                    <p class="text-sm">
                                        Con la presente il sottoscritto dichiara di voler donare alla <strong>Fondazione Il Carro di Mirabella ETS</strong> 
                                        per il progetto di rifacimento/restauro degli elementi dell’obelisco di paglia la somma precedentemente 
                                        indicata mediante bonifico su conto corrente bancario intestato a:
                                    </p>
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

                                        {{-- Donor Type Selection --}}
                                        <div class="row mb-3">
                                            <div class="col">
                                                <label class="form-label">Tipo Donatore*</label>
                                                <select id="donorType" name="donor_type" class="form-select" required>
                                                    <option value="">-- Seleziona --</option>
                                                    <option value="physical" {{ old('donor_type') === 'physical' ? 'selected' : '' }}>Persona fisica</option>
                                                    <option value="legal" {{ old('donor_type') === 'legal' ? 'selected' : '' }}>Persona giuridica (Azienda/Impresa)</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label class="form-label">Nome*</label>
                                                <input type="text" name="first_name" id="first_name" class="border-gray-300 rounded-md w-full" value="{{ old('first_name') }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Cognome*</label>
                                                <input type="text" name="last_name" id="last_name" class="border-gray-300 rounded-md w-full" value="{{ old('last_name') }}">
                                            </div>
                                        </div>

                                        {{-- Legal Entity Fields --}}
                                        <div id="legalFields" class="row mb-3 d-none">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Ragione Sociale*</label>
                                                <input type="text" name="company_name" id="company_name" class="border-gray-300 rounded-md w-full" value="{{ old('company_name') }}">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Qualifica del richiedente*</label>
                                                <input type="text" name="legal_role" id="legal_role" class="border-gray-300 rounded-md w-full" value="{{ old('legal_role') }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Partita IVA / Codice Fiscale Aziendale*</label>
                                                <input type="text" name="vat_number" id="vat_number" class="border-gray-300 rounded-md w-full" value="{{ old('vat_number') }}">
                                            </div>
                                        </div>

                                        {{-- Physical Person Fields --}}
                                        <div id="physicalFields">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label class="form-label">Luogo di nascita*</label>
                                                    <input type="text" name="birth_place" class="border-gray-300 rounded-md w-full" value="{{ old('birth_place') }}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Data di nascita*</label>
                                                    <input type="date" name="birth_date" class="border-gray-300 rounded-md w-full" value="{{ old('birth_date') }}">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col">
                                                    <label class="form-label">Codice Fiscale*</label>
                                                    <input type="text" name="tax_code" class="border-gray-300 rounded-md w-full" value="{{ old('tax_code') }}" maxlength="16">
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Common Address & Contact Fields --}}
                                        <div class="row mb-3">
                                            <div class="col-md-8">
                                                <label class="form-label">Indirizzo di Residenza/Sede*</label>
                                                <input type="text" name="address" class="border-gray-300 rounded-md w-full" value="{{ old('address') }}" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Città*</label>
                                                <input type="text" name="city" class="border-gray-300 rounded-md w-full" value="{{ old('city') }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label class="form-label">CAP*</label>
                                                <input type="text" name="postal_code" class="border-gray-300 rounded-md w-full" value="{{ old('postal_code') }}" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Provincia*</label>
                                                <input type="text" name="province" class="border-gray-300 rounded-md w-full" value="{{ old('province') }}" required>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label class="form-label">Email*</label>
                                                <input type="email" name="email" class="border-gray-300 rounded-md w-full" value="{{ old('email') }}" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">PEC</label>
                                                <input type="email" name="pec" class="border-gray-300 rounded-md w-full" value="{{ old('pec') }}">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col-md-6">
                                                <label class="form-label">Importo Donazione (€)*</label>
                                                <input type="number" name="amount" step="0.01" class="border-gray-300 rounded-md w-full" value="{{ old('amount') }}" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Data prevista bonifico</label>
                                                <input type="date" name="donation_date" class="border-gray-300 rounded-md w-full" value="{{ old('donation_date') }}">
                                            </div>
                                        </div>

                                        {{-- Bank Details Card --}}
                                        <div class="card border mb-4">
                                            <div class="card-body bg-light">
                                                <h6 class="font-weight-bold">Coordinate Bancarie per il Bonifico:</h6>
                                                <p class="text-sm mb-1"><strong>Beneficiario:</strong> FONDAZIONE IL CARRO DI MIRABELLA ETS</p>
                                                <p class="text-sm mb-1"><strong>Banca:</strong> BPER BANCA S.P.A. Filiale di Mirabella Eclano (AV)</p>
                                                <p class="text-sm mb-1"><strong>IBAN:</strong> IT32Y0538775770000004230966</p>
                                                <p class="text-sm mb-1"><strong>BIC (codice swift):</strong> BPMOIT22XXX</p>
                                                <p class="text-sm mb-0"><strong>Causale:</strong> [NOME e COGNOME] Donazione liberale anno {{ now()->year }}</p>
                                            </div>
                                        </div>

                                        <p class="text-xs text-secondary mb-3">
                                            La Fondazione rilascerà quietanza necessaria per i trattamenti fiscali (art 83, c 1, D Lgs 117/17). 
                                            Le donazioni liberali effettuate da persone fisiche usufruiscono di detrazione o, in alternativa, deduzione fiscale. 
                                            Le donazioni liberali effettuate da persone giuridiche (aziende, imprese), beneficiano della sola deduzione fiscale.
                                        </p>

                                        {{-- Hidden Fields --}}
                                        <input type="hidden" name="donation_year" value="{{ now()->year }}">
                                        <input type="hidden" name="project" value="Rifacimento/restauro elementi obelisco di paglia">

                                        {{-- Privacy Section --}}
                                        <div class="card border mb-4">
                                            <div class="card-body">
                                                <h6 class="text-sm font-weight-bold">Nota informativa (Ai sensi dell’art.13 del Codice in materia di Protezione dei Dati Personali D.Lgs. 196/2003)</h6>
                                                <p style="font-size: 0.75rem; line-height: 1.4;" class="text-muted mt-2 mb-3">
                                                    La informiamo che i suoi dati personali verranno raccolti e trattati per le seguenti finalità: divulgazione e promozione delle attività e degli eventi organizzati dalla Fondazione Il Carro di Mirabella- ETS ; per esigenze di tipo operativo e gestionale. I dati non saranno oggetto di diffusione e saranno trattati, per le finalità sopra indicate, con pertinenza, correttezza e trasparenza a tutela della Sua riservatezza e dei Suoi diritti, medianti strumenti manuali, informatici e telematici con logiche strettamente correlate alle indicate finalità e, in ogni caso, idonei a garantirne la sicurezza e ad evitare accessi non autorizzati ai dati.
                                                </p>
                                                <div class="form-check">
                                                    <input type="checkbox" name="privacy_accepted" id="privacy" value="1" class="form-check-input" required>
                                                    <label class="form-check-label text-sm" for="privacy">
                                                        Con l’accettazione del presente modulo il richiedente dichiara di avere ricevuto ed accettare l’informativa di cui sopra e conferma il consenso al trattamento dei propri dati personali.*
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary btn-lg w-100">
                                                INVIA DICHIARAZIONE DI DONAZIONE
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

        function toggleFields() {
            const isLegal = donorSelect.value === 'legal';
            
            legalFields.classList.toggle('d-none', !isLegal);
            physicalFields.classList.toggle('d-none', isLegal);

            document.querySelectorAll('#legalFields input').forEach(input => {
                input.required = isLegal;
            });

            document.querySelectorAll('#physicalFields input').forEach(input => {
                if(input.name === 'tax_code' || input.name === 'birth_place' || input.name === 'birth_date') {
                    input.required = !isLegal;
                }
            });
        }

        donorSelect.addEventListener('change', toggleFields);
        window.addEventListener('DOMContentLoaded', toggleFields);
    </script>
</x-guest-layout>
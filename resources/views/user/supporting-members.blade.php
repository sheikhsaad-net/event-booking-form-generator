<x-guest-layout>
    <main class="main-content mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 d-flex flex-column mx-auto">
                            <div class="card card-plain mt-5 pb-5">
                                <div class="card-header pb-0 text-left bg-transparent">
                                    <h3 class="font-weight-black text-dark display-6 mb-2">
                                        Domanda di Ammissione come Socio Sostenitore – Fondazione Il Carro di Mirabella {{ now()->year }}
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

                                    <form method="POST" action="{{ route('members.store') }}">
                                        @csrf

                                        <div class="row mb-3">
                                            <div class="col">
                                                <label>Tipo Adesione*</label>
                                                <select name="membership_type" class="form-select" required>
                                                    <option value="">-- Seleziona --</option>
                                                    <option value="persona_fisica" {{ old('membership_type') == 'persona_fisica' ? 'selected' : '' }}>Persona fisica</option>
                                                    <option value="persona_giuridica" {{ old('membership_type') == 'persona_giuridica' ? 'selected' : '' }}>Persona giuridica privata</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <label>Ragione Sociale</label>
                                                <input type="text" name="company_name" class="form-control" value="{{ old('company_name') }}">
                                            </div>
                                            <div class="col">
                                                <label>Qualifica del richiedente</label>
                                                <input type="text" name="applicant_role" class="form-control" value="{{ old('applicant_role') }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <label>Nome e Cognome*</label>
                                                <input type="text" name="full_name" class="form-control" value="{{ old('full_name') }}" required>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <label>Luogo Nascita*</label>
                                                <input type="text" name="birth_place" class="form-control" value="{{ old('birth_place') }}" required>
                                            </div>
                                            <div class="col">
                                                <label>Data Nascita*</label>
                                                <input type="date" name="birth_date" class="form-control" value="{{ old('birth_date') }}" max="{{ date('Y-m-d') }}" required>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <label>Codice Fiscale*</label>
                                                <input type="text" name="fiscal_code" maxlength="16" class="form-control" value="{{ old('fiscal_code') }}" required>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <label>Documento Tipo</label>
                                                <input type="text" name="id_type" class="form-control" value="{{ old('id_type') }}">
                                            </div>
                                            <div class="col">
                                                <label>Numero Documento</label>
                                                <input type="text" name="id_number" class="form-control" value="{{ old('id_number') }}">
                                            </div>
                                            <div class="col">
                                                <label>Scadenza Documento</label>
                                                <input type="date" name="id_expiry" class="form-control" value="{{ old('id_expiry') }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <label>Residenza*</label>
                                                <input type="text" name="residence" class="form-control" value="{{ old('residence') }}" required>
                                            </div>
                                            <div class="col">
                                                <label>Indirizzo*</label>
                                                <input type="text" name="street" class="form-control" value="{{ old('street') }}" required>
                                            </div>
                                            <div class="col">
                                                <label>Numero Civico</label>
                                                <input type="text" name="street_number" class="form-control" value="{{ old('street_number') }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <label>CAP</label>
                                                <input type="text" name="postal_code" class="form-control" value="{{ old('postal_code') }}">
                                            </div>
                                            <div class="col">
                                                <label>Provincia</label>
                                                <input type="text" name="province" class="form-control" value="{{ old('province') }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <label>Telefono</label>
                                                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                                            </div>
                                            <div class="col">
                                                <label>Cellulare</label>
                                                <input type="text" name="mobile" class="form-control" value="{{ old('mobile') }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <label>Email*</label>
                                                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                                            </div>
                                            <div class="col">
                                                <label>PEC</label>
                                                <input type="email" name="pec" class="form-control" value="{{ old('pec') }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <label>Contributo versato (€)</label>
                                                <input type="number" name="contribution" step="0.01" class="form-control" value="{{ old('contribution') }}">
                                            </div>
                                            <div class="col">
                                                <label>Metodo di pagamento</label>
                                                <input type="text" name="payment_method" class="form-control" value="{{ old('payment_method') }}">
                                            </div>
                                            <div class="col">
                                                <label>IBAN</label>
                                                <input type="text" name="iban" class="form-control" value="{{ old('iban') }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <label>Nota Pagamento</label>
                                                <input type="text" name="payment_note" class="form-control" value="{{ old('payment_note') }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <label>Luogo Firma</label>
                                                <input type="text" name="signing_place" class="form-control" value="{{ old('signing_place') }}">
                                            </div>
                                            <div class="col">
                                                <label>Data Firma</label>
                                                <input type="date" name="signing_date" class="form-control" value="{{ old('signing_date') }}">
                                            </div>
                                        </div>

                                        <div class="form-check mb-3">
                                            <input type="checkbox" name="data_consent" class="form-check-input" id="data_consent" value="1" required>
                                            <label class="form-check-label" for="data_consent">Acconsento al trattamento dei dati personali</label>
                                        </div>

                                        <div class="row">
                                            <div class="col text-end">
                                                <button type="submit" class="btn btn-primary btn-lg w-100">INVIO</button>
                                            </div>
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
</x-guest-layout>
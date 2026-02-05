<x-app-layout>
<main class="main-content position-relative h-100 border-radius-lg">
    <div class="container-fluid py-2 px-5">
        <div class="row">
            <div class="col-12" style="padding:0;">
                <div class="card border shadow-xs mb-4">
                    <div class="card-header pb-0">
                        <h6 class="font-weight-semibold text-lg mb-0">Dettagli Socio Sostenitore</h6>
                    </div>
                    <div class="card-body px-4 py-4">

                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <form action="{{ route('members.update', $member->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            {{-- Persona --}}
                            <h5 class="mt-4">Dati Persona</h5>
                            <div class="row mb-3">
                                <div class="col">
                                    <label>Nome Completo</label>
                                    <input type="text" name="full_name" value="{{ old('full_name', $member->full_name) }}" class="form-control">
                                </div>
                                <div class="col">
                                    <label>Ruolo Richiedente</label>
                                    <input type="text" name="applicant_role" value="{{ old('applicant_role', $member->applicant_role) }}" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <label>Luogo Nascita</label>
                                    <input type="text" name="birth_place" value="{{ old('birth_place', $member->birth_place) }}" class="form-control">
                                </div>
                                <div class="col">
                                    <label>Data Nascita</label>
                                    <input type="date" name="birth_date" value="{{ old('birth_date', $member->birth_date ? \Carbon\Carbon::parse($member->birth_date)->format('Y-m-d') : '') }}" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <label>Residenza</label>
                                    <input type="text" name="residence" value="{{ old('residence', $member->residence) }}" class="form-control">
                                </div>
                                <div class="col">
                                    <label>Indirizzo</label>
                                    <input type="text" name="street" value="{{ old('street', $member->street) }}" class="form-control">
                                </div>
                                <div class="col">
                                    <label>Numero Civico</label>
                                    <input type="text" name="street_number" value="{{ old('street_number', $member->street_number) }}" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <label>CAP</label>
                                    <input type="text" name="postal_code" value="{{ old('postal_code', $member->postal_code) }}" class="form-control">
                                </div>
                                <div class="col">
                                    <label>Provincia</label>
                                    <input type="text" name="province" value="{{ old('province', $member->province) }}" class="form-control">
                                </div>
                                <div class="col">
                                    <label>Codice Fiscale</label>
                                    <input type="text" name="fiscal_code" maxlength="16" value="{{ old('fiscal_code', $member->fiscal_code) }}" class="form-control">
                                </div>
                            </div>

                            {{-- Documento --}}
                            <h5 class="mt-4">Documento</h5>
                            <div class="row mb-3">
                                <div class="col">
                                    <label>Tipo Documento</label>
                                    <input type="text" name="id_type" value="{{ old('id_type', $member->id_type) }}" class="form-control">
                                </div>
                                <div class="col">
                                    <label>Numero Documento</label>
                                    <input type="text" name="id_number" value="{{ old('id_number', $member->id_number) }}" class="form-control">
                                </div>
                                <div class="col">
                                    <label>Data Scadenza</label>
                                    <input type="date" name="id_expiry" value="{{ old('id_expiry', $member->id_expiry ? \Carbon\Carbon::parse($member->id_expiry)->format('Y-m-d') : '') }}" class="form-control">
                                </div>
                            </div>

                            {{-- Contatti --}}
                            <h5 class="mt-4">Contatti</h5>
                            <div class="row mb-3">
                                <div class="col">
                                    <label>Telefono</label>
                                    <input type="text" name="phone" value="{{ old('phone', $member->phone) }}" class="form-control">
                                </div>
                                <div class="col">
                                    <label>Cellulare</label>
                                    <input type="text" name="mobile" value="{{ old('mobile', $member->mobile) }}" class="form-control">
                                </div>
                                <div class="col">
                                    <label>Email</label>
                                    <input type="email" name="email" value="{{ old('email', $member->email) }}" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <label>PEC</label>
                                    <input type="email" name="pec" value="{{ old('pec', $member->pec) }}" class="form-control">
                                </div>
                            </div>

                            {{-- Pagamento --}}
                            <h5 class="mt-4">Pagamento</h5>
                            <div class="row mb-3">
                                <div class="col">
                                    <label>Contributo</label>
                                    <input type="text" name="contribution" value="{{ old('contribution', $member->contribution) }}" class="form-control">
                                </div>
                                <div class="col">
                                    <label>Metodo Pagamento</label>
                                    <input type="text" name="payment_method" value="{{ old('payment_method', $member->payment_method) }}" class="form-control">
                                </div>
                                <div class="col">
                                    <label>IBAN</label>
                                    <input type="text" name="iban" value="{{ old('iban', $member->iban) }}" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <label>Nota Pagamento</label>
                                    <input type="text" name="payment_note" value="{{ old('payment_note', $member->payment_note) }}" class="form-control">
                                </div>
                                <div class="col">
                                    <label>Luogo Firma</label>
                                    <input type="text" name="signing_place" value="{{ old('signing_place', $member->signing_place) }}" class="form-control">
                                </div>
                                <div class="col">
                                    <label>Data Firma</label>
                                    <input type="date" name="signing_date" value="{{ old('signing_date', $member->signing_date ? \Carbon\Carbon::parse($member->signing_date)->format('Y-m-d') : '') }}" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col">
                                    <label>Tipo Socio</label>
                                    <select name="membership_type" class="form-select">
                                        <option value="persona_fisica" {{ $member->membership_type == 'persona_fisica' ? 'selected' : '' }}>Individuale</option>
                                        <option value="azienda" {{ $member->membership_type == 'azienda' ? 'selected' : '' }}>Aziendale</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label>Consenso Dati</label>
                                    <input type="checkbox" name="data_consent" value="1" {{ $member->data_consent ? 'checked' : '' }}>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <a href="{{ route('members.delete', $member->id) }}" 
                                        class="btn btn-danger"
                                        onclick="return confirm('Sei sicuro di voler eliminare questo socio?');">
                                        Elimina
                                    </a>
                                </div>
                                <div class="col text-end">
                                    <button type="submit" class="btn btn-success">Aggiorna</button>
                                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Indietro</a>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</x-app-layout>
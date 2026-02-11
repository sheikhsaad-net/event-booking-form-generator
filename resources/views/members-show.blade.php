<x-app-layout>
<main class="main-content position-relative h-100 border-radius-lg">
    <div class="container-fluid py-4 px-3 px-md-5">
        <div class="row">
            <div class="col-12">
                <div class="card border shadow-xs mb-4">
                    <div class="card-header border-bottom pb-3">
                        <div class="d-sm-flex align-items-center">
                            <div>
                                <h6 class="font-weight-semibold text-lg mb-0">Dettagli Socio Sostenitore</h6>
                                <p class="text-sm mb-sm-0 mb-2">Modifica le informazioni del profilo socio.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-4 py-4">

                        @if(session('success'))
                            <div class="alert alert-success text-white border-0 shadow-sm mb-4" role="alert">
                                <span class="text-sm">{{ session('success') }}</span>
                            </div>
                        @endif

                        <form action="{{ route('members.update', $member->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            {{-- Persona Section --}}
                            <div class="d-flex align-items-center mt-2 mb-3">
                                <h6 class="text-uppercase text-muted text-xs font-weight-bolder opacity-7 mb-0">Dati Persona</h6>
                            </div>
                            
                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label class="form-label">Nome Completo</label>
                                    <input type="text" name="full_name" value="{{ old('full_name', $member->full_name) }}" class="form-control border-gray-300 rounded-md">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Ruolo Richiedente</label>
                                    <input type="text" name="applicant_role" value="{{ old('applicant_role', $member->applicant_role) }}" class="form-control border-gray-300 rounded-md">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Luogo Nascita</label>
                                    <input type="text" name="birth_place" value="{{ old('birth_place', $member->birth_place) }}" class="form-control border-gray-300 rounded-md">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Data Nascita</label>
                                    <input type="date" name="birth_date" value="{{ old('birth_date', $member->birth_date ? \Carbon\Carbon::parse($member->birth_date)->format('Y-m-d') : '') }}" class="form-control border-gray-300 rounded-md">
                                </div>
                            </div>

                            {{-- Residenza Section --}}
                            <div class="row g-3 mb-4">
                                <div class="col-md-4">
                                    <label class="form-label">Residenza (Città)</label>
                                    <input type="text" name="residence" value="{{ old('residence', $member->residence) }}" class="form-control border-gray-300 rounded-md">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Indirizzo</label>
                                    <input type="text" name="street" value="{{ old('street', $member->street) }}" class="form-control border-gray-300 rounded-md">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Civico</label>
                                    <input type="text" name="street_number" value="{{ old('street_number', $member->street_number) }}" class="form-control border-gray-300 rounded-md">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">CAP</label>
                                    <input type="text" name="postal_code" value="{{ old('postal_code', $member->postal_code) }}" class="form-control border-gray-300 rounded-md">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Provincia</label>
                                    <input type="text" name="province" value="{{ old('province', $member->province) }}" class="form-control border-gray-300 rounded-md">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Codice Fiscale</label>
                                    <input type="text" name="fiscal_code" maxlength="16" value="{{ old('fiscal_code', $member->fiscal_code) }}" class="form-control border-gray-300 rounded-md text-uppercase">
                                </div>
                            </div>

                            {{-- Documento Section --}}
                            <hr class="horizontal dark my-4">
                            <div class="d-flex align-items-center mb-3">
                                <h6 class="text-uppercase text-muted text-xs font-weight-bolder opacity-7 mb-0">Documento d'Identità</h6>
                            </div>
                            
                            <div class="row g-3 mb-4">
                                <div class="col-md-4">
                                    <label class="form-label">Tipo Documento</label>
                                    <input type="text" name="id_type" value="{{ old('id_type', $member->id_type) }}" class="form-control border-gray-300 rounded-md">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Numero Documento</label>
                                    <input type="text" name="id_number" value="{{ old('id_number', $member->id_number) }}" class="form-control border-gray-300 rounded-md">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Data Scadenza</label>
                                    <input type="date" name="id_expiry" value="{{ old('id_expiry', $member->id_expiry ? \Carbon\Carbon::parse($member->id_expiry)->format('Y-m-d') : '') }}" class="form-control border-gray-300 rounded-md">
                                </div>
                            </div>

                            {{-- Contatti Section --}}
                            <hr class="horizontal dark my-4">
                            <div class="d-flex align-items-center mb-3">
                                <h6 class="text-uppercase text-muted text-xs font-weight-bolder opacity-7 mb-0">Contatti & PEC</h6>
                            </div>
                            
                            <div class="row g-3 mb-4">
                                <div class="col-md-4">
                                    <label class="form-label">Telefono</label>
                                    <input type="text" name="phone" value="{{ old('phone', $member->phone) }}" class="form-control border-gray-300 rounded-md">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Cellulare</label>
                                    <input type="text" name="mobile" value="{{ old('mobile', $member->mobile) }}" class="form-control border-gray-300 rounded-md">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" value="{{ old('email', $member->email) }}" class="form-control border-gray-300 rounded-md">
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">PEC (Posta Elettronica Certificata)</label>
                                    <input type="email" name="pec" value="{{ old('pec', $member->pec) }}" class="form-control border-gray-300 rounded-md">
                                </div>
                            </div>

                            {{-- Pagamento Section --}}
                            <hr class="horizontal dark my-4">
                            <div class="d-flex align-items-center mb-3">
                                <h6 class="text-uppercase text-muted text-xs font-weight-bolder opacity-7 mb-0">Pagamento & Membership</h6>
                            </div>
                            
                            <div class="row g-3 mb-4">
                                <div class="col-md-4">
                                    <label class="form-label">Contributo (€)</label>
                                    <input type="text" name="contribution" value="{{ old('contribution', $member->contribution) }}" class="form-control border-gray-300 rounded-md" placeholder="0.00">
                                </div>
                                <div class="col-md-8">
                                    <label class="form-label">Nota Pagamento</label>
                                    <input type="text" name="payment_note" value="{{ old('payment_note', $member->payment_note) }}" class="form-control border-gray-300 rounded-md">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Tipo Socio</label>
                                    <select name="membership_type" class="form-select">
                                        <option value="persona_fisica" {{ $member->membership_type == 'persona_fisica' ? 'selected' : '' }}>Individuale</option>
                                        <option value="azienda" {{ $member->membership_type == 'azienda' ? 'selected' : '' }}>Aziendale</option>
                                    </select>
                                </div>
                                <div class="col-md-6 d-flex align-items-end">
                                    <div class="form-check form-switch mb-2">
                                        <input class="form-check-input" type="checkbox" name="data_consent" id="data_consent" value="1" {{ $member->data_consent ? 'checked' : '' }}>
                                        <label class="form-check-label font-weight-bold ms-2" for="data_consent">Consenso Trattamento Dati</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-5 border-top pt-4">
                                <div class="col-6">
                                    <a href="{{ route('members.delete', $member->id) }}" 
                                        class="btn btn-outline-danger"
                                        onclick="return confirm('Sei sicuro di voler eliminare questo socio?');">
                                        <i class="fas fa-trash me-1"></i> Elimina Socio
                                    </a>
                                </div>
                                <div class="col-6 text-end">
                                    <a href="{{ url()->previous() }}" class="btn btn-white me-2">Annulla</a>
                                    <button type="submit" class="btn btn-dark shadow-sm px-4">Salva Modifiche</button>
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
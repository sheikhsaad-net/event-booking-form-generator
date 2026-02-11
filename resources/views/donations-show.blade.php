<x-app-layout>
<main class="main-content position-relative h-100 border-radius-lg">
    <div class="container-fluid py-4 px-3 px-md-5">
        <div class="row">
            <div class="col-12">
                <div class="card border shadow-xs mb-4">
                    <div class="card-header border-bottom pb-3">
                        <div class="d-sm-flex align-items-center">
                            <div>
                                <h6 class="font-weight-semibold text-lg mb-0">Dettagli Donazione</h6>
                                <p class="text-sm mb-sm-0 mb-2">Modifica le informazioni relative alla donazione.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-4 py-4">

                        @if(session('success'))
                            <div class="alert alert-success text-white border-0 shadow-sm mb-4" role="alert">
                                <span class="text-sm">{{ session('success') }}</span>
                            </div>
                        @endif

                        <form action="{{ route('donations.update', $donation->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            {{-- Donatore Section --}}
                            <div class="d-flex align-items-center mt-2 mb-3">
                                <h6 class="text-uppercase text-muted text-xs font-weight-bolder opacity-7 mb-0">Dati Donatore</h6>
                            </div>
                            
                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label class="form-label">Tipo Donatore</label>
                                    <select name="donor_type" class="form-select">
                                        <option value="physical" {{ $donation->donor_type == 'physical' ? 'selected' : '' }}>Persona fisica</option>
                                        <option value="legal" {{ $donation->donor_type == 'legal' ? 'selected' : '' }}>Persona giuridica</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Nome</label>
                                    <input type="text" name="first_name" value="{{ old('first_name', $donation->first_name) }}" class="form-control border-gray-300 rounded-md">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Cognome</label>
                                    <input type="text" name="last_name" value="{{ old('last_name', $donation->last_name) }}" class="form-control border-gray-300 rounded-md">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Codice Fiscale</label>
                                    <input type="text" name="tax_code" value="{{ old('tax_code', $donation->tax_code) }}" class="form-control border-gray-300 rounded-md text-uppercase">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Luogo Nascita</label>
                                    <input type="text" name="birth_place" value="{{ old('birth_place', $donation->birth_place) }}" class="form-control border-gray-300 rounded-md">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Data Nascita</label>
                                    <input type="date" name="birth_date" value="{{ old('birth_date', $donation->birth_date ? \Carbon\Carbon::parse($donation->birth_date)->format('Y-m-d') : '') }}" class="form-control border-gray-300 rounded-md">
                                </div>

                                {{-- Azienda Section --}}
                                <div class="col-md-6">
                                    <label class="form-label">Ragione Sociale</label>
                                    <input type="text" name="company_name" value="{{ old('company_name', $donation->company_name) }}" class="form-control border-gray-300 rounded-md">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Qualifica</label>
                                    <input type="text" name="legal_role" value="{{ old('legal_role', $donation->legal_role) }}" class="form-control border-gray-300 rounded-md">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Partita IVA / Codice Fiscale</label>
                                    <input type="text" name="vat_number" value="{{ old('vat_number', $donation->vat_number) }}" class="form-control border-gray-300 rounded-md">
                                </div>
                            </div>

                            {{-- Contatti Section --}}
                            <hr class="horizontal dark my-4">
                            <div class="d-flex align-items-center mb-3">
                                <h6 class="text-uppercase text-muted text-xs font-weight-bolder opacity-7 mb-0">Contatti & Indirizzo</h6>
                            </div>
                            
                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label class="form-label">Indirizzo</label>
                                    <input type="text" name="address" value="{{ old('address', $donation->address) }}" class="form-control border-gray-300 rounded-md">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Città</label>
                                    <input type="text" name="city" value="{{ old('city', $donation->city) }}" class="form-control border-gray-300 rounded-md">
                                </div>
                                <div class="col-md-1">
                                    <label class="form-label">Provincia</label>
                                    <input type="text" name="province" value="{{ old('province', $donation->province) }}" class="form-control border-gray-300 rounded-md">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">CAP</label>
                                    <input type="text" name="postal_code" value="{{ old('postal_code', $donation->postal_code) }}" class="form-control border-gray-300 rounded-md">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Telefono</label>
                                    <input type="text" name="phone" value="{{ old('phone', $donation->phone) }}" class="form-control border-gray-300 rounded-md">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Cellulare</label>
                                    <input type="text" name="mobile" value="{{ old('mobile', $donation->mobile) }}" class="form-control border-gray-300 rounded-md">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" value="{{ old('email', $donation->email) }}" class="form-control border-gray-300 rounded-md">
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">PEC</label>
                                    <input type="email" name="pec" value="{{ old('pec', $donation->pec) }}" class="form-control border-gray-300 rounded-md">
                                </div>
                            </div>

                            {{-- Donazione Section --}}
                            <hr class="horizontal dark my-4">
                            <div class="d-flex align-items-center mb-3">
                                <h6 class="text-uppercase text-muted text-xs font-weight-bolder opacity-7 mb-0">Dettagli Donazione</h6>
                            </div>

                            <div class="row g-3 mb-4">
                                <div class="col-md-4">
                                    <label class="form-label">Importo (€)</label>
                                    <input type="number" name="amount" step="0.01" value="{{ old('amount', $donation->amount) }}" class="form-control border-gray-300 rounded-md">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Data Donazione</label>
                                    <input type="date" name="donation_date" value="{{ old('donation_date', $donation->donation_date ? \Carbon\Carbon::parse($donation->donation_date)->format('Y-m-d') : '') }}" class="form-control border-gray-300 rounded-md">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Progetto</label>
                                    <input type="text" name="project" value="{{ old('project', $donation->project) }}" class="form-control border-gray-300 rounded-md">
                                </div>
                                <div class="col-md-6 d-flex align-items-end">
                                    <div class="form-check form-switch mb-2">
                                        <input class="form-check-input" type="checkbox" name="privacy_accepted" id="privacy_accepted" value="1" {{ $donation->privacy_accepted ? 'checked' : '' }}>
                                        <label class="form-check-label font-weight-bold ms-2" for="privacy_accepted">Privacy Accettata</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-5 border-top pt-4">
                                <div class="col-6">
                                    <a href="{{ route('donations.destroy', $donation->id) }}" 
                                        class="btn btn-outline-danger"
                                        onclick="return confirm('Sei sicuro di voler eliminare questa donazione?');">
                                        <i class="fas fa-trash me-1"></i> Elimina Donazione
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
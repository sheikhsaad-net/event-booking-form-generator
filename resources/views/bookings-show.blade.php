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

                        <form action="{{ route('members.update', $booking->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            {{-- Persona --}}
                            <h5 class="mt-4">Dati Persona</h5>
                            <div class="row mb-3">
                                <div class="col">
                                    <label>Cognome</label>
                                    <input type="text" name="cognome" value="{{ $booking->cognome }}" class="form-control border-gray-300 rounded-md">
                                </div>
                                <div class="col">
                                    <label>Nome</label>
                                    <input type="text" name="nome" value="{{ $booking->nome }}" class="form-control border-gray-300 rounded-md">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <label>Luogo Nascita</label>
                                    <input type="text" name="luogo_nascita" value="{{ $booking->luogo_nascita }}" class="form-control border-gray-300 rounded-md">
                                </div>
                                <div class="col">
                                    <label>Data Nascita</label>
                                    <input type="date" name="data_nascita" value="{{ $booking->data_nascita }}" class="form-control border-gray-300 rounded-md">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <label>Luogo Residenza</label>
                                    <input type="text" name="luogo_residenza" value="{{ $booking->luogo_residenza }}" class="form-control border-gray-300 rounded-md">
                                </div>
                                <div class="col">
                                    <label>Indirizzo</label>
                                    <input type="text" name="indirizzo" value="{{ $booking->indirizzo }}" class="form-control border-gray-300 rounded-md">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <label>Codice Fiscale</label>
                                    <input type="text" name="cod_fis" maxlength="16" value="{{ $booking->cod_fis }}" class="form-control border-gray-300 rounded-md">
                                </div>
                            </div>

                            {{-- Documento --}}
                            <h5 class="mt-4">Documento</h5>
                            <div class="row mb-3">
                                <div class="col">
                                    <label>Tipo Documento</label>
                                    <select name="doc_tipo" class="form-select">
                                        <option value="C.I." {{ $booking->doc_tipo == 'C.I.' ? 'selected' : '' }}>C.I.</option>
                                        <option value="PATENTE" {{ $booking->doc_tipo == 'PATENTE' ? 'selected' : '' }}>PATENTE</option>
                                        <option value="PASSAPORTO" {{ $booking->doc_tipo == 'PASSAPORTO' ? 'selected' : '' }}>PASSAPORTO</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label>Numero Documento</label>
                                    <input type="text" name="doc_num" value="{{ $booking->doc_num }}" class="form-control border-gray-300 rounded-md">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <label>Luogo Rilascio</label>
                                    <input type="text" name="doc_luogo_rilascio" value="{{ $booking->doc_luogo_rilascio }}" class="form-control border-gray-300 rounded-md">
                                </div>
                                <div class="col">
                                    <label>Data Rilascio</label>
                                    <input type="date" name="doc_data_rilascio" value="{{ $booking->doc_data_rilascio }}" class="form-control border-gray-300 rounded-md">
                                </div>
                            </div>

                            {{-- Contatti --}}
                            <h5 class="mt-4">Contatti</h5>
                            <div class="row mb-3">
                                <div class="col">
                                    <label>Telefono</label>
                                    <input type="text" name="tel" value="{{ $booking->tel }}" class="form-control border-gray-300 rounded-md">
                                </div>
                                <div class="col">
                                    <label>Email</label>
                                    <input type="email" name="e_mail" value="{{ $booking->e_mail }}" class="form-control border-gray-300 rounded-md">
                                </div>
                            </div>

                            {{-- Tipo Socio --}}
                            <div class="row mb-5">
                                <div class="col">
                                    <label>Tipo Socio</label>
                                    <select name="membership_type" class="form-select">
                                        <option value="Individuale" {{ $booking->membership_type == 'Individuale' ? 'selected' : '' }}>Individuale</option>
                                        <option value="Aziendale" {{ $booking->membership_type == 'Aziendale' ? 'selected' : '' }}>Aziendale</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <a href="{{ route('members.delete', $booking->id) }}" 
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
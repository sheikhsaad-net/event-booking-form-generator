<x-app-layout>
  <main class="main-content position-relative h-100 border-radius-lg">
    <div class="container-fluid py-2 px-5">
      <div class="row">
        <div class="col-12" style="padding:0;">
          <div class="card border shadow-xs mb-4">
            <div class="card-header pb-0">
              <h6 class="font-weight-semibold text-lg mb-0">Dettagli Prenotazione</h6>
            </div>
            <div class="card-body px-4 py-4">

              @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
              @endif

              <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Se minore --}}
                @if($booking->minor == 1)
                  <h5 class="mt-4">Dati Minore</h5>
                  <div class="row mb-3">
                    <div class="col">
                      <label>Cognome Minore</label>
                      <input type="text" name="minore_cognome" value="{{ $booking->minore_cognome }}" class="form-control">
                    </div>
                    <div class="col">
                      <label>Nome Minore</label>
                      <input type="text" name="minore_nome" value="{{ $booking->minore_nome }}" class="form-control">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <div class="col">
                      <label>Luogo Nascita Minore</label>
                      <input type="text" name="minore_luogo_nascita" value="{{ $booking->minore_luogo_nascita }}" class="form-control">
                    </div>
                    <div class="col">
                      <label>Data Nascita Minore</label>
                      <input type="date" name="minore_data_nascita" value="{{ $booking->minore_data_nascita }}" class="form-control">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <div class="col">
                      <label>Luogo Residenza Minore</label>
                      <input type="text" name="minore_luogo_residenza" value="{{ $booking->minore_luogo_residenza }}" class="form-control">
                    </div>
                    <div class="col">
                      <label>Indirizzo Minore</label>
                      <input type="text" name="minore_indirizzo" value="{{ $booking->minore_indirizzo }}" class="form-control">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <div class="col">
                      <label>Codice Fiscale Minore</label>
                      <input type="text" name="minore_cod_fis" maxlength="16" value="{{ $booking->minore_cod_fis }}" class="form-control">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <div class="col">
                      <label>Dati del genitore o Tutore legale</label>
                      <select name="guardian" class="form-select">
                        <option value="genitore" {{ $booking->guardian == 'genitore' ? 'selected' : '' }}>Genitore</option>
                        <option value="tutore" {{ $booking->guardian == 'tutore' ? 'selected' : '' }}>Tutore Legale</option>
                      </select>
                    </div>
                  </div>
                @endif

                {{-- Persona --}}
                <h5 class="mt-4">Dati Persona</h5>
                <div class="row mb-3">
                  <div class="col">
                    <label>Cognome</label>
                    <input type="text" name="cognome" value="{{ $booking->cognome }}" class="form-control">
                  </div>
                  <div class="col">
                    <label>Nome</label>
                    <input type="text" name="nome" value="{{ $booking->nome }}" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col">
                    <label>Luogo Nascita</label>
                    <input type="text" name="luogo_nascita" value="{{ $booking->luogo_nascita }}" class="form-control">
                  </div>
                  <div class="col">
                    <label>Data Nascita</label>
                    <input type="date" name="data_nascita" value="{{ $booking->data_nascita }}" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col">
                    <label>Luogo Residenza</label>
                    <input type="text" name="luogo_residenza" value="{{ $booking->luogo_residenza }}" class="form-control">
                  </div>
                  <div class="col">
                    <label>Indirizzo</label>
                    <input type="text" name="indirizzo" value="{{ $booking->indirizzo }}" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col">
                    <label>Codice Fiscale</label>
                    <input type="text" name="cod_fis" maxlength="16" value="{{ $booking->cod_fis }}" class="form-control">
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
                    <input type="text" name="doc_num" value="{{ $booking->doc_num }}" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col">
                    <label>Luogo Rilascio</label>
                    <input type="text" name="doc_luogo_rilascio" value="{{ $booking->doc_luogo_rilascio }}" class="form-control">
                  </div>
                  <div class="col">
                    <label>Data Rilascio</label>
                    <input type="date" name="doc_data_rilascio" value="{{ $booking->doc_data_rilascio }}" class="form-control">
                  </div>
                </div>

                {{-- Contatti --}}
                <h5 class="mt-4">Contatti</h5>
                <div class="row mb-3">
                  <div class="col">
                    <label>Telefono</label>
                    <input type="text" name="tel" value="{{ $booking->tel }}" class="form-control">
                  </div>
                  <div class="col">
                    <label>Email</label>
                    <input type="email" name="e_mail" value="{{ $booking->e_mail }}" class="form-control">
                  </div>
                </div>

                <div class="row mb-5">
                  <div class="col">
                    <label>Posizione</label>
                    <select name="posizione" class="form-select">
                      <option value="AVANTI" {{ $booking->posizione == 'AVANTI' ? 'selected' : '' }}>Avanti</option>
                      <option value="DIETRO" {{ $booking->posizione == 'DIETRO' ? 'selected' : '' }}>Dietro</option>
                      <option value="SINISTRA" {{ $booking->posizione == 'SINISTRA' ? 'selected' : '' }}>Sinistra</option>
                      <option value="DESTRA" {{ $booking->posizione == 'DESTRA' ? 'selected' : '' }}>Destra</option>
                      @if($booking->minor == 1)
                        <option value="FUNE DEDICATA AI BAMBINI" {{ $booking->posizione == 'FUNE DEDICATA AI BAMBINI' ? 'selected' : '' }}>Fune dedicata ai bambini</option>
                      @endif
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <a href="{{ route('bookings.delete', $booking->id) }}" 
                      class="btn btn-danger"
                      onclick="return confirm('Sei sicuro di voler eliminare questa prenotazione?');">
                      Elimina
                    </a>
                  </div>
                  <div class="col">
                    <div class="col text-end">
                      <button type="submit" class="btn btn-success">Aggiorna</button>
                      <a href="{{ url()->previous() }}" class="btn btn-secondary">Indietro</a>
                    </div>
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

<x-app-layout>
<main class="main-content position-relative h-100 border-radius-lg ">
    <div class="container-fluid py-2 px-5">
      <div class="row">
        <div class="col-12" style="padding: 0;">
          <div class="card border shadow-xs mb-4">
            <div class="card-header border-bottom pb-0">
              <div class="d-sm-flex align-items-center">
                <div>
                  <h6 class="font-weight-semibold text-lg mb-0">Gestione Prenotazioni</h6>
                  <p class="text-sm"></br></p>
                </div>
                <div class="ms-auto d-flex">
                  <div class="ms-auto d-flex">
                    <a href="{{ route('bookings.export_csv', request()->all()) }}" class="btn btn-sm btn-success">
                      Esporta CSV
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body px-0 py-0">
              <div class="border-bottom py-3 px-1 align-items-center">
            
                  <!-- Filtro Ricerca -->
                  <form method="GET" action="{{ route('bookings.index') }}" class=" py-3 px-3 d-flex align-items-center">
                      
                      <!-- Search Box -->
                      <div class="input-group w-sm-70 me-3">
                          <span class="input-group-text text-body" style="border: solid 1px; background: #f1f1f1;">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"></path>
                              </svg>
                          </span>
                          <input type="text" name="search" class="form-control" placeholder="Cerca per nome o codice" value="{{ request('search') }}">
                      </div>

                      <!-- Alphabet Filter -->
                      <div class="me-3 w-sm-20">
                          <select name="letter" class="form-select">
                              <option value="" {{ request('letter') == '' ? 'selected' : '' }}>Tutte</option>
                              @foreach(range('A', 'Z') as $char)
                                  <option value="{{ $char }}" {{ request('letter') == $char ? 'selected' : '' }}>
                                      {{ $char }}
                                  </option>
                              @endforeach
                          </select>
                      </div>

                      <!-- Select Box -->
                      <div class="me-3 w-sm-20" >
                          <select name="type" class="form-select">
                              <option value="" {{ request('type') == '' ? 'selected' : '' }}>Tutti</option>
                              <option value="0" {{ request('type') == '0' ? 'selected' : '' }}>Adulti</option>
                              <option value="1" {{ request('type') == '1' ? 'selected' : '' }}>Minori</option>
                          </select>
                      </div>

                      <div class="me-3 w-sm-20">
                          <input type="date" name="date" class="form-control" max="{{ date('Y-m-d') }}" value="{{ request('date') }}">
                      </div>

                      <!-- Submit -->
                      <button type="submit" class="btn btn-dark w-sm-10" style="margin-bottom: 0;">Filtra</button>
                  </form>
              </div>
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead class="bg-gray-100">
                      <tr>
                        <th class="text-secondary text-xs font-weight-semibold opacity-7">ID Prenotazione</th>
                        <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Nome e Cognome</th>
                        <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Data di nascita</th>
                        <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Codice Fiscale</th>
                        <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Telefono</th>
                        <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Email</th>
                        <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Data di prenotazione</th>
                        <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Azioni</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($bookings as $booking)
                      <tr>
                        <td>
                          <p class="text-sm text-secondary mb-0  px-3 py-1">{{ $booking->booking_id ?? 'N/A' }}</p>
                        </td>
                        <td>
                          <p class="text-sm text-secondary mb-0">{{ ($booking->cognome ?? '') . ' ' . ($booking->nome ?? '') ?: 'N/A' }}</p>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-sm font-weight-normal">
                              {{ $booking->data_nascita ? \Carbon\Carbon::parse($booking->data_nascita)->format('d/m/Y') : 'N/A' }}
                          </span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-sm font-weight-normal">{{ $booking->cod_fis ?? 'N/A' }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-sm font-weight-normal">{{ $booking->tel ?? 'N/A' }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-sm font-weight-normal">{{ $booking->e_mail ?? 'N/A' }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-sm font-weight-normal">{{ $booking->created_at ? $booking->created_at->format('d/m/Y') : 'N/A' }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <a href="{{ route('bookings.show', $booking->id) }}" 
                            class="btn btn-sm btn-primary mt-3">
                            Visualizza
                          </a>
                          @if ($booking->minor == '1')
                          <a href="{{ route('bookings.mdownload', $booking->id) }}" 
                            class="btn btn-sm btn-success mt-3">
                            Download
                          </a>
                          @else
                          <a href="{{ route('bookings.download', $booking->id) }}" 
                            class="btn btn-sm btn-success mt-3">
                            Download
                          </a>
                          @endif
                    </td>

                      </tr>
                      @endforeach
                    </tbody>
                    </table>

                    <form method="GET" action="{{ route('bookings.downloadAll') }}" class="d-flex align-items-center p-4">
                      @csrf
                      <input 
                          type="date" 
                          name="date" 
                          class="form-control me-2" 
                          value="{{ request('date') }}" 
                          max="{{ date('Y-m-d') }}" 
                          style="width: 43%;" 
                          required
                      >

                      <!-- Alphabet Filter -->
                      <div class="me-2" style="width: 16%;">
                          <select name="letter" class="form-select">
                              <option value="" {{ request('letter') == '' ? 'selected' : '' }}>Tutte</option>
                              @foreach(range('A', 'Z') as $char)
                                  <option value="{{ $char }}" {{ request('letter') == $char ? 'selected' : '' }}>
                                      {{ $char }}
                                  </option>
                              @endforeach
                          </select>
                      </div>

                        <select name="minor" class="form-control me-2" style="width: 26%;">
                            <option value="">-- Seleziona Tipo --</option>
                            <option value="0" {{ request('type') == '0' ? 'selected' : '' }}>Maggiorenne</option>
                            <option value="1" {{ request('type') == '1' ? 'selected' : '' }}>Minorenne</option>
                        </select>

                        <button type="submit" class="btn btn-success" style="margin: 0;">Download All PDFs</button>
                    </form>
                    @if ($errors->any())
                      <div class="alert alert-danger">
                        <ul class="mb-0">
                          @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                          @endforeach
                        </ul>
                      </div>
                    @endif
              </div>
              <div class="border-top py-3 px-3 d-flex align-items-center">
                  <p class="font-weight-semibold mb-0 text-dark text-sm">
                      Pagina {{ $bookings->currentPage() }} of {{ $bookings->lastPage() }}
                  </p>
                  <div class="ms-auto">
                      <a href="{{ $bookings->previousPageUrl() }}" class="btn btn-sm btn-white mb-0 {{ $bookings->onFirstPage() ? 'disabled' : '' }}">
                          Precedente
                      </a>
                      <a href="{{ $bookings->nextPageUrl() }}" class="btn btn-sm btn-white mb-0 {{ !$bookings->hasMorePages() ? 'disabled' : '' }}">
                          Successiva
                      </a>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</x-app-layout>
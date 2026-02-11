<x-app-layout>
<main class="main-content position-relative h-100 border-radius-lg ">
    <div class="container-fluid py-2 px-5">
        <div class="row">
            <div class="col-12" style="padding: 0;">
                <div class="card border shadow-xs mb-4">
                    <div class="card-header border-bottom pb-0">
                        <div class="d-sm-flex align-items-center">
                            <div>
                                <h6 class="font-weight-semibold text-lg mb-0">Gestione Donazioni</h6>
                                <p class="text-sm"></br></p>
                            </div>
                            <div class="ms-auto d-flex">
                                <a href="#" class="btn btn-sm btn-success">
                                    Esporta CSV
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body px-0 py-0">
                        <div class="border-bottom py-3 px-1 align-items-center">
                            <!-- Filtro Ricerca -->
                            <form method="GET" action="{{ route('donations.index') }}" class="py-3 px-3 d-flex align-items-center">

                                <!-- Search Box -->
                                <div class="input-group w-sm-70 me-3">
                                    <span class="input-group-text text-body" style="border: solid 1px; background: #f1f1f1;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"></path>
                                        </svg>
                                    </span>
                                    <input type="text" name="search" class="form-control border-gray-300 rounded-md" placeholder="Cerca per nome, codice fiscale o email" value="{{ request('search') }}">
                                </div>

                                <!-- Donor Type Filter -->
                                <div class="me-3 w-sm-20">
                                    <select name="donor_type" class="form-select">
                                        <option value="" {{ request('donor_type') == '' ? 'selected' : '' }}>Tutti i tipi</option>
                                        <option value="physical" {{ request('donor_type') == 'physical' ? 'selected' : '' }}>Persona fisica</option>
                                        <option value="legal" {{ request('donor_type') == 'legal' ? 'selected' : '' }}>Persona giuridica</option>
                                    </select>
                                </div>

                                <!-- Date Filter -->
                                <div class="me-3 w-sm-20">
                                    <input type="date" name="donation_date" class="form-control border-gray-300 rounded-md" max="{{ date('Y-m-d') }}" value="{{ request('donation_date') }}">
                                </div>

                                <!-- Submit -->
                                <button type="submit" class="btn btn-dark w-sm-10" style="margin-bottom: 0;">Filtra</button>
                            </form>
                        </div>

                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="text-secondary text-xs font-weight-semibold opacity-7">ID</th>
                                        <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Nome e Cognome / Azienda</th>
                                        <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Tipo Donatore</th>
                                        <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Data Donazione</th>
                                        <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Importo (€)</th>
                                        <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Email</th>
                                        <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Telefono</th>
                                        <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Registrazione</th>
                                        <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Azioni</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($donations as $donation)
                                        <tr>
                                            <td>
                                                <p class="text-sm text-secondary mb-0 px-3 py-1">{{ $donation->id }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm text-secondary mb-0">
                                                    {{ $donation->donor_type == 'legal' ? $donation->company_name : ($donation->first_name . ' ' . $donation->last_name) }}
                                                </p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-sm font-weight-normal">{{ $donation->donor_type }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-sm font-weight-normal">
                                                    {{ $donation->donation_date ? \Carbon\Carbon::parse($donation->donation_date)->format('d/m/Y') : 'N/A' }}
                                                </span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-sm font-weight-normal">{{ number_format($donation->amount, 2, ',', '.') }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-sm font-weight-normal">{{ $donation->email ?? 'N/A' }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-sm font-weight-normal">{{ $donation->phone ?? $donation->mobile ?? 'N/A' }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-sm font-weight-normal">
                                                    {{ $donation->created_at ? $donation->created_at->format('d/m/Y') : 'N/A' }}
                                                </span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <a href="{{ route('donations.show', $donation->id) }}" class="btn btn-sm btn-primary mt-3">Visualizza</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="border-top py-3 px-3 d-flex align-items-center">
                            <p class="font-weight-semibold mb-0 text-dark text-sm">
                                Pagina {{ $donations->currentPage() }} di {{ $donations->lastPage() }}
                            </p>
                            <div class="ms-auto">
                                <a href="{{ $donations->previousPageUrl() }}" class="btn btn-sm btn-white mb-0 {{ $donations->onFirstPage() ? 'disabled' : '' }}">Precedente</a>
                                <a href="{{ $donations->nextPageUrl() }}" class="btn btn-sm btn-white mb-0 {{ !$donations->hasMorePages() ? 'disabled' : '' }}">Successiva</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</x-app-layout>
<x-app-layout>
<main class="main-content position-relative h-100 border-radius-lg ">
    <div class="container-fluid py-2 px-5">
        <div class="row">
            <div class="col-12" style="padding: 0;">
                <div class="card border shadow-xs mb-4">
                    <div class="card-header border-bottom pb-0">
                        <div class="d-sm-flex align-items-center">
                            <div>
                                <h6 class="font-weight-semibold text-lg mb-0">Gestione Soci Sostenitori</h6>
                                <p class="text-sm"></br></p>
                            </div>
                            <div class="ms-auto d-flex">
                                <a href="{{ route('members.export_csv', request()->all()) }}" class="btn btn-sm btn-success">
                                    Esporta CSV
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 py-0">
                        <div class="border-bottom py-3 px-1 align-items-center">
                            <!-- Filtro Ricerca -->
                            <form method="GET" action="{{ route('members.index') }}" class="py-3 px-3 d-flex align-items-center">

                                <!-- Search Box -->
                                <div class="input-group w-sm-70 me-3">
                                    <span class="input-group-text text-body" style="border: solid 1px; background: #f1f1f1;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"></path>
                                        </svg>
                                    </span>
                                    <input type="text" name="search" class="form-control border-gray-300 rounded-md" placeholder="Cerca per nome o codice" value="{{ request('search') }}">
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

                                <!-- Membership Type -->
                                <div class="me-3 w-sm-20">
                                    <select name="membership_type" class="form-select">
                                        <option value="" {{ request('membership_type') == '' ? 'selected' : '' }}>Tutti i tipi</option>
                                        <option value="Individuale" {{ request('membership_type') == 'Individuale' ? 'selected' : '' }}>Individuale</option>
                                        <option value="Aziendale" {{ request('membership_type') == 'Aziendale' ? 'selected' : '' }}>Aziendale</option>
                                    </select>
                                </div>

                                <!-- Date Filter -->
                                <div class="me-3 w-sm-20">
                                    <input type="date" name="date" class="form-control border-gray-300 rounded-md" max="{{ date('Y-m-d') }}" value="{{ request('date') }}">
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
                                        <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Nome e Cognome</th>
                                        <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Tipo Socio</th>
                                        <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Data di nascita</th>
                                        <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Codice Fiscale</th>
                                        <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Telefono</th>
                                        <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Email</th>
                                        <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Data registrazione</th>
                                        <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Azioni</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($members as $member)
                                        <tr>
                                            <td>
                                                <p class="text-sm text-secondary mb-0 px-3 py-1">{{ $member->id }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm text-secondary mb-0">{{ $member->full_name ?? 'N/A' }}</p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-sm font-weight-normal">{{ $member->membership_type ?? 'N/A' }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-sm font-weight-normal">{{ $member->birth_date ? \Carbon\Carbon::parse($member->birth_date)->format('d/m/Y') : 'N/A' }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-sm font-weight-normal">{{ $member->fiscal_code ?? 'N/A' }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-sm font-weight-normal">{{ $member->phone ?? 'N/A' }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-sm font-weight-normal">{{ $member->email ?? 'N/A' }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-sm font-weight-normal">{{ $member->created_at ? $member->created_at->format('d/m/Y') : 'N/A' }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <a href="{{ route('members.show', $member->id) }}" class="btn btn-sm btn-primary mt-3">Visualizza</a>
                                                <a href="{{ route('members.download', $member->id) }}" class="btn btn-sm btn-success mt-3">Download</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="border-top py-3 px-3 d-flex align-items-center">
                            <p class="font-weight-semibold mb-0 text-dark text-sm">
                                Pagina {{ $members->currentPage() }} di {{ $members->lastPage() }}
                            </p>
                            <div class="ms-auto">
                                <a href="{{ $members->previousPageUrl() }}" class="btn btn-sm btn-white mb-0 {{ $members->onFirstPage() ? 'disabled' : '' }}">Precedente</a>
                                <a href="{{ $members->nextPageUrl() }}" class="btn btn-sm btn-white mb-0 {{ !$members->hasMorePages() ? 'disabled' : '' }}">Successiva</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</x-app-layout>

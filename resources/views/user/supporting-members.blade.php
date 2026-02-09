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
                                        DOMANDA DI AMMISSIONE COME SOCIO SOSTENITORE PER L'ANNO {{ now()->year }}
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
                                                <input type="text" name="company_name" class="border-gray-300 rounded-md w-full" value="{{ old('company_name') }}">
                                            </div>
                                            <div class="col">
                                                <label>Qualifica del richiedente</label>
                                                <input type="text" name="applicant_role" class="border-gray-300 rounded-md w-full" value="{{ old('applicant_role') }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <label>Nome e Cognome*</label>
                                                <input type="text" name="full_name" class="border-gray-300 rounded-md w-full" value="{{ old('full_name') }}" required>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <label>Luogo Nascita*</label>
                                                <input type="text" name="birth_place" class="border-gray-300 rounded-md w-full" value="{{ old('birth_place') }}" required>
                                            </div>
                                            <div class="col">
                                                <label>Data Nascita*</label>
                                                <input type="date" name="birth_date" class="border-gray-300 rounded-md w-full" value="{{ old('birth_date') }}" max="{{ date('Y-m-d') }}" required>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <label>Codice Fiscale*</label>
                                                <input type="text" name="fiscal_code" maxlength="16" class="border-gray-300 rounded-md w-full" value="{{ old('fiscal_code') }}" required>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <label>Documento Tipo</label>
                                                <input type="text" name="id_type" class="border-gray-300 rounded-md w-full" value="{{ old('id_type') }}">
                                            </div>
                                            <div class="col">
                                                <label>Numero Documento</label>
                                                <input type="text" name="id_number" class="border-gray-300 rounded-md w-full" value="{{ old('id_number') }}">
                                            </div>
                                            <div class="col">
                                                <label>Scadenza Documento</label>
                                                <input type="date" name="id_expiry" class="border-gray-300 rounded-md w-full" value="{{ old('id_expiry') }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <label>Residenza*</label>
                                                <input type="text" name="residence" class="border-gray-300 rounded-md w-full" value="{{ old('residence') }}" required>
                                            </div>
                                            <div class="col">
                                                <label>Indirizzo*</label>
                                                <input type="text" name="street" class="border-gray-300 rounded-md w-full" value="{{ old('street') }}" required>
                                            </div>
                                            <div class="col">
                                                <label>Numero Civico</label>
                                                <input type="text" name="street_number" class="border-gray-300 rounded-md w-full" value="{{ old('street_number') }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <label>CAP</label>
                                                <input type="text" name="postal_code" class="border-gray-300 rounded-md w-full" value="{{ old('postal_code') }}">
                                            </div>
                                            <div class="col">
                                                <label>Provincia</label>
                                                <input type="text" name="province" class="border-gray-300 rounded-md w-full" value="{{ old('province') }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <label>Telefono</label>
                                                <input type="text" name="phone" class="border-gray-300 rounded-md w-full" value="{{ old('phone') }}">
                                            </div>
                                            <div class="col">
                                                <label>Cellulare</label>
                                                <input type="text" name="mobile" class="border-gray-300 rounded-md w-full" value="{{ old('mobile') }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <label>Email*</label>
                                                <input type="email" name="email" class="border-gray-300 rounded-md w-full" value="{{ old('email') }}" required>
                                            </div>
                                            <div class="col">
                                                <label>PEC</label>
                                                <input type="email" name="pec" class="border-gray-300 rounded-md w-full" value="{{ old('pec') }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <label>Importo contributo Socio Sostenitore (€)*</label>
                                                <input type="number" name="contribution" step="0.01" class="border-gray-300 rounded-md w-full" value="{{ old('contribution') }}" required>
                                            </div>
                                            <div class="col">
                                                <label>Nota Pagamento</label>
                                                <input type="text" name="payment_note" class="border-gray-300 rounded-md w-full" value="{{ old('payment_note') }}">
                                            </div>
                                             <small class="form-text text-muted">
                                                    (Il contributo minimo per l'anno {{ now()->year }} è pari a 50,00 Euro per i nati prima del 1996, 30,00 Euro per i nati dal 1996 in poi)
                                                </small>
                                        </div>

                                        <div class="row mb-3">
                                            
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col">
                                                <div class="card border">
                                                    <div class="card-body">
                                                        <p class="mb-3">
                                                            Dopo aver letto lo statuto ed i regolamenti della Fondazione pubblicati sul sito della 
                                                            www.fondazioneilcarrodimirabella.it, trovandosi in accordo con i principi della stessa ed 
                                                            impegnandosi sin da ora a rispettare le disposizioni e le deliberazioni degli organi sociali 
                                                            validamente costituiti, ai sensi e per gli effetti dell'art. 11 dello Statuto
                                                        </p>
                                                        
                                                        <h5 class="text-center mb-3">CHIEDE</h5>
                                                        
                                                        <p class="mb-3">
                                                            di essere ammesso quale <strong>SOCIO SOSTENITORE*</strong> della <strong>FONDAZIONE IL CARRO DI 
                                                            MIRABELLA- ETS</strong>.
                                                        </p>
                                                        
                                                        <p class="mb-3">
                                                            Consapevole che, all'atto di delibera positiva del Consiglio di Amministrazione e dell'Assemblea 
                                                            dei Soci, saranno riservati i diritti ed i doveri statutari, il sottoscritto, dichiara di aver conferito alla 
                                                            Fondazione a titolo di contributo per l'anno {{ now()->year }} la somma precedentemente indicata e si impegna 
                                                            a fornire copia del versamento effettuato mediante invio a mezzo e-mail all'indirizzo di posta 
                                                            soci@fondazioneilcarrodimirabella.it, ovvero a mano presso la sede della Fondazione.
                                                        </p>
                                                        
                                                        <p class="mb-3">
                                                            Dichiara inoltre che, in caso di mancanza di indirizzo E-MAIL con PEC, la Fondazione è 
                                                            autorizzata all'invio delle convocazioni per l'Assemblea al semplice indirizzo E-MAIL comunicato 
                                                            dal richiedente.
                                                        </p>
                                                        
                                                        <p class="mb-0">
                                                            <small>
                                                                *Art.11 ...Soci Sostenitori: sono Soci Sostenitori i soci ordinari persone giuridiche private e le 
                                                                persone fisiche che, condividendo le finalità perseguite dalla Fondazione, partecipano al 
                                                                raggiungimento degli Scopi Istituzionali della stessa attraverso il conferimento di un contributo in 
                                                                denaro per ciascun esercizio finanziario nella misura minima determinata dal Consiglio di 
                                                                Amministrazione. L'ammissione di ogni Socio Sostenitore è subordinata al preventivo ed 
                                                                insindacabile giudizio dell'Assemblea dei Soci<br>
                                                                Il contributo versato a titolo di quota associativa non è deducibile, né detraibile ai fini fiscali.
                                                            </small>
                                                        </p>
                                                 
                                                        <h6 class="mt-3">Nota informativa</h6>
                                                        <p class="mb-2">
                                                            (Ai sensi dell'art.13 del Codice in materia di Protezione dei Dati Personali D.Lgs. 196/2003). 
                                                            La informiamo che i suoi dati personali verranno raccolti e trattati per le seguenti finalità: 
                                                            divulgazione e promozione delle attività e degli eventi organizzati dalla Fondazione Il Carro 
                                                            di Mirabella- ETS ; per esigenze di tipo operativo e gestionale. I dati non saranno oggetto di 
                                                            diffusione e saranno trattati, per le finalità sopra indicate, con pertinenza, correttezza e trasparenza 
                                                            a tutela della Sua riservatezza e dei Suoi diritti, medianti strumenti manuali, informatici e telematici 
                                                            con logiche strettamente correlate alle indicate finalità e, in ogni caso, idonei a garantirne la 
                                                            sicurezza e ad evitare accessi non autorizzati ai dati.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-check mb-3">
                                            <input type="checkbox" name="data_consent" class="form-check-input" id="data_consent" value="1" required>
                                            <label class="form-check-label" for="data_consent">
                                                Con l'accettazione del presente modulo il richiedente dichiara di avere ricevuto ed accettare l'informativa di cui sopra e conferma il consenso 
                                                al trattamento dei propri dati personali.
                                            </label>
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
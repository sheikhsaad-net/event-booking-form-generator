<x-guest-layout>
    <main class="main-content mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 d-flex flex-column mx-auto">
                            <div class="card card-plain mt-5 pb-5">
                                <div class="card-header pb-0 text-left bg-transparent">
                                    <h3 class="font-weight-black text-dark display-6 mb-2">Richiesta di Partecipazione al Trasporto del Carro 2025 – FUNAIOLO –</h3></br>
                                    @if(request()->get('type') == 1)
                                    <p class="mb-3"><b>La prenotazione come funaiolo di un MINORE alla Processione del Carro del 2025 “La Grande Tirata” deve essere fatta da uno dei due genitori o da un tutore legale.</b></br></br>
                                    Per i minori sono previste le seguenti restrizioni:</p>
                                    <ul style="margin-left: 12px; line-height: 26px;" class="mb-3">
                                        <li>a) Con meno di 6 anni di età il minore non è ammesso.</li>
                                        <li>b) Da 6 a 10 anni di età sarà indicata da parte dell'organizzazione una Fune/i dedicata e il minore dovrà essere autorizzato e accompagnato.</li>
                                        <li>c) Da 11 a 14 anni di età il minore dovrà essere autorizzato e accompagnato.</li>
                                        <li>d) Oltre i 14 anni di età il minore dovrà essere autorizzato.</li>  
                                    </ul>
                                    @else
                                    <p class="mb-3"><b>Per la prenotazione come funaiolo alla Processione del Carro del 2025 “La Grande Tirata” ti chiediamo di riempire i seguenti campi, di indicare le opzioni, di leggere attentamente gli adempimenti e gli allegati, e di premere INVIO</b></p>
                                    @endif
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
                                    <form method="POST" action="{{ route('bookings.store') }}">
                                        @csrf

                                        {{-- If URL has ?type=1 => show minor details --}}
                                        @if(request()->get('type') == 1)

                                            <div class="row mb-3">
                                                <div class="col">
                                                    <label>Cognome Minore</label>
                                                    <input type="text" name="minore_cognome" class="form-control" value="{{ old('minore_cognome') }}" required>
                                                </div>
                                                <div class="col">
                                                    <label>Nome Minore</label>
                                                    <input type="text" name="minore_nome" class="form-control" value="{{ old('minore_nome') }}"  required>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col">
                                                    <label>Luogo Nascita Minore</label>
                                                    <input type="text" name="minore_luogo_nascita" class="form-control" value="{{ old('minore_luogo_nascita') }}"  required>
                                                </div>
                                                <div class="col">
                                                    <label>Data Nascita Minore</label>
                                                    <input type="date" name="minore_data_nascita" class="form-control" value="{{ old('minore_data_nascita') }}" max="{{ date('Y-m-d') }}" required>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col">
                                                    <label>Luogo Residenza Minore</label>
                                                    <input type="text" name="minore_luogo_residenza" class="form-control" value="{{ old('minore_luogo_residenza') }}"  required>
                                                </div>
                                                <div class="col">
                                                    <label>Indirizzo Minore</label>
                                                    <input type="text" name="minore_indirizzo" class="form-control" value="{{ old('minore_indirizzo') }}"  required>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col">
                                                    <label>Codice Fiscale Minore</label>
                                                    <input type="text" name="minore_cod_fis" maxlength="16" class="form-control" value="{{ old('minore_cod_fis') }}"  required>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col">
                                                    <label>Dati del genitore o Tutore legale</label>
                                                    <select name="guardian" class="form-select" required>
                                                        <option value="">-- Seleziona --</option>
                                                        <option value="genitore" {{ old('guardian') == 'genitore' ? 'selected' : '' }}>Genitore</option>
                                                        <option value="tutore" {{ old('guardian') == 'tutore' ? 'selected' : '' }}>Tutore Legale</option>
                                                    </select>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="row mb-3">
                                            <div class="col">
                                                <label>Cognome*</label>
                                                <input type="text" name="cognome" class="form-control" value="{{ old('cognome') }}"  required>
                                            </div>
                                            <div class="col">
                                                <label>Nome*</label>
                                                <input type="text" name="nome" class="form-control" value="{{ old('nome') }}"  required>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <label>Luogo Nascita*</label>
                                                <input type="text" name="luogo_nascita" class="form-control" value="{{ old('luogo_nascita') }}"  required>
                                            </div>
                                            <div class="col">
                                                <label>Data Nascita*</label>
                                                <input type="date" name="data_nascita" class="form-control" value="{{ old('data_nascita') }}" max="{{ date('Y-m-d') }}" required>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <label>Luogo Residenza*</label>
                                                <input type="text" name="luogo_residenza" class="form-control" value="{{ old('luogo_residenza') }}"  required>
                                            </div>
                                            <div class="col">
                                                <label>Indirizzo*</label>
                                                <input type="text" name="indirizzo" class="form-control" value="{{ old('indirizzo') }}"  required>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <label>Codice Fiscale*</label>
                                                <input type="text" name="cod_fis" maxlength="16" class="form-control" value="{{ old('cod_fis') }}"  required>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <label>Tipo Documento*</label>
                                                <select name="doc_tipo" class="form-select" required>
                                                    <option value="">-- Seleziona --</option>
                                                    <option value="C.I." {{ old('doc_tipo') == 'C.I.' ? 'selected' : '' }}>C.I.</option>
                                                    <option value="PATENTE" {{ old('doc_tipo') == 'PATENTE' ? 'selected' : '' }}>PATENTE</option>
                                                    <option value="PASSAPORTO" {{ old('doc_tipo') == 'PASSAPORTO' ? 'selected' : '' }}>PASSAPORTO</option>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <label>Numero Documento*</label>
                                                <input type="text" name="doc_num" class="form-control" value="{{ old('doc_num') }}"  required>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <label>Luogo Rilascio*</label>
                                                <input type="text" name="doc_luogo_rilascio" class="form-control" value="{{ old('doc_luogo_rilascio') }}"  required>
                                            </div>
                                            <div class="col">
                                                <label>Data Rilascio*</label>
                                                <input type="date" name="doc_data_rilascio" class="form-control" value="{{ old('doc_data_rilascio') }}" max="{{ date('Y-m-d') }}" required>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <label>Telefono*</label>
                                                <input type="text" name="tel" class="form-control" value="{{ old('tel') }}"  required>
                                            </div>
                                            <div class="col">
                                                <label>Email*</label>
                                                <input type="email" name="e_mail" class="form-control" value="{{ old('e_mail') }}"  required>
                                            </div>
                                        </div>
    
                                        <p class="mb-3"><b><u>Rivolgendo lo sguardo verso il Carro e il viso della Madonnina</u></b> scelgo preferenzialmente la seguente posizione (barrare):</p>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <label>Posizione</label>
                                                <select name="posizione" class="form-select" required>
                                                    <option value="">-- Seleziona --</option>
                                                    <option value="AVANTI" {{ old('posizione') == 'AVANTI' ? 'selected' : '' }}>Avanti</option>
                                                    <option value="DIETRO" {{ old('posizione') == 'DIETRO' ? 'selected' : '' }}>Dietro</option>
                                                    <option value="SINISTRA" {{ old('posizione') == 'SINISTRA' ? 'selected' : '' }}>Sinistra</option>
                                                    <option value="DESTRA" {{ old('posizione') == 'DESTRA' ? 'selected' : '' }}>Destra</option>
                                                    @if(request('type') == 1)
                                                        <option value="FUNE DEDICATA AI BAMBINI" 
                                                            {{ old('posizione') == 'FUNE DEDICATA AI BAMBINI' ? 'selected' : '' }}>
                                                            Fune dedicata ai bambini (scelta obbligatoria per i minori tra i 6 e 10 anni)
                                                        </option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        @if(request('type') == 1)
                                        
                                        <p class="mb-3">Dopo la prenotazione il genitore o il tutore legale è invitato a ritirare personalmente, portando con sé il documento di riconoscimento, il <b>braccialetto identificativo, riferito al lato scelto, del minore e il suo braccialetto come accompagnatore</b>.</b></br>
                                        La consegna avverrà presso la Sede della Fondazione in Via Roma (edificio Ex ECA) dal giorno Mercoledì 10 al giorno Venerdì 19 Settembre nelle ore 10-12 e 17-20.</br>
                                        Solo per i non residenti a Mirabella Eclano, la consegna avverrà anche Sabato 20 Settembre dalla ore 9 alle ore 13.</br></br>
                                        All'atto del ritiro dei braccialetti, il genitore o il tutore legale dovrà dichiarare con firma:</br></p>
                                        <ul class="bullet-points">
                                            <li><b>Di accompagnare alla processione del Carro “La Grande Tirata” il minore se è di età compresa tra i 6 e i 14 anni.</b></li>
                                            <li>Che il minore è nelle condizioni di salute idonee a partecipare alla manifestazione e di esonerare l'organizzazione da ogni obbligo di verifica sanitaria.</li>
                                            <li>Di essere consapevole dei rischi connessi alla partecipazione, compreso il transito sotto una struttura mobile e oscillante di grandi dimensioni, l'Obelisco.</li>
                                            <li>Di sollevare la “Fondazione il Carro”, c.f. 900292240646 e l'Amministrazione Comunale di Mirabella Eclano da qualsiasi responsabilità per danni a persone o cose causati direttamente o indirettamente dalla mia partecipazione.</li>
                                            <li>Di rinunciare espressamente ad ogni azione di rivalsa nei confronti dell'organizzazione, del Comune e degli altri partecipanti.</li>
                                            <li>Di aver preso visione e di accettare il Piano di sicurezza.</li>
                                            <li>Di aver preso visione, di accettare e di osservare <b><a href="{{ asset('assets/temp/download/norme-di-comportamento.pdf') }}" target="_blank">le Norme di comportamento</a>,</b> parte integrante del presente modulo.</li>
                                            <li>Di essere informato, ai sensi del Regolamento UE 2016/679 (GDPR), circa il trattamento dei miei dati personali da parte dell'Associazione organizzatrice, per finalità esclusivamente organizzative e legate alla sicurezza dell'evento.</li>
                                            <li>Per tutto quanto non espressamente previsto, di esonerare la Fondazione e la catena di coordinamento da ogni responsabilità.</li>
                                        </ul></br>
                                        
                                        <p class="mb-3">Dovrà inoltre firmare la <b>Dichiarazione di esonero di responsabilità e di Informativa Privacy - Art. 13 e 14 GDPR 2016/679.</b></br></p>
                                        
                                        @else
                                        
                                        <p class="mb-3">Dopo la prenotazione sei invitato a ritirare <u>personalmente</u>, portando con te il documento di riconoscimento, il tuo <b>braccialetto identificativo riferito al lato scelto per la tirata.</b></br>
                                        La consegna avverrà presso la Sede della Fondazione in Via Roma (edificio Ex ECA) dal giorno Mercoledì 10 al giorno Venerdì 19 Settembre nelle ore 10-12 e 17-20.</br>
                                        Solo per i non residenti a Mirabella Eclano, la consegna avverrà anche Sabato 20 Settembre dalla ore 9 alle ore 13.</br></br>
                                        All'atto del ritiro dei braccialetti, il genitore o il tutore legale dovrà dichiarare con firma:</br></p>
                                        <ul class="bullet-points">
                                            <li>Di essere in condizioni di salute idonee a partecipare alla manifestazione e di esonerare l'organizzazione da ogni obbligo di verifica sanitaria.</li>
                                            <li>Di essere consapevole dei rischi connessi alla partecipazione, compreso il transito sotto una struttura mobile e oscillante di grandi dimensioni, l'Obelisco.</li>
                                            <li>Di sollevare la “Fondazione il Carro”, c.f. 900292240646 e l'Amministrazione Comunale di Mirabella Eclano da qualsiasi responsabilità per danni a persone o cose causati direttamente o indirettamente dalla mia partecipazione.</li>
                                            <li>Di rinunciare espressamente ad ogni azione di rivalsa nei confronti dell'organizzazione, del Comune e degli altri partecipanti.</li>
                                            <li>Di aver preso visione e di accettare il Piano di sicurezza.</li>
                                            <li>Di aver preso visione, di accettare e di osservare le <b><a href="{{ asset('assets/temp/download/norme-di-comportamento.pdf') }}" target="_blank">Norme di comportamento (allegato).</a></b></li>
                                            <li>Di essere informato, ai sensi del Regolamento UE 2016/679 (GDPR), circa il trattamento dei miei dati personali da parte dell'Associazione organizzatrice, per finalità esclusivamente organizzative e legate alla sicurezza dell'evento.</li>
                                            <li>Per tutto quanto non espressamente previsto, di esonerare la Fondazione e la catena di coordinamento da ogni responsabilità.</li>
                                        </ul></br>
                                        
                                        <p class="mb-3">Dovrai inoltre firmare la <b>Dichiarazione di esonero di responsabilità e di Informativa Privacy - Art. 13 e 14 GDPR 2016/679.</b></br></p>
                                        
                                        @endif
                                        
                                        <h2 style="font-size:18px;" class="mb-3">Allegati</h2>
                                        
                                        <ul class="bullet-points mb-3">
                                            <li><a href="{{ asset('assets/temp/download/norme-di-comportamento.pdf') }}" target="_blank">Norme di comportamento (pdf)</a></li>
                                        </ul>
                                        
                                        <p class="mb-3">Il titolare del trattamento è il Presidente della Fondazione Il Carro, organizzatrice dell’evento. I dati forniti, personali e sensibili, saranno trattati nel rispetto del principio di liceità, correttezza, trasparenza e minimizzazione dei dati per il solo periodo necessario alla gestione della manifestazione. Il mancato conferimento comporterà l’impossibilità di accettare l’adesione all’evento.</p>
                                        
                                        <input type="checkbox" id="consentCheckbox" name="consent"  required />
                                        <label for="consentCheckbox" class="mb-3">Acconsento al trattamento dei dati</label>

                                        <div class="row">
                                            <div class="col text-end">
                                                <input type="hidden" name="minor" value="{{ request('type') == 1 ? 1 : 0 }}">
                                                <button type="submit" class="btn btn-primary btn-lg w-100"> INVIO </button>
                                            </div>
                                        </div>
                                    </form>
                                    @if(session('force_children_rope'))
                                    <script>
                                        alert('Solo l’opzione "FUNE DEDICATA AI BAMBINI" è disponibile per 6–10 anni.');
                                        document.getElementById('confirm_children_rope').value = 1;
                                        document.getElementById('bookingForm').submit();
                                    </script>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
                 <section class="support-section">
                                      <div class="overlay">
                                        <h1>Partecipa, sostienici, costruiamo insieme il futuro del Carro.</h1>
                                        <p>
                                          Aderisci come Socio o dona liberamente per contribuire al restauro del Carro 
                                          e alla vita della Fondazione.
                                        </p>
                                        <div class="btn-group">
                                          <a href="https://www.fondazioneilcarrodimirabella.it/diventa-socio/" class="btn" target="_blank">Diventa Socio</a>
                                          <a href="https://www.fondazioneilcarrodimirabella.it/donazioni/" class="btn" target="_blank">Dona alla Fondazione</a>
                                        </div>
                                      </div>
                                    </section>
    </main>
</x-guest-layout>
<x-guest-layout>
    <main class="main-content mt-0">
        <section>
            <div class="page-header pb-8">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 d-flex flex-column mx-auto">
                            <div class="card card-plain mt-8">
                                <div class="card-header pb-0 text-left bg-transparent text-center">
                                    <h1 class="font-weight-black text-dark display-6 mb-2">PROCESSIONE DEL CARRO 2025 – “LA GRANDE TIRATA”</h1>
                                    <p class="mb-3">20 Settembre 2025, ore 15.00-20.00</p>

                                    <!-- Buttons -->
                                    <div class="d-flex gap-3 p-2">
                                        <a href="{{ route('booking.create') }}" class="btn btn-primary p-4" style="font-size: 18px; line-height: 30px;">
                                            MODULO DI PRENOTAZIONE PER I FUNAIOLI MAGGIORENNI
                                        </a>
                                        <a href="{{ route('booking.create', ['type' => 1]) }}" class="btn btn-secondary p-4" style="font-size: 18px; line-height: 30px;">
                                            MODULO DI PRENOTAZIONE PER I FUNAIOLI MINORENNI
                                        </a>
                                    </div>
                                    <!-- End Buttons -->

                                    <p class="mb-3">Per qualsiasi informazione scrivi a
                                    <a href="mailto:tiratadelcarro@fondazioneilcarrodimirabella.it">tiratadelcarro@fondazioneilcarrodimirabella.it</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-guest-layout>
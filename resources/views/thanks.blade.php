<x-guest-layout>
    <main class="main-content mt-0">
       <div class="container text-center py-5">
            <div class="card shadow-sm p-4">

                @if(session('success'))
                    <p class="alert alert-success">
                        {{ session('success') }}
                    </p>
                @endif

                <h1 class="mb-3">La consegna avverrà presso la Sede della Fondazione in Via Roma (edificio Ex ECA) dal giorno Mercoledì 10 al giorno Venerdì 19 Settembre nelle ore 10-12 e 17-20</h1>

                <p>
                    Solo per i non residenti a Mirabella Eclano, la consegna avverrà anche Sabato 20 Settembre dalla ore 9 alle ore 13

                </p>

                <a href="{{ url('/') }}" class="btn btn-primary mt-3">Torna alla Home</a>
            </div>
        </div>
    </main>
</x-guest-layout>
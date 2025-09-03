<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use setasign\Fpdi\Fpdi;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Booking::query();

        // Search filter
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nome', 'LIKE', "%$search%")
                ->orWhere('cognome', 'LIKE', "%$search%");
            });
        }

        // Alphabet filter (first letter of cognome)
        if ($request->has('letter') && $request->letter != '') {
            $letter = $request->letter;
            $query->where('cognome', 'LIKE', $letter . '%');
        }

        // Type filter (Adulto o Minore)
        if ($request->has('type') && $request->type != '') {
            if ($request->type == '0') {
                $query->whereNull('minore_nome'); // Adulti
            } elseif ($request->type == '1') {
                $query->whereNotNull('minore_nome'); // Minori
            }
        }

        // Date filter
        if ($request->has('date') && $request->date != '') {
            $query->whereDate('created_at', $request->date);
        }

        $bookings = $query->paginate(50)->appends($request->all());

        return view('bookings', compact('bookings'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Age check
        $age = null;
        if ($request->filled('minore_data_nascita')) {
            $birthDate = \Carbon\Carbon::parse($request->minore_data_nascita);
            $age = $birthDate->age;
        }

        // Rule A: not allowed under 6
        if ($age !== null && $age < 6) {
            return redirect()->back()
                ->withErrors(['minore_data_nascita' => 'Il minore non è ammesso'])
                ->withInput();
        }

        // Rule B: Age between 6–10
        if ($age !== null && $age >= 6 && $age <= 10) {
            // If already correct option chosen, no need for alert
            if ($request->posizione === 'FUNE DEDICATA AI BAMBINI') {
                // Force children rope (for safety)
                $request->merge(['posizione' => 'FUNE DEDICATA AI BAMBINI']);
            } else {
                // Otherwise require confirmation
                if (!$request->has('confirm_children_rope')) {
                    return redirect()->back()
                        ->with('force_children_rope', true) // flag for alert
                        ->withInput();
                }

                // Force children rope after confirmation
                $request->merge(['posizione' => 'FUNE DEDICATA AI BAMBINI']);
            }
        }

        // Generate booking code
        $lastBooking = Booking::latest('id')->first();
        $nextId = $lastBooking ? $lastBooking->id + 1 : 1;
        $prefix = $request->has('minor') && $request->minor == 1 ? 'MI_' : 'MA_';
        $bookingCode = $prefix . str_pad($nextId, 4, '0', STR_PAD_LEFT);

        // Save booking only once (after confirmation OK)
        $booking = new Booking();
        $booking->booking_id             = $bookingCode;
        $booking->minore_cognome         = $request->minore_cognome;
        $booking->minore_nome            = $request->minore_nome;
        $booking->minore_luogo_nascita   = $request->minore_luogo_nascita;
        $booking->minore_data_nascita    = $request->minore_data_nascita;
        $booking->minore_luogo_residenza = $request->minore_luogo_residenza;
        $booking->minore_indirizzo       = $request->minore_indirizzo;
        $booking->minore_cod_fis         = $request->minore_cod_fis;
        $booking->guardian               = $request->guardian;
        $booking->cognome                = $request->cognome;
        $booking->nome                   = $request->nome;
        $booking->luogo_nascita          = $request->luogo_nascita;
        $booking->data_nascita           = $request->data_nascita;
        $booking->luogo_residenza        = $request->luogo_residenza;
        $booking->indirizzo              = $request->indirizzo;
        $booking->cod_fis                = $request->cod_fis;
        $booking->doc_tipo               = $request->doc_tipo;
        $booking->doc_num                = $request->doc_num;
        $booking->doc_luogo_rilascio     = $request->doc_luogo_rilascio;
        $booking->doc_data_rilascio      = $request->doc_data_rilascio;
        $booking->tel                    = $request->tel;
        $booking->e_mail                 = $request->e_mail;
        $booking->posizione              = $request->posizione;
        $booking->minor                  = $request->minor;
        $booking->save();

        return redirect()->route('thanks')
            ->with('success', 'La tua registrazione è avvenuta con successo. ID: ' . $bookingCode);
    }




    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $booking = Booking::findOrFail($id);
        return view('bookings-show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
    */
    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        $booking->update($request->all());

        return redirect()->route('bookings.show', $id)
                         ->with('success', 'Dati aggiornati con successo');
    }

    public function download($id)
    {
        $booking = Booking::findOrFail($id);

        $pdf = new Fpdi();

        // Load the template
        $pageCount = $pdf->setSourceFile(public_path('assets/temp/domanda-di-partecipazione-maggiorenne.pdf'));

        // --- PAGE 1 ---
        $pdf->AddPage();
        $tpl = $pdf->importPage(1);
        $pdf->useTemplate($tpl, 0, 0, 210); // A4 width

        $pdf->SetFont('Helvetica', '', 12);
        $pdf->SetTextColor(0, 0, 0);

        // $pdf->SetXY(160, 30);
        // $pdf->Write(0, $booking->booking_id);

        $pdf->SetXY(80, 60);  
        $pdf->Write(0, $booking->cognome . ' ' . $booking->nome);

        $pdf->SetXY(60, 67);
        $pdf->Write(0, $booking->luogo_nascita);
        
        $pdf->SetXY(160, 67);
        $pdf->Write(0, $booking->data_nascita 
                    ? \Carbon\Carbon::parse($booking->data_nascita)->format('d/m/Y') 
                    : 'N/A'
                );

        $pdf->SetXY(100, 73);
        $pdf->Write(0, $booking->luogo_residenza);

        $pdf->SetXY(60, 80);
        $pdf->Write(0, $booking->indirizzo);

        $pdf->SetXY(80, 86);
        $pdf->Write(0, $booking->cod_fis);

        $pdf->SetXY(95, 93);
        $pdf->Write(0, $booking->doc_tipo);

        $pdf->SetXY(150, 93);
        $pdf->Write(0, $booking->doc_num);

        $pdf->SetXY(65, 100);
        $pdf->Write(0, $booking->doc_luogo_rilascio);

        $pdf->SetXY(150, 100);
        $pdf->Write(0, $booking->doc_data_rilascio 
            ? \Carbon\Carbon::parse($booking->doc_data_rilascio)->format('d/m/Y') 
            : 'N/A'
        );

        $pdf->SetXY(55, 106);
        $pdf->Write(0, $booking->tel);

        $pdf->SetXY(120, 106);
        $pdf->Write(0, $booking->e_mail);

        // Map posizione to coordinates
        $positions = [
            'AVANTI'   => [19, 173],
            'DIETRO'   => [69, 173],
            'SINISTRA' => [119, 173],
            'DESTRA'   => [157, 173],
        ];

        if (isset($positions[$booking->posizione])) {
            [$x, $y] = $positions[$booking->posizione];
            $pdf->SetXY($x, $y);
            $pdf->Write(0, 'X');
        }

        // --- PAGE 2 (just template) ---
        if ($pageCount >= 2) {
            $pdf->AddPage();
            $tpl2 = $pdf->importPage(2);
            $pdf->useTemplate($tpl2, 0, 0, 210);
        }

        // Output as download
        return response($pdf->Output('S'))
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', "attachment; filename=domanda-di-partecipazione-maggiorenne-{$booking->booking_id}.pdf");
    }


    public function download_minori($id)
    {
        $booking = Booking::findOrFail($id);

        $pdf = new Fpdi();

        // Load the template
        $pageCount = $pdf->setSourceFile(public_path('assets/temp/domanda-di-partecipazione-minorenne.pdf'));

        // --- PAGE 1 ---
        $pdf->AddPage();
        $tpl = $pdf->importPage(1);
        $pdf->useTemplate($tpl, 0, 0, 210); // A4 width

        $pdf->SetFont('Helvetica', '', 12);
        $pdf->SetTextColor(0, 0, 0);

        // $pdf->SetXY(160, 28);
        // $pdf->Write(0, $booking->booking_id);

        // Map guardian to coordinates
        $guardians = [
            'genitore'        => [19, 68],
            'tutore'        => [44, 68],
        ];

        if (isset($guardians[$booking->guardian])) {
            [$x, $y] = $guardians[$booking->guardian];
            $pdf->SetXY($x, $y);
            $pdf->Write(0, 'X');
        }

        $pdf->SetXY(80, 81);   
        $pdf->Write(0, $booking->minore_cognome . ' ' . $booking->minore_nome);

        $pdf->SetXY(60, 88);
        $pdf->Write(0, $booking->minore_luogo_nascita);
        
        $pdf->SetXY(160, 88);
        $pdf->Write(0, $booking->minore_data_nascita 
                    ? \Carbon\Carbon::parse($booking->minore_data_nascita)->format('d/m/Y') 
                    : 'N/A'
                );

        $pdf->SetXY(45, 94);
        $pdf->Write(0, $booking->minore_luogo_residenza);

        $pdf->SetXY(110, 94);
        $pdf->Write(0, $booking->minore_indirizzo);

        $pdf->SetXY(80, 101);
        $pdf->Write(0, $booking->minore_cod_fis);

        $pdf->SetXY(80, 114);  
        $pdf->Write(0, $booking->cognome . ' ' . $booking->nome);

        $pdf->SetXY(60, 121);
        $pdf->Write(0, $booking->luogo_nascita);
        
        $pdf->SetXY(160, 121);
        $pdf->Write(0, $booking->data_nascita 
                    ? \Carbon\Carbon::parse($booking->data_nascita)->format('d/m/Y') 
                    : 'N/A'
                );

        $pdf->SetXY(100, 127);
        $pdf->Write(0, $booking->luogo_residenza);

        $pdf->SetXY(60, 134);
        $pdf->Write(0, $booking->indirizzo);

        $pdf->SetXY(80, 140);
        $pdf->Write(0, $booking->cod_fis);

        $pdf->SetXY(95, 147);
        $pdf->Write(0, $booking->doc_tipo);

        $pdf->SetXY(150, 147);
        $pdf->Write(0, $booking->doc_num);

        $pdf->SetXY(65, 154);
        $pdf->Write(0, $booking->doc_luogo_rilascio);

        $pdf->SetXY(150, 154);
        $pdf->Write(0, $booking->doc_data_rilascio 
            ? \Carbon\Carbon::parse($booking->doc_data_rilascio)->format('d/m/Y') 
            : 'N/A'
        );

        $pdf->SetXY(55, 160);
        $pdf->Write(0, $booking->tel);

        $pdf->SetXY(120, 160);
        $pdf->Write(0, $booking->e_mail);

        // Map posizione to coordinates
        $positions = [
            'AVANTI'                   => [19, 199],
            'DIETRO'                   => [69, 199],
            'SINISTRA'                 => [119, 199],
            'DESTRA'                   => [157, 199],
            'FUNE DEDICATA AI BAMBINI' => [19, 209],
        ];

        if (isset($positions[$booking->posizione])) {
            [$x, $y] = $positions[$booking->posizione];
            $pdf->SetXY($x, $y);
            $pdf->Write(0, 'X');
        }

        // --- PAGE 2 (just template) ---
        if ($pageCount >= 2) {
            $pdf->AddPage();
            $tpl2 = $pdf->importPage(2);
            $pdf->useTemplate($tpl2, 0, 0, 210);
        }

        // Output as download
        return response($pdf->Output('S'))
            ->header('Content-Type', 'application/pdf')
            ->header(
                'Content-Disposition',
                "attachment; filename=domanda-di-partecipazione-minorenne-{$booking->booking_id}.pdf"
            );
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('bookings.index')
                        ->with('success', 'Prenotazione eliminata correttamente.');
    }

    public function exportCsv(Request $request)
    {
        $query = Booking::query();

        // Filtro search
        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(fn($q) =>
                $q->where('nome', 'LIKE', "%$s%")
                ->orWhere('cognome', 'LIKE', "%$s%")
            );
        }

        // Filtro tipo: adulti/minori
        $isMinor = false;
        if ($request->filled('type')) {
            if ($request->type === '0') {
                $query->whereNull('minore_nome');
            } elseif ($request->type === '1') {
                $query->whereNotNull('minore_nome');
                $isMinor = true;
            }
        }

        $bookings = $query->get();

        // Intestazione CSV
        $headers = $isMinor
            ? ['ID', 'MINORE_COGNOME', 'MINORE_NOME', 'MINORE_LUOGO_NASCITA', 'MINORE_DATA_NASCITA',
            'MINORE_LUOGO_RESIDENZA', 'MINORE_INDIRIZZO', 'MINORE_COD.FIS.',
            'COGNOME', 'NOME', 'LUOGO_NASCITA', 'DATA_NASCITA', 'LUOGO_RESIDENZA',
            'INDIRIZZO', 'COD.FIS.', 'DOC_TIPO', 'DOC_NUM', 'DOC_LUOGO_RILASCIO',
            'DOC_DATA_RILASCIO', 'TEL', 'E_MAIL', 'POSIZIONE']
            : ['ID', 'COGNOME', 'NOME', 'LUOGO_NASCITA', 'DATA_NASCITA',
            'LUOGO_RESIDENZA', 'INDIRIZZO', 'COD.FIS.', 'DOC_TIPO', 'DOC_NUM',
            'DOC_LUOGO_RILASCIO', 'DOC_DATA_RILASCIO', 'TEL', 'E_MAIL', 'POSIZIONE'];

        // Creazione contenuto CSV
        $callback = function() use ($bookings, $headers, $isMinor) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $headers);

            foreach ($bookings as $b) {
                $row = $isMinor
                    ? [
                        $b->booking_id, $b->minore_cognome, $b->minore_nome, $b->minore_luogo_nascita,
                        $b->minore_data_nascita, $b->minore_luogo_residenza, $b->minore_indirizzo,
                        $b->minore_cod_fis, $b->cognome, $b->nome, $b->luogo_nascita,
                        $b->data_nascita, $b->luogo_residenza, $b->indirizzo, $b->cod_fis,
                        $b->doc_tipo, $b->doc_num, $b->doc_luogo_rilascio,
                        $b->doc_data_rilascio, $b->tel, $b->e_mail, $b->posizione
                    ]
                    : [
                        $b->booking_id, $b->cognome, $b->nome, $b->luogo_nascita, $b->data_nascita,
                        $b->luogo_residenza, $b->indirizzo, $b->cod_fis, $b->doc_tipo,
                        $b->doc_num, $b->doc_luogo_rilascio, $b->doc_data_rilascio,
                        $b->tel, $b->e_mail, $b->posizione
                    ];

                fputcsv($file, $row);
            }
            fclose($file);
        };

        $filename = 'prenotazioni_' . now()->format('Ymd_His') . '.csv';

        return response()->streamDownload($callback, $filename, [
            'Content-Type' => 'text/csv',
            'Cache-Control' => 'no-store, no-cache',
        ]);
    }

    public function downloadAll(Request $request)
    {
        $date  = $request->input('date');
        $minor = $request->input('minor');
        $letter = $request->input('letter');

        // Query
        $query = Booking::whereDate('created_at', $date)
                    ->where('minor', $minor);
        
        if ($letter != '') {
            $query->where('cognome', 'LIKE', $letter . '%');
        }

        $bookings = $query->get();

        if ($bookings->isEmpty()) {
            return back()->withErrors(['msg' => 'Nessuna prenotazione trovata per i criteri selezionati.']);
        }

        $pdf = new Fpdi();

        foreach ($bookings as $booking) {
            if ($minor == 1) {
                // ---------------- Minorenne ----------------
                $pageCount = $pdf->setSourceFile(public_path('assets/temp/domanda-di-partecipazione-minorenne.pdf'));

                // --- PAGE 1 ---
                $pdf->AddPage();
                $tpl = $pdf->importPage(1);
                $pdf->useTemplate($tpl, 0, 0, 210);

                $pdf->SetFont('Helvetica', '', 12);
                $pdf->SetTextColor(0, 0, 0);

                // $pdf->SetXY(160, 28);
                // $pdf->Write(0, $booking->booking_id);

                // Map guardian to coordinates
                $guardians = [
                    'genitore'        => [19, 68],
                    'tutore'        => [44, 68],
                ];

                if (isset($guardians[$booking->guardian])) {
                    [$x, $y] = $guardians[$booking->guardian];
                    $pdf->SetXY($x, $y);
                    $pdf->Write(0, 'X');
                }

                $pdf->SetXY(80, 81);
                $pdf->Write(0, $booking->minore_cognome . ' ' . $booking->minore_nome);

                $pdf->SetXY(60, 88);
                $pdf->Write(0, $booking->minore_luogo_nascita);

                $pdf->SetXY(160, 88);
                $pdf->Write(0, $booking->minore_data_nascita 
                    ? \Carbon\Carbon::parse($booking->minore_data_nascita)->format('d/m/Y') 
                    : 'N/A'
                );

                $pdf->SetXY(45, 94);
                $pdf->Write(0, $booking->minore_luogo_residenza);

                $pdf->SetXY(110, 94);
                $pdf->Write(0, $booking->minore_indirizzo);

                $pdf->SetXY(80, 101);
                $pdf->Write(0, $booking->minore_cod_fis);

                $pdf->SetXY(80, 114);
                $pdf->Write(0, $booking->cognome . ' ' . $booking->nome);

                $pdf->SetXY(60, 121);
                $pdf->Write(0, $booking->luogo_nascita);

                $pdf->SetXY(160, 121);
                $pdf->Write(0, $booking->data_nascita 
                    ? \Carbon\Carbon::parse($booking->data_nascita)->format('d/m/Y') 
                    : 'N/A'
                );

                $pdf->SetXY(100, 127);
                $pdf->Write(0, $booking->luogo_residenza);

                $pdf->SetXY(60, 134);
                $pdf->Write(0, $booking->indirizzo);

                $pdf->SetXY(80, 140);
                $pdf->Write(0, $booking->cod_fis);

                $pdf->SetXY(95, 147);
                $pdf->Write(0, $booking->doc_tipo);

                $pdf->SetXY(150, 147);
                $pdf->Write(0, $booking->doc_num);

                $pdf->SetXY(65, 154);
                $pdf->Write(0, $booking->doc_luogo_rilascio);

                $pdf->SetXY(150, 154);
                $pdf->Write(0, $booking->doc_data_rilascio 
                    ? \Carbon\Carbon::parse($booking->doc_data_rilascio)->format('d/m/Y') 
                    : 'N/A'
                );

                $pdf->SetXY(55, 160);
                $pdf->Write(0, $booking->tel);

                $pdf->SetXY(120, 160);
                $pdf->Write(0, $booking->e_mail);

                $positions = [
                    'AVANTI'   => [19, 199],
                    'DIETRO'   => [69, 199],
                    'SINISTRA' => [119, 199],
                    'DESTRA'   => [157, 199],
                    'FUNE DEDICATA AI BAMBINI' => [19, 209],
                ];

                if (isset($positions[$booking->posizione])) {
                    [$x, $y] = $positions[$booking->posizione];
                    $pdf->SetXY($x, $y);
                    $pdf->Write(0, 'X');
                }

                // --- PAGE 2 ---
                if ($pageCount >= 2) {
                    $pdf->AddPage();
                    $tpl2 = $pdf->importPage(2);
                    $pdf->useTemplate($tpl2, 0, 0, 210);
                }
            } else {
                // ---------------- Maggiorenne ----------------
                $pageCount = $pdf->setSourceFile(public_path('assets/temp/domanda-di-partecipazione-maggiorenne.pdf'));

                // --- PAGE 1 ---
                $pdf->AddPage();
                $tpl = $pdf->importPage(1);
                $pdf->useTemplate($tpl, 0, 0, 210);

                $pdf->SetFont('Helvetica', '', 12);
                $pdf->SetTextColor(0, 0, 0);

                // $pdf->SetXY(160, 30);
                // $pdf->Write(0, $booking->booking_id);

                $pdf->SetXY(80, 60);
                $pdf->Write(0, $booking->cognome . ' ' . $booking->nome);

                $pdf->SetXY(60, 67);
                $pdf->Write(0, $booking->luogo_nascita);

                $pdf->SetXY(160, 67);
                $pdf->Write(0, $booking->data_nascita 
                    ? \Carbon\Carbon::parse($booking->data_nascita)->format('d/m/Y') 
                    : 'N/A'
                );

                $pdf->SetXY(100, 73);
                $pdf->Write(0, $booking->luogo_residenza);

                $pdf->SetXY(60, 80);
                $pdf->Write(0, $booking->indirizzo);

                $pdf->SetXY(80, 86);
                $pdf->Write(0, $booking->cod_fis);

                $pdf->SetXY(95, 93);
                $pdf->Write(0, $booking->doc_tipo);

                $pdf->SetXY(150, 93);
                $pdf->Write(0, $booking->doc_num);

                $pdf->SetXY(65, 100);
                $pdf->Write(0, $booking->doc_luogo_rilascio);

                $pdf->SetXY(150, 100);
                $pdf->Write(0, $booking->doc_data_rilascio 
                    ? \Carbon\Carbon::parse($booking->doc_data_rilascio)->format('d/m/Y') 
                    : 'N/A'
                );

                $pdf->SetXY(55, 106);
                $pdf->Write(0, $booking->tel);

                $pdf->SetXY(120, 106);
                $pdf->Write(0, $booking->e_mail);

                $positions = [
                    'AVANTI'   => [19, 173],
                    'DIETRO'   => [69, 173],
                    'SINISTRA' => [119, 173],
                    'DESTRA'   => [157, 173],
                ];

                if (isset($positions[$booking->posizione])) {
                    [$x, $y] = $positions[$booking->posizione];
                    $pdf->SetXY($x, $y);
                    $pdf->Write(0, 'X');
                }

                // --- PAGE 2 ---
                if ($pageCount >= 2) {
                    $pdf->AddPage();
                    $tpl2 = $pdf->importPage(2);
                    $pdf->useTemplate($tpl2, 0, 0, 210);
                }
            }
        }

        return response($pdf->Output('S'))
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', "attachment; filename=bookings-{$date}.pdf");
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'cognome',
        'nome',
        'luogo_nascita',
        'data_nascita',
        'luogo_residenza',
        'indirizzo',
        'cod_fis',
        'doc_tipo',
        'doc_num',
        'doc_luogo_rilascio',
        'doc_data_rilascio',
        'tel',
        'e_mail',
        'posizione',
    ];
}

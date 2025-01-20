<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class DataPengecekan
{
    protected $table = 'form_inputan';

    /**
     * Menyimpan data ke tabel.
     */
    public static function create(array $data)
    {
        return DB::table('form_inputan')->insert($data);
    }
}

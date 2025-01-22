<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class DataPengecekan
{

    public static function create($data)
    {
        return DB::table('form_inputan')->insert($data);
    }

    public static function find($npa)
    {
        return DB::table('form_inputan')->where('npa', $npa)->first();
    }

    public static function update($npa, $data)
    {
        return DB::table('form_inputan')->where('npa', $npa)->update($data);
    }
}

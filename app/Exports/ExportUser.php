<?php

namespace App\Exports;

use App\Models\Points;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportUser implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Points::select('SELECT * FROM tb_point')->get();
    }
}

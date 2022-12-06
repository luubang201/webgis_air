<?php

namespace App\Exports;

use App\Models\Points;
use Maatwebsite\Excel\Concerns\FromCollection;
use phpDocumentor\Reflection\Types\Collection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportPoint implements FromCollection, WithHeadings
{
    protected $pointsList;
    public function __construct($pointsList = [])
    {
        $this->pointsList = $pointsList;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        if (!empty($this->pointsList))
        {
            return  $this->pointsList;
        }
    }
    public function query()
    {
        return ProductList::query()->where('id', $this->id);
    }

    public function headings(): array
    {
        return ["id", "Số Hiệu Trạm", "x", "y", "epsg", "Tỉnh", "Huyện", "Xã", "Tên Trạm", "CO", "Humidity", "NO2", "O3", "Pressure", "PM10", "PM2.5", "SO2", "Temperature"];
    }
}

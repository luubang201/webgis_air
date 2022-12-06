<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class WebGis extends Model
{
    use HasFactory;
    protected $table ='tb_point';


    public function data(){
        return DB::select('select * from tb_point');

    }
}

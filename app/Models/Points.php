<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Points extends Model
{
    use HasFactory;

    protected $table ='tb_point';



    public function getAllPoint($filters=[], $keywords=null)
    {

        $points = DB::table($this->table)

        ->orderBy('tb_point.id','DESC');

        if (!empty($filters)){
            $points = $points->where($filters);
        }

        if (!empty($keywords)){
            $points = $points->where(function ($query) use ($keywords){
                $query->orWhere('SHKV', 'like', '%'.$keywords.'%');
            });
        }
        $points = $points->get();

        return $points;


     }

     public function addPoint($data){

     return DB::table($this->table)->insert($data);
    }


    public function getDetail($id){
        return DB::select('SELECT * FROM tb_point WHERE id=?',[$id]);
    }

    public function updatePoint($data, $id){
        // $data[] = $id;
        // return DB::update('UPDATE tb_point SET SHLK=?, x=?, y=?, X1=?, Y1=?, z=?, EPSG=?,Province=?, District=?, Commune=?, Detailed=?, Aquifer=?, depth=?, Well_screen=?, Diameter_screen=?, Static_water_level=?, TDS=?, Year_of_well_completion=?, Well_type=?, Project=?, Log=?, Log_scan=?, Pumping_test_scan=?, Water_quality_scan=?   WHERE id = ?',$data);
        return DB::table($this->table)->where('id',$id)->update($data);
    }

    public function deletePoint($id){
       return DB::delete('DELETE FROM tb_point WHERE id=?',[$id]);


    }
    // public function deletePoint($id){
    //     return DB::table($this->table)->where('id', $id)->delete();
    // }

}

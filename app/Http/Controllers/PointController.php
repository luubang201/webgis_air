<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\ExportPoint;

use App\Models\Points;
use DB;

use Maatwebsite\Excel\Facades\Excel;


class PointController extends Controller
{
    public function __contruct(){


    }
    protected $table ='tb_point';
    // Hiển thị tất cả điểm (GET)
public function readPoint(Request  $request){

    $this -> points = new Points();

    $filters = [];
    $keywords = null;

if (!empty($request->huyen)){
    $huyens = $request->huyen;
    $filters[]=['tb_point.huyen','=',$huyens];
}

if (!empty($request->xa)){
    $xas = $request->xa;

    $filters[]=['tb_point.xa','=',$xas];
}

if (!empty($request->keywords)){
    $keywords = $request->keywords;
}

    $pointsList = $this->points->getAllPoint($filters, $keywords);
    if ($request->action && $request->action == 'export')
        {
            return Excel::download(new ExportPoint($pointsList), 'data_table.xlsx');
        }


        return view('point.index', compact('pointsList'));

}
public function readPointClient(Request  $request){

    $this -> points = new Points();

    $filters = [];
    $keywords = null;

if (!empty($request->huyen)){
    $huyens = $request->huyen;
    $filters[]=['tb_point.huyen','=',$huyens];
}

if (!empty($request->xa)){
    $xas = $request->xa;

    $filters[]=['tb_point.xa','=',$xas];
}

if (!empty($request->keywords)){
    $keywords = $request->keywords;
}

    $pointsList = $this->points->getAllPoint($filters, $keywords);

        return view('point.indexclient', compact('pointsList'));

}


    // form bản đồ

    // Form thêm điểm (GET)
    public function formMap(){
        return view('point.bando');
    }

    public function formMapclient(){
        return view('point.bandoclient');
    }
    // Form thêm điểm (GET)
    public function formAdd(){
        return view('point.add');
    }

    public function login(){
        return view('point.login');
    }
    // Xem chi tiết điểm
    public function chitiet($id=0){
        $this -> points = new Points();
        if (!empty($id)){
            $pointDetail = $this->points->getDetail($id);
            if(!empty($pointDetail[0])){
                $pointDetail = $pointDetail[0];
            }else{
                return redirect()-> route('trangchu.index');
            }
        }else{
            return redirect()-> route('trangchu.index');
        }
        return view('point.chitiet', compact('pointDetail'));
    }

    // Thêm điểm (POST)
    public function addPoint(Request  $request){
        $this -> points = new Points();
        $request-> validate(
            [
                'SHKV' => 'required|min:3',
                'x' => 'required',
                'y' => 'required',
                'tinh' => 'required',
                'huyen' => 'required',
                'xa' => 'required',
                'ten' => 'required',
                'co' => 'required',
                'humidity' => 'required',
                'no2' => 'required',
                'o3' => 'required',
                'pressure' => 'required',
                'pm10' => 'required',
                'pm25' => 'required',
                'so2' => 'required',
                'temperature' => 'required',

            ],
            [
                'SHKV.required'=> 'Vui lòng điền số hiệu trạm',
                'SHKV.min' => 'Số hiệu trạm phải từ :min trở lên',
                'x.required' => 'Vui lòng điền trường này',
                'y.required' => 'Vui lòng điền trường này',
                'tinh.required' => 'Vui lòng điền trường này',
                'huyen.required' => 'Vui lòng điền trường này',
                'xa.required' => 'Vui lòng điền trường này',
                'ten.required' => 'Vui lòng điền trường này',
                'co.required' => 'Vui lòng điền trường này',
                'humidity.required' => 'Vui lòng điền trường này',
                'no2.required' => 'Vui lòng điền trường này',
                'o3.required' => 'Vui lòng điền trường này',
                'pressure.required' => 'Vui lòng điền trường này',
                'pm10.required' => 'Vui lòng điền trường này',
                'pm25.required' => 'Vui lòng điền trường này',
                'so2.required' => 'Vui lòng điền trường này',
                'temperature.required' => 'Vui lòng điền trường này',


            ]);
            $dataInsert = [
                // 'id'=> $request->id,
                'SHKV'=> $request->SHKV,
                'x'=> $request->x,
                'y'=> $request->y,
                'epsg'=> $request->epsg,
                'tinh'=> $request->tinh,
                'huyen'=> $request->huyen,
                'xa'=> $request->xa,
                'ten'=> $request->ten,
                'co'=> $request->co,
                'humidity'=> $request->humidity,
                'no2'=> $request->no2,
                'o3'=> $request->o3,
                'pressure'=> $request->pressure,
                'pm10' => $request->pm10,
                'pm25'=> $request->pm25,
                'so2'=> $request->so2,
                'temperature'=> $request->temperature,

            ];
            $this->points->addPoint($dataInsert);
            return redirect()->route('trangchu.index')->with('msg','Thêm thành công');


        }



    // Form sửa điểm (GET)
    public function formUpdate($id=0){
        $this -> points = new Points();
        if (!empty($id)){
            $pointDetail = $this->points->getDetail($id);
            if(!empty($pointDetail[0])){
                $pointDetail = $pointDetail[0];
            }else{
                return redirect()-> route('trangchu.index');
            }
        }else{
            return redirect()-> route('trangchu.index');
        }
        return view('point.edit', compact('pointDetail'));
    }

    // Sửa điểm theo id (POST)
    public function updatePoint(Request  $request, $id=0){
        $this -> points = new Points();
        $request-> validate(
            [
                'SHKV' => 'required|min:3',
                'x' => 'required',
                'y' => 'required',
                'tinh' => 'required',
                'huyen' => 'required',
                'xa' => 'required',
                'ten' => 'required',
                'co' => 'required',
                'humidity' => 'required',
                'no2' => 'required',
                'o3' => 'required',
                'pressure' => 'required',
                'pm10' => 'required',
                'pm25' => 'required',
                'so2' => 'required',
                'temperature' => 'required',
            ],
            [
                'SHKV.required'=> 'Vui lòng điền số hiệu trạm',
                'SHKV.min' => 'Số hiệu trạm phải từ :min trở lên',
                'x.required' => 'Vui lòng điền trường này',
                'y.required' => 'Vui lòng điền trường này',
                'tinh.required' => 'Vui lòng điền trường này',
                'huyen.required' => 'Vui lòng điền trường này',
                'xa.required' => 'Vui lòng điền trường này',
                'ten.required' => 'Vui lòng điền trường này',
                'co.required' => 'Vui lòng điền trường này',
                'humidity.required' => 'Vui lòng điền trường này',
                'no2.required' => 'Vui lòng điền trường này',
                'o3.required' => 'Vui lòng điền trường này',
                'pressure.required' => 'Vui lòng điền trường này',
                'pm10.required' => 'Vui lòng điền trường này',
                'pm25.required' => 'Vui lòng điền trường này',
                'so2.required' => 'Vui lòng điền trường này',
                'temperature.required' => 'Vui lòng điền trường này',



            ]);
            $dataUpdate = [

                'SHKV'=> $request->SHKV,
                'x'=> $request->x,
                'y'=> $request->y,
                'epsg'=> $request->epsg,
                'tinh'=> $request->tinh,
                'huyen'=> $request->huyen,
                'xa'=> $request->xa,
                'ten'=> $request->ten,
                'co'=> $request->co,
                'humidity'=> $request->humidity,
                'no2'=> $request->no2,
                'o3'=> $request->o3,
                'pressure'=> $request->pressure,
                'pm10' => $request->pm10,
                'pm25'=> $request->pm25,
                'so2'=> $request->so2,
                'temperature'=> $request->temperature,
            ];
         $this->points->updatePoint($dataUpdate, $id);
         return redirect()->route('trangchu.form-update',['id'=>$id]);
    }



    // Xóa điểm (DELETE)
    public function detelePoint($id){
        $this -> points = new Points();
        $this->points->deletePoint($id);

        return redirect()->route('trangchu.index');



    }


    // Excel
    public function xuatexcel(){
    //     $tab_hanhnghekhoanss= DB::table($this->table)->orderBy('id','ASC')->get();

        
    //     $customer_array[] = array('STT','ID', 'Số hiệu trạm','Tên', 'Xã', 'Huyện', 'Tỉnh', 'NO2', 'CO', 'Humidity', 'O3', 'Pressure', 'PM10', 'PM2_5', 'SO2', 'Temperature' );
    
    //     $stt=1;
    //     foreach($tab_hanhnghekhoanss as $customer)
    //     {  
        
    
    
    //      $customer_array[] = array(
    
    //         'STT'=>$stt++,
    //         'ID' => $customer->id,
    //         'Số hiệu trạm' => $customer->SHKV,
    //         'Tên' => $customer->ten,
    //         'Xã' => $customer->xa,
    //         'Huyện' => $customer->huyen,
    //         'Tỉnh' => $customer->tinh,
    //         'NO2' => $customer->no2,
    //         'CO' => $customer->co,
    //         'Humidity' => $customer->humidity,
    //         'O3' => $customer->o3,
    //         'Pressure' => $customer->pressure,
    //         'PM10' => $customer->pm10,
    //         'PM2_5' => $customer->pm25,
    //         'SO2' => $customer->so2,
    //         'Temperature' => $customer->temperature,
            

            
    //     );
        
    //  }
    
    //  Excel::download('datadownload', function($excel) use ($customer_array){
    //     $excel->setTitle('datadownload');
    //     $excel->sheet('datadownload', function($sheet) use ($customer_array){
    //         $sheet->fromArray($customer_array, null, 'A1', false, false);
    //     });
    // })->download('xlsx');

    // Excel::create('Export data', function($excel) {

    //     $excel->sheet('Sheet', function($sheet) {
    //     $data = DB::table($this->table)->orderBy('id','ASC')->get();
  
    //      $sheet->fromArray($data);
    //     });
    //   })->download('xls');

    
}

public function exportUsers(Request $request){
    return Excel::download(new ExportPoint, 'datadowload.xlsx');
}
}

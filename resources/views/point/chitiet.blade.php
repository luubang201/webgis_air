@extends('layoutclient.point')
@section('title')
    Chi tiết trạm khí tượng
@endsection
@section('content')
    @if (session('msg'))
        <div class="alert alert-susscess">{{session('msg')}}</div>
    @endif
    
    <div class="container">

        <div class="card card-primary">
            <div class="card-header">
                <h3 >CHI TIẾT TRẠM KHÍ TƯỢNG </h3>
            </div>
            <form method="POST" action="">
                <div class="card-body">

                    <div class="form-group">
                        <label for="">Số hiệu trạm khí tượng </label>
                        <input type="text" class="form-control"  name="SHKV" value="{{$pointDetail->SHKV}}" autofocus="true" readonly placeholder="Chưa có số hiệu trạm ">
                        
                        
                    </div>
                    <div class="form-group">
                        <label for=""> Tên trạm</label>
                        <input type="text" class="form-control"  name="" value="{{$pointDetail->ten}}" autofocus="true" readonly placeholder="Chưa có dữ liệu">
                        
                        
                    </div>
                    <div class="form-group">
                        <label for=""> Tọa độ x</label>
                        <input type="text" class="form-control"  name="" value="{{$pointDetail->y}}" autofocus="true" readonly placeholder="Chưa có dữ liệu">
                        
                        
                    </div>
                    <div class="form-group">
                        <label for=""> Tọa độ y</label>
                        <input type="text" class="form-control"  name="" value="{{$pointDetail->x}}" autofocus="true" readonly placeholder="Chưa có dữ liệu">
                        
                        
                    </div>

                    <div class="form-group">
                        <label for=""> Hệ tọa độ</label>
                        <input type="text" class="form-control"  name="" value="{{$pointDetail->epsg}}" autofocus="true" readonly placeholder="Chưa có dữ liệu">
                        
                        
                    </div>
                    <div class="form-group">
                        <label for="">Vị trí</label>
                        <input type="text" class="form-control"  name="" value="{{$pointDetail->xa}}, {{$pointDetail->huyen}}, {{$pointDetail->tinh}}" autofocus="true" readonly placeholder="Chưa có dữ liệu">
                        
                        
                    </div>
                    <div class="form-group">
                        <label for="">NO2</label>
                        <input type="text" class="form-control"  name="" value="{{$pointDetail->no2}}" autofocus="true" readonly placeholder="Chưa có dữ liệu">
                        
                        
                    </div>
                    <div class="form-group">
                        <label for=""> CO</label>
                        <input type="text" class="form-control"  name="" value="{{$pointDetail->co}}" autofocus="true" readonly placeholder="Chưa có dữ liệu">
                        
                        
                    </div>
                    <div class="form-group">
                        <label for="">Humidity</label>
                        <input type="text" class="form-control"  name="" value="{{$pointDetail->humidity}}" autofocus="true" readonly placeholder="Chưa có dữ liệu">
                        
                        
                    </div>
                    <div class="form-group">
                        <label for="">O3</label>
                        <input type="text" class="form-control"  name="" value="{{$pointDetail->o3}}" autofocus="true" readonly placeholder="Chưa có dữ liệu">
                        
                        
                    </div>
                    <div class="form-group">
                        <label for="">Pressure</label>
                        <input type="text" class="form-control"  name="" value="{{$pointDetail->pressure}}" autofocus="true" readonly placeholder="Chưa có dữ liệu">
                        
                        
                    </div>
                    <div class="form-group">
                        <label for="">PM10</label>
                        <input type="text" class="form-control"  name="" value="{{$pointDetail->pm10}}" autofocus="true" readonly placeholder="Chưa có dữ liệu">
                        
                        
                    </div>
                    <div class="form-group">
                        <label for="">PM2_5</label>
                        <input type="text" class="form-control"  name="" value="{{$pointDetail->pm25}}" autofocus="true" readonly placeholder="Chưa có dữ liệu">
                        
                        
                    </div>
                    <div class="form-group">
                        <label for="">SO2</label>
                        <input type="text" class="form-control"  name="" value="{{$pointDetail->so2}}" autofocus="true" readonly placeholder="Chưa có dữ liệu">
                        
                        
                    </div>
                    <div class="form-group">
                        <label for="">Temperature</label>
                        <input type="text" class="form-control"  name="" value="{{$pointDetail->temperature}}" autofocus="true" readonly placeholder="Chưa có dữ liệu">
                        
                    </div>  
                </div>
            </form>
        </div>

    </div>
@endsection



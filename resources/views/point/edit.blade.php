@extends('layout.point')
@section('title')
    Trang thêm điểm
@endsection
@section('content')
    @if (session('msg'))
        <div class="alert alert-susscess">{{session('msg')}}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">Dữ liệu nhập vào không hợp lệ. Vui long nhập lại</div>
    @endif
    <div class="container">

        <div class="card card-primary">
            <div class="card-header">
                <h3 >UPDATE POINT</h3>
            </div>
            <form method="POST" action="">
                <div class="card-body">

                    <div class="form-group">
                        <label for="">SHKV </label>
                        <input type="text" class="form-control"  name="SHKV" value="{{$pointDetail->SHKV}}" autofocus="true" placeholder="Nhập số hiệu trạm">
                        @error('SHKV')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for=""> x(WGS84) </label>
                        <input type="text" class="form-control"  name="x" autofocus="true" value="{{$pointDetail->x}}" placeholder="Nhập tọa độ X (WGS84)" >
                        @error('x')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for=""> y(WGS84) </label>
                        <input type="text" class="form-control"  name="y" autofocus="true" value="{{$pointDetail->y}}" placeholder="Nhập tọa độ Y (WGS84)" >
                        @error('y')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for=""> Chọn hệ tọa độ </label>
                        <select name="epsg" class="form-control">
                            <option value="3405" {{old('epsg')==3405||$pointDetail->epsg==3405?'selected':false}}> 3405 </option>
                            <option value="4326" {{old('epsg')==4326||$pointDetail->epsg==4326?'selected':false}}> 4326 </option>
                        </select>

                    </div>
                    <div class="form-group">
                        <label for=""> Tỉnh </label>
                        <select class="form-control" name="tinh">
                            <option value="0">-Chọn tỉnh-</option>
                            <option value="Đà Nẵng" {{old('tinh')=='Đà Nẵng'||$pointDetail->tinh=='Đà Nẵng'?'selected':false}}>Đà Nẵng</option>
                        </select>
                        @error('tinh')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for=""> Huyện </label>
                        <input type="text" class="form-control"  name="huyen" autofocus="true" value="{{$pointDetail->huyen}}" placeholder="Nhập huyện" >
                        @error('huyen')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for=""> Xã </label>
                        <input type="text" class="form-control"  name="xa" autofocus="true" value="{{$pointDetail->xa}}" placeholder="Nhập xã" >
                        @error('xa')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for=""> Tên Trạm </label>
                    <input type="text" class="form-control"  name="ten" autofocus="true" value="{{$pointDetail->ten}}" placeholder="Nhập tên trạm" >
                    @error('ten')
                    <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for=""> CO </label>
                        <input type="text" class="form-control"  name="co" autofocus="true" value="{{$pointDetail->co}}" placeholder="Nhập chỉ số CO"  >
                        @error('co')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Humidity </label>
                        <input type="text" class="form-control"  name="humidity" autofocus="true" value="{{$pointDetail->humidity}}" placeholder="Nhập chỉ số Humidity" >
                        @error('humidity')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">NO2 </label>
                        <input type="text" class="form-control"  name="no2" autofocus="true" value="{{$pointDetail->no2}}" placeholder="Nhập chỉ số NO2" >
                        @error('no2')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for=""> O3 </label>
                        <input type="text" class="form-control"  name="o3" autofocus="true" value="{{$pointDetail->o3}}" placeholder="Đường chỉ số O3" >
                        @error('o3')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for=""> Pressure </label>
                        <input type="text" class="form-control"  name="pressure" autofocus="true" value="{{$pointDetail->pressure}}" placeholder="Nhập chỉ số Pressure" >
                        @error('pressure')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">  PM10 </label>
                        <input type="text" class="form-control"  name="pm10" value="{{$pointDetail->pm10}}" autofocus="true" placeholder="Nhập chỉ số PM10" >
                        @error('pm10')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for=""> PM2_5 </label>
                        <input type="text" class="form-control"  name="pm25"  value="{{$pointDetail->pm25}}" autofocus="true" placeholder="Nhập chỉ số PM2_5" >
                        @error('pm25')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for=""> SO2 </label>
                        <input type="text" class="form-control"  name="so2" autofocus="true" value="{{$pointDetail->so2}}" placeholder="Nhập chỉ số SO2" >
                        @error('so2')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for=""> Temperature </label>
                        <input type="text" class="form-control"  name="temperature" autofocus="true" value="{{$pointDetail->temperature}}" placeholder="Nhập chỉ số Temperature" >
                        @error('temperature')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary" name="">Submit</button>
                        <a href="{{route('trangchu.index')}}" class="btn btn-warning"> Quay lại trang chủ</a>
                        @csrf
                    </div>
                </div>
            </form>
        </div>

    </div>



@endsection



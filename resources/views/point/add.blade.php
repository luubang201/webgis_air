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
                <h3 >ADD POINT TO MAPS</h3>
            </div>
            <form method="POST" action="">
                    <div class="form-group">
                        <label for="">SHT </label>
                        <input type="text" class="form-control"  name="SHKV" autofocus="true" placeholder="Nhập số hiệu Trạm">
                    @error('SHKV')
                        <span style="color: red">{{$message}}</span>
                    @enderror
                    </div>

                    <div class="form-group">
                        <label for=""> x(WGS84) </label>
                        <input type="text" class="form-control"  name="x" autofocus="true" placeholder="Nhập tọa độ X (WGS84)" >
                        @error('x')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for=""> y(WGS84) </label>
                        <input type="text" class="form-control"  name="y" autofocus="true" placeholder="Nhập tọa độ Y (WGS84)" >
                        @error('y')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>

                <div class="form-group">
                    <label for=""> Chọn Hệ tọa độ </label>
                    <select name="epsg" class="form-control">
                        <option value="3405" {{old('epsg')==3405?'selected':false}}> 3405 </option>
                        <option value="4326" {{old('epsg')==4326?'selected':false}}> 4326 </option>
                    </select>

                </div>
                <div class="form-group">
                    <label for=""> Tỉnh </label>
                    <select class="form-control" name="tinh">
                        <option value="0">-Chọn tỉnh-</option>
                        <option value="Đà Nẵng" {{old('tinh')=='Đà Nẵng'?'selected':false}}>Đà Nẵng</option>
                    </select>
                    @error('tinh')
                    <span style="color: red">{{$message}}</span>
                    @enderror
                </div>
                    <div class="form-group">
                        <label for=""> Huyện </label>
                        <select class="form-control" name="huyen">
                            <option value="0">-Chọn huyện-</option>
                            <option value="Liên Chiểu" {{old('huyen')=='Liên Chiểu'?'selected':false}}>Liên Chiểu</option>
                            <option value="Hòa Vang"{{old('huyen')=='Hòa Vang'?'selected':false}}>Hòa Vang</option>
                            <option value="Hải Châu"{{old('huyen')=='Hải Châu'?'selected':false}}>Hải Châu</option>
                            <option value="Sơn Trà"{{old('huyen')=='Sơn Trà'?'selected':false}}>Sơn Trà</option>
                            <option value="Ngũ Hành Sơn"{{old('huyen')=='Ngũ Hành Sơn'?'selected':false}}>Ngũ Hành Sơn</option>
                        </select>
                        @error('huyen')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for=""> xa </label>
                        <select class="form-control" name="xa">
                            <option value="0">-Chọn xa-</option>
                            <option value="Hòa Hiệp Bắc" {{old('xa')=='Hòa Hiệp Bắc'?'selected':false}}>Hòa Hiệp Bắc</option>
                            <option value="Hòa Liên"{{old('xa')=='Hòa Liên'?'selected':false}}>Hòa Liên</option>
                            <option value="Hòa Khánh Nam"{{old('xa')=='Hòa Khánh Nam'?'selected':false}}>Hòa Khánh Nam</option>
                            <option value="Hòa Sơn"{{old('xa')=='Hòa Sơn'?'selected':false}}>Hòa Sơn</option>
                            <option value="Hòa Thuận Nam"{{old('xa')=='Hòa Thuận Nam'?'selected':false}}>Hòa Thuận Nam</option>
                            <option value="Phước Mỹ"{{old('xa')=='Phước Mỹ'?'selected':false}}>Phước Mỹ</option>
                            <option value="Hòa Tiến"{{old('xa')=='Hòa Tiến'?'selected':false}}>Hòa Tiến</option>
                            <option value="Hòa Hải"{{old('xa')=='Hòa Hải'?'selected':false}}>Hòa Hải</option>
                            <option value="Long An"{{old('xa')=='Long An'?'selected':false}}>Long An</option>
                            <option value="Hòa Khương"{{old('xa')=='Hòa Khương'?'selected':false}}>Hòa Khương</option>
                            <option value="Hòa Ninh"{{old('xa')=='Hòa Ninh'?'selected':false}}>Hòa Ninh</option>
                        </select>
                        @error('xa')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for=""> Tên Trạm </label>
                        <input type="text" class="form-control"  name="ten" autofocus="true" placeholder="Nhập tên Trạm" >
                        @error('ten')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for=""> CO </label>
                        <input type="text" class="form-control"  name="co" autofocus="true" placeholder="Nhập chỉ số CO" >
                        @error('co')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for=""> Humidity </label>
                        <input type="text" class="form-control"  name="humidity" autofocus="true" placeholder="Nhập chỉ số Humidity"  >
                        @error('humidity')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">NO2 </label>
                        <input type="text" class="form-control"  name="no2" autofocus="true" placeholder="Nhập chỉ số NO2" >
                        @error('no2')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">O3 </label>
                        <input type="text" class="form-control"  name="o3" autofocus="true" placeholder="Nhập chỉ số O3" >
                        @error('o3')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for=""> Pressure </label>
                        <input type="text" class="form-control"  name="pressure" autofocus="true" placeholder="Nhập chỉ số Pressure" >
                        @error('pressure')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for=""> PM10 </label>
                        <input type="text" class="form-control"  name="pm10" autofocus="true" placeholder="Nhập chỉ số PM10" >
                        @error('pm10')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">PM2_5  </label>
                        <input type="text" class="form-control"  name="pm25" autofocus="true" placeholder="Nhập chỉ sô PM2_5 " >
                        @error('pm25')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for=""> SO2</label>
                        <input type="text" class="form-control"  name="so2" autofocus="true" placeholder="Nhập chỉ số SO2" >
                        @error('so2')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for=""> Temperature </label>
                        <input type="text" class="form-control"  name="temperature" autofocus="true" placeholder="Nhập chỉ số Temperature" >
                        @error('temperature')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary" name="">Submit</button>
                        @csrf
                    </div>
                </div>
            </form>
        </div>

</div>



@endsection

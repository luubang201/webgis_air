@extends('layout.point')
@section('title')
    Trang quản lý
@endsection
@section('content')

<form action="" method="GET" class="mb-3">
<div class="row">

    <div class="col-4">
        <select class="form-control" name="huyen">
            <option value="0">-Quận, Huyện-</option>
            <option value="Hải Châu" {{request()->huyen=='Hải Châu'?'selected':false}}>Hải Châu</option>
            <option value="Cẩm Lệ" {{request()->huyen=='Cẩm Lệ'?'selected':false}}>Cẩm Lệ</option>
            <option value="Thanh Khê" {{request()->huyen=='Thanh Khê'?'selected':false}}>Thanh Khê</option>
            <option value="Liên Chiểu" {{request()->huyen=='Liên Chiểu'?'selected':false}}>Liên Chiểu</option>
            <option value="Ngũ Hành Sơn" {{request()->huyen=='Ngũ Hành Sơn'?'selected':false}}>Ngũ Hành Sơn</option>
            <option value="Sơn Trà" {{request()->huyen=='Sơn Trà'?'selected':false}}>Sơn Trà</option>
            <option value="Hòa Vang" {{request()->huyen=='Hòa Vang'?'selected':false}}>Hòa Vang</option>
            <option value="Hoàng Sa" {{request()->huyen=='Hoàng Sa'?'selected':false}}>Hoàng Sa</option>
            
        </select>
    </div>
   <div class="col-4">
       <select class="form-control" name="xa">
           <option value="0">-Xã, Phường-</option>
           <option value="Hòa Bắc"{{request()->xa=='Hòa Bắc'?'selected':false}}>Hòa Bắc</option>
           <option value="Hiệp Hòa Bắc"{{request()->xa=='Hiệp Hòa Bắc'?'selected':false}}>Hiệp Hòa Bắc</option>
           <option value="Hòa Liên"{{request()->xa=='Hòa Liên'?'selected':false}}>Hòa Liên</option>
           <option value="Hòa Khánh Nam"{{request()->xa=='Hòa Khánh Nam'?'selected':false}}>Hòa Khánh Nam</option>
           <option value="Hòa Sơn"{{request()->xa=='Hòa Sơn'?'selected':false}}>Hòa Sơn</option>
           <option value="Hòa Thuận Nam"{{request()->xa=='Hòa Thuận Nam'?'selected':false}}>Hòa Thuận Nam</option>
           <option value="Hòa Tiến"{{request()->xa=='Hòa Tiến'?'selected':false}}>Hòa Tiến</option>
           <option value="Hòa Khải"{{request()->xa=='Hòa Khải'?'selected':false}}>Hòa Khải</option>
           <option value="Hòa Khương"{{request()->xa=='Hòa Khương'?'selected':false}}>Hòa Khương</option>
           <option value="Hòa Ninh"{{request()->xa=='Hòa Ninh'?'selected':false}}>Hòa Ninh</option>
           <option value="Phước Mỹ"{{request()->xa=='Phước Mỹ'?'selected':false}}>Phước Mỹ</option>
           
       </select>
   </div>
    <div class="col-4">
        <input type="search" name="keywords" class="form-control" value="{{request()->keywords}}" placeholder="Nhập số hiệu trạm...">
    </div>
    
    <div class="col-4" style="margin:auto; padding: 20px 100px">
        <button type="submit"  name="action" value="search" class="btn btn-primary btn-block">Tìm kiếm</button>
        <button type="submit" name="action" value="export" class="btn btn-primary btn-block">Xuất dữ liệu</button>
    </div>
    
</div>
</form>

<table class="table table-bordered">
    <thead>
        <tr class="table-success">
            {{-- <th>STT</th> --}}
            <th>ID</th>
            <th>Số hiệu trạm</th>
            <th>Tên Trạm</th>
            <th>x(WGS84)</th>
            <th>y(WGS84)</th>
            <th>Hệ tọa độ</th>
            <th class="mw-10">Vị trí</th>
            {{-- <th class="mw-10">huyen</th>
            <th class="mw-10">xa</th> --}}
            
            {{-- <th>CO</th>
            <th>Humidity</th>
            <th >NO2 </th>
            <th>O3</th>
            <th>Pressure</th>
            <th>PM10</th>
            <th>PM2_5</th>
            <th class="mw-7">SO2</th>
            <th >Temperature</th> --}}
            <th class="mw-15" >Thao tác</th>
            
        </tr>
    </thead>
    <tbody>
        @if (!@empty($pointsList))
        @foreach ($pointsList as $key=>$item)
    <tr style="text-align: center">
        {{-- <td>{{$key+1}}</td> --}}
        <td>{{$item->id}}</td>
        <td>{{$item->SHKV}}</td>
        <td>{{$item->ten}}</td>
        <td>{{$item->x}}</td>
        <td>{{$item->y}}</td>
        <td>{{$item->epsg}}</td>
        <td>{{$item->xa}}, {{$item->huyen}}, {{$item->tinh}}</td>
        {{-- <td>{{$item->huyen}}</td> --}}
        {{-- <td>{{$item->xa}}</td> --}}
        
        {{-- <td>{{$item->co}}</td>
        <td>{{$item->humidity}}</td>
        <td>{{$item->no2}}</td>
        <td>{{$item->o3}}</td>
        <td>{{$item->pressure}}</td>
        <td>{{$item->pm10}}</td>
        <td>{{$item->pm25}}</td>
        <td>{{$item->so2}}</td>
        <td >{{$item->temperature}}</td> --}}
        <td style="text-align: center">
            <a href="{{route('trangchu.form-update',['id'=>$item->id])}}" class="btn btn-warning btn-sm">Sửa</a>
        
        
            <a href="{{route('trangchu.delete',['id'=>$item->id])}}" class="btn btn-danger btn-sm" onclick=" return confirm('Chắc chắn muốn xóa Điểm này?')">Xóa</a>

            <a href="{{route('trangchu.chitiet',['id'=>$item->id])}}" class="btn btn-success btn-sm" >Chi tiết</a>
        </td>
    </tr>
        @endforeach
        @else
    <tr>
        <td>Không có dữ liệu</td>
    </tr>
        @endif
    </tbody>
</table>

<script src="{{asset('js/exportToExcel.js')}}"></script>
@endsection


<link rel="stylesheet" href="{{asset('assets/backend/css/style.css')}}">
<div class="sidebar-container" >
    <div class="sidebar-logo">
      <a href="{{ route('trangchu.index') }}" style="color: black">WELCOME DA NANG</a>
    </div>
    <ul class="sidebar-navigation">
      <li class="header"></li>
      <li>
        <a href="{{route('trangchu.form-map')}}">
          <i class="fa fa-cog" aria-hidden="true"></i> Trang chủ
        </a>
      </li>

      <li>
        <a href="{{route('trangchu.form-add')}}">
          <i class="fa fa-tachometer" aria-hidden="true"></i> Thêm điểm
        </a>
      </li>

      <li>
        <a href="{{ route('trangchu.index') }}">
          <i class="fa fa-home" aria-hidden="true"></i> Dữ liệu
        </a>
      </li>

      <!-- <li>
        <a href="{{route('trangchu.xuatexcel')}}" >
          <i class="fa fa-users" aria-hidden="true"></i> Xuất Excel
        </a>
      </li> -->
     
    </ul>
  </div>



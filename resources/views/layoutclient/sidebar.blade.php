<link rel="stylesheet" href="{{asset('assets/backend/css/style.css')}}">
<div class="sidebar-container" >
    <div class="sidebar-logo">
      <a href="{{ route('trangchu.indexclient') }}" style="color: black">WELCOME DA NANG</a>
    </div>
    <ul class="sidebar-navigation">
      <li class="header"></li>
      <li>
        <a href="{{route('trangchu.form-map-client')}}">
          <i class="fa fa-cog" aria-hidden="true"></i> Trang Chủ
        </a>
      </li>

      <li>
        <a href="{{route('trangchu.indexclient') }}">
          <i class="fa fa-home" aria-hidden="true"></i> Dữ Liệu
        </a>
    </li>
    

    </ul>
  </div>



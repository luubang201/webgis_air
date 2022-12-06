<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') Dữ liệu nhập vào không hợp lệ. Vui long nhập lại</title>
    <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/style.css')}}">
</head>
<body>

    <main class="">
        <div class="" >
            <div class="row" style="gap: 5em">
                <div class="col-2">
                    <aside>
                        @include('layout.sidebar')
                    </aside>
                </div>
                <div class="col-10">
                    @include('layout.header')
                    <div class="content">
                        @yield('content')
                    </div>
                    <footer>
                        @include('layout.footer')
                    </footer>
                </div>
            </div>

        </div>

    </main>

    <script src="{{asset('assets/backend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/backend/js/custom.js')}}"></script>

    
</body>
</html>

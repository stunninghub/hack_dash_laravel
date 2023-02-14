<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{URL::asset('/assets/css/style.css')}}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>@yield('title')</title>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body>
    @include('header')
    <div class="hack_dash_control_header">
        <div class="d-flex justify-content-between">
            <div class="user_info_wrap">
                <div class="menu_toggle_btn">
                    <img src="{{URL::asset('/assets/img/menu_bars.svg')}}" alt="">
                </div>
                <div class="greetings">
                    Welcome {{ $user_name }}
                </div>
            </div>
            <span>
                <a href="{{ url('/logout') }}" style="color:#fff;">
                    Logout
                </a>
            </span>
        </div>
    </div>
    <div class="hack_dash_control_panel">
        <div class="hack_dash_control_left_wrap">
            @include('sidebar')
        </div>
        <div class="hack_dash_control_right_wrap">
            @yield('content')
        </div>
    </div>

    <script src="{{URL::asset('/assets/js/hd_script.js')}}"></script>
    <script>
        $('.menu_toggle_btn').click(function(){
            $('.hack_dash_side_items').toggleClass('slim');
        });
    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{URL::asset('/assets/css/style.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.3.1/tinymce.min.js" integrity="sha512-eV68QXP3t5Jbsf18jfqT8xclEJSGvSK5uClUuqayUbF5IRK8e2/VSXIFHzEoBnNcvLBkHngnnd3CY7AFpUhF7w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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

    <div class="hd_confirm_pop">
        <div class="hd_confirm_pop_inner">
            <div class="hd_confirm_title">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit.
            </div>
            <div class="hd_confirm_choices">
                <button class="hd_btn_primary hd_confirm_positive">Confirm</button>
                <button class="hd_btn_secondary hd_confirm_negative">Cancel</button>
            </div>
        </div>
    </div>
    <script src="{{URL::asset('/assets/js/hd_script.js')}}"></script>
    <script>
        $('.menu_toggle_btn').click(function() {
            $('.hack_dash_side_items').toggleClass('slim');
        });



        var hd_confirm_positive_callback = "";

        function hd_confirm(title = null, callback = null) {
            title = (title != null) ? title : "Are you sure?";
            jQuery('.hd_confirm_title').text(title);
            jQuery('.hd_confirm_pop').addClass('active');

            hd_confirm_positive_callback = function() {
                if (callback != null) {
                    callback();
                }
                jQuery('.hd_confirm_pop').removeClass('active');
                jQuery('.hd_confirm_title').text("");
                // console.log(jQuery._data(document.querySelector('.hd_confirm_positive'), "events"));
                if (jQuery._data(document.querySelector('.hd_confirm_positive'), "events")) {
                    $('.hd_confirm_positive').off('click');
                }
                if (jQuery._data(document.querySelector('.hd_confirm_negative'), "events")) {
                    $('.hd_confirm_negative').off('click');
                }
            }
            jQuery('.hd_confirm_positive').on('click', hd_confirm_positive_callback);

            hd_confirm_negative_callback = function() {
                jQuery('.hd_confirm_pop').removeClass('active');
                jQuery('.hd_confirm_title').text("");
                if (jQuery._data(document.querySelector('.hd_confirm_negative'), "events")) {
                    $('.hd_confirm_negative').off('click');
                }
                if (jQuery._data(document.querySelector('.hd_confirm_positive'), "events")) {
                    $('.hd_confirm_positive').off('click');
                }
            }
            jQuery('.hd_confirm_negative').on('click', hd_confirm_negative_callback);

        }

        function hd_notice(title, type = null) {
            var notice_badge = "";
            switch (type) {
                case "positive":
                    notice_badge = "positive"
                    break;
                case "danger":
                    notice_badge = "danger"
                    break;
                case "warning":
                    notice_badge = "warning"
                    break;
                default:
                    notice_badge = ""
                    break;
            }
            $('.hd_notice_wrap').append(`<div class="hd_notice_item ${notice_badge}">${title}<span class="close_btn">&times;</span></div>`);
        }

        $(document).on('click', '.hd_notice_item .close_btn', function() {
            $(this).parent().remove();
        });

        tinymce.init({
            selector: ".hd_post_editro_field",
            plugins: "",
            height: '400px',
            toolbar_sticky: true,
            icons: 'thin',
            autosave_restore_when_empty: true,
        });
    </script>
</body>

</html>
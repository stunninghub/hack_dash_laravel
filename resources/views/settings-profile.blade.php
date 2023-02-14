@extends('adminbase')

@section('title')
Profile
@endsection
@section('content')

<div class="hd_dashboard_wrap">
    <div class="hd_dash_settings_wrap">
        @include('settings-sidebar')
        <div class="hd_dash_settings_content">
            <div class="hd_dash_settings_content_title">
                <h5>Profile</h5>
            </div>
            <div class="hd_dash_settings_content_wrap">
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Necessitatibus, atque. Magnam maiores tenetur accusamus ex. Quod quo labore neque distinctio incidunt dolorum a, id sint autem tempore rem, officia facere.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
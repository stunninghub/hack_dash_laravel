@extends('adminbase')

@section('title')
Profile
@endsection

@section('content')
<div class="hd_dashboard_wrap">
    <div class="hd_adm_title_wrap">
        <h2>My Profile</h2>
    </div>
    <div class="hd_profile_form_wrap">
        <div class="hd_profile_form">
            <div class="hd_field_wrap">
                <label for="fullname">Full name:</label>
                <input type="text" name="fullname" id="fullname" class="hd_field">
            </div>
            <div class="hd_field_wrap">
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" class="hd_field">
            </div>
            <div class="hd_field_wrap">
                <button class="hd_btn_primary">Save Changes</button>
            </div>
        </div>
    </div>
</div>
@endsection
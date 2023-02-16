@extends('adminbase')

@section('title')
Users
@endsection

@section('content')
<h5 style="display: inline;margin-right: 10px;">All Users</h5>
<div class="hd_dashboard_wrap">
    <div class="hd_mang_posts_table_wrap">
        <div class="hd_posts_table_inner">
            <table class="hd_posts_table">
                <thead class="hd_table_head">
                    <tr class="hd_tr">
                        <th class="hd_th">ID</th>
                        <th class="hd_th">Email</th>
                        <th class="hd_th">Created at</th>
                        <th class="hd_th">Updated at</th>
                    </tr>
                </thead>

                <tbody class="hd_table_body hd_dash_all_users_wrap">
                    @foreach($all_usrs as $user)
                    <tr class="hd_tr hd_dash_user_item">
                        <td class="hd_td">{{ $user->id }}</td>
                        <td class="hd_td">{{ $user->email }} <span class="hd_dash_tbl_remove_user" hd-data-usr_id="{{ $user->id }}"><img src="{{URL::asset('/assets/img/remove_user.svg')}}" alt=""></span></td>
                        <td class="hd_td">{{ $user->created_at }}</td>
                        <td class="hd_td">{{ $user->updated_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <div class="dmy_txt"></div>
                <button class="hd_btn_primary" onclick="hd_confirm('This is notice message...', add_test_text);">Click me</button>
                <button class="hd_btn_secondary" onclick="hd_confirm('This is notice message...', add_test_2_text);">Click 2 me</button>
            </table>
        </div>
    </div>
</div>

<script>
    function add_test_text() {
        jQuery('.dmy_txt').append('Alert Triggerd<br><br>');
    }

    function add_test_2_text() {
        jQuery('.dmy_txt').append('Alert Two Triggerd<br>');
    }
</script>
@endsection
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
                        <td class="hd_td">{{ $user->email }}
                            @if($user->id != $user_id)
                            <span class="hd_dash_tbl_remove_user" hd-data-usr_id="{{ $user->id }}">
                                <img src="{{URL::asset('/assets/img/remove_user.svg')}}" alt="" style="pointer-events: none;">
                            </span>
                            @endif
                        </td>
                        <td class="hd_td">{{ $user->created_at }}</td>
                        <td class="hd_td">{{ $user->updated_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    jQuery('.hd_dash_tbl_remove_user').click(function() {
        var this_btn = jQuery(this);
        var this_user_id = jQuery(this).attr('hd-data-usr_id');
        hd_confirm('Are you sure you want to remove this user from hack dash?', function() {
            jQuery.ajax({
                url: "/delete_user",
                type: "POST",
                data: {
                    user_id: this_user_id
                },
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            }).done((res) => {
                if (res['status'] == 200) {
                    this_btn.parent().parent().remove();
                } else {
                    console.log(res);
                }
            }).fail((err) => {
                console.log(err);
            });
        });
    });
</script>
@endsection
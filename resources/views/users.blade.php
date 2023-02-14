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

                <tbody class="hd_table_body">
                    @foreach($all_usrs as $user)
                    <tr class="hd_tr">
                        <td class="hd_td">{{ $user->id }}</td>
                        <td class="hd_td">{{ $user->email }}</td>
                        <td class="hd_td">{{ $user->created_at }}</td>
                        <td class="hd_td">{{ $user->updated_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
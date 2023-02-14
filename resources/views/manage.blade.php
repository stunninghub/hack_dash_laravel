@extends('adminbase')

@section('title')
Home
@endsection

@section('content')
<div class="hd_dashboard_wrap">
    <div class="hd_dashboard_at_glance">
        <div class="hack_dash_welcome_banner">
            <h1 style="margin-bottom: 15px;">Welcome to Hack Dash</h1>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nihil labore cumque voluptatibus nisi quaerat, velit tempore delectus deserunt quam. Fugit nobis officia nostrum nemo. Explicabo dignissimos neque repellat quo dolore!</p>
        </div>
        <div class="left_content">
            <div class="recent_posts">
                <div class="filled_glance_widget">
                    <div class="hd_glance_recent_posts_wrap">
                        <table class="hd_posts_table">
                            <thead class="hd_table_head">
                                <tr class="hd_tr">
                                    <th class="hd_th">ID</th>
                                    <th class="hd_th">Title</th>
                                    <th class="hd_th">Created at</th>
                                </tr>
                            </thead>

                            <tbody class="hd_table_body">
                                @foreach($recent_posts as $post)
                                <tr class="hd_tr">
                                    <td class="hd_td">{{ $post->id }}</td>
                                    <td class="hd_td">{{ $post->title }}</td>
                                    <td class="hd_td">{{ $post->created_at }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="right_content">
            <div class="updates">
                <div class="empty_glance_widget">
                    Nothing found
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('base')

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
                <div class="empty_glance_widget">
                    Nothing found
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
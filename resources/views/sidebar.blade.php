@php
$crnt_path = Route::current()->getName()
@endphp

<div class="hack_dash_side_items">
    <ul>
        <li>
            <a href="/" @if($crnt_path=='home' )class="active" @endif><span class="menu_icon"><img src="{{URL::asset('/assets/img/dashboard.svg')}}"></span><span class="menu_label">Dashboard</span></a>
        </li>
        <li class="hd_has_sub_nav">
            <a href="/posts" @if($crnt_path=='posts' || $crnt_path=='new_post' || $crnt_path=='edit_post' )class="active" @endif><span class="menu_icon"><img src="{{URL::asset('/assets/img/article.svg')}}"></span><span class="menu_label">Posts</span></a>
            <ul class="hd_sub_nav_wrap  @if($crnt_path=='posts' || $crnt_path=='new_post' || $crnt_path=='edit_post' )active @endif">
                <li>
                    <a href="/posts" @if($crnt_path=='posts' || $crnt_path=='edit_post' )class="active" @endif>All posts</a>
                </li>
                <li>
                    <a href="/post/new" @if($crnt_path=='new_post' )class="active" @endif>New post</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="/users" @if($crnt_path=='users' )class="active" @endif><span class="menu_icon"><img src="{{URL::asset('/assets/img/users.svg')}}"></span><span class="menu_label">Users</span></a>
        </li>
        <li>
            <a href="/settings" @if($crnt_path=='settings' )class="active" @endif><span class="menu_icon"><img src="{{URL::asset('/assets/img/settings.svg')}}"></span><span class="menu_label">Settings</span></a>
        </li>
        <!-- <li>
            <a href="/settings" @if($crnt_path=='api' )class="active" @endif><span class="menu_icon"><img src="{{URL::asset('/assets/img/api.svg')}}"></span><span class="menu_label">API</span></a>
        </li> -->
    </ul>
</div>
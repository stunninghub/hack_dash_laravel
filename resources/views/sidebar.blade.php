<div class="hack_dash_side_items">
    <ul>
        <li>
            <a href="/" @if(Route::current()->getName() == 'home')class="active"@endif ><span class="menu_icon"><img src="{{URL::asset('/assets/img/dashboard.svg')}}"></span><span class="menu_label">Dashboard</span></a>
        </li>
        <li>
            <a href="/posts" @if(Route::current()->getName() == 'posts')class="active"@endif ><span class="menu_icon"><img src="{{URL::asset('/assets/img/article.svg')}}"></span><span class="menu_label">Posts</span></a>
        </li>
        <li>
            <a href="/users" @if(Route::current()->getName() == 'users')class="active"@endif ><span class="menu_icon"><img src="{{URL::asset('/assets/img/users.svg')}}"></span><span class="menu_label">Users</span></a>
        </li>
        <li>
            <a href="/settings" @if(Route::current()->getName() == 'settings')class="active"@endif ><span class="menu_icon"><img src="{{URL::asset('/assets/img/settings.svg')}}"></span><span class="menu_label">Settings</span></a>
        </li>
    </ul>
</div>
<div class="hack_dash_side_items">
    <ul>
        <li>
            <a href="/" @if(Route::current()->getName() == 'home')class="active"@endif >Dashboard</a>
        </li>
        <li>
            <a href="/posts" @if(Route::current()->getName() == 'posts')class="active"@endif >Posts</a>
        </li>
        <li>
            <a href="javascript:;" @if(Route::current()->getName() == 'users')class="active"@endif >Users</a>
        </li>
        <li>
            <a href="javascript:;" @if(Route::current()->getName() == 'settings')class="active"@endif >Settings</a>
        </li>
        <li>
            <a href="javascript:;" @if(Route::current()->getName() == 'profile')class="active"@endif >Profile</a>
        </li>
    </ul>
</div>
<div class="hd_dash_settings_sidebar">
    <div class="dash_set_sidebar_banner">
        <h4>Settings</h4>
    </div>
    <ul>
        <li @if($subpage == '')class="active"@endif >
            <a href="/settings">General</a>
        </li>
        <li @if($subpage == 'profile')class="active"@endif >
            <a href="/settings/profile">Profile</a>
        </li>
        <li @if($subpage == 'privecy')class="active"@endif >
            <a href="/settings/privecy">Privecy</a>
        </li>
        <li @if($subpage == 'notifications')class="active"@endif >
            <a href="/settings/notifications">Notifications</a>
        </li>
    </ul>
</div>
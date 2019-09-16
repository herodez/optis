<div class="list-group">
    <a href="{{route('profile')}}" class="list-group-item list-group-item-action @if(Route::currentRouteName() === 'profile') active @endif">Profile</a>
    <a href="{{route('settings')}}" class="list-group-item list-group-item-action @if(Route::currentRouteName() === 'settings') active @endif">Settings</a>
    <a href="{{route('my-packages')}}" class="list-group-item list-group-item-action @if(Route::currentRouteName() === 'my-packages') active @endif">My packages</a>
</div>
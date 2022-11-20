<div class="card">
    <div class="card-header">
        Settings
    </div>
    <div class="list-group list-group-flush">
        <a href="{{ route('profile.setting') }}" class="list-group-item list-group-item-action @if (request()->is('profile/setting'))
            active
        @endif">Profile</a>
        <a href="{{ route('profile.password') }}" class="list-group-item list-group-item-action @if (request()->is('profile/password'))
            active
        @endif">Change Password</a>
        
    </div>
</div>
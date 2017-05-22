<div class="dropdown-container" dropdown>
    <span class="user-name" dropdown-toggle>
        <img class="avatar" src="https://s.gravatar.com/avatar/{{ md5($currentUser->email) }}?d=retro&r=x&s=120">
        <span class="name" ng-non-bindable>{{ $currentUser->getShortName(9) }}</span> <i class="zmdi zmdi-caret-down"></i>
    </span>
    <ul>
        <li>
            <a href="{{ baseUrl("/user/{$currentUser->id}") }}" class="text-primary">Logged in as<br><strong>{{ $currentUser->email }}</strong></h6></a>
        </li>
        <hr>
        <li>
            <a href="{{ baseUrl("/user/{$currentUser->id}") }}" class="text-primary"><i style="color:#9c27b0" class="zmdi zmdi-account zmdi-hc-fw zmdi-hc-lg"></i>{{ $currentUser->getShortName(9) }}</a>
            <a href="{{ baseUrl("/settings/users/{$currentUser->id}") }}" class="text-primary"><i style="color:#212121" class="zmdi zmdi-edit zmdi-hc-fw zmdi-hc-lg"></i>{{ trans('common.edit_profile') }}</a>
            <a href="https://github.com/doctub/issues/issues/new" class="text-primary" target="_blank"><i style="color:#e64a19" class="zmdi zmdi-bug zmdi-hc-fw zmdi-hc-lg"></i>Report Bug</a>
        </li>
        <hr>
        @if(signedInUser() && userCan('settings-manage'))
        <li>
            <a href="{{ baseUrl('/settings') }}"><i style="color:#000" class="zmdi zmdi-settings zmdi-hc-fw zmdi-hc-lg"></i>Admin</a>
            <a href="https://github.com/doctub/platform" target="_blank"><i style="color:#ff3d00" class="zmdi zmdi-code zmdi-hc-fw zmdi-hc-lg"></i>Code Base</a>
            <a href="https://ide.c9.io/yoginth/doctub" target="_blank"><i style="color:#ff3d00" class="zmdi zmdi-case-check zmdi-hc-fw zmdi-hc-lg"></i>Workspace</a>
            <a href="https://doctub-cd.deployhq.com/" target="_blank"><i style="color:#00bfa5" class="zmdi zmdi-portable-wifi zmdi-hc-fw zmdi-hc-lg"></i>DeployHQ</a>            
        </li>
        @endif
        <li>
            <a href="https://doctub.github.io/support" target="_blank"><i style="color:#4caf50" class="zmdi zmdi-help zmdi-hc-fw zmdi-hc-lg"></i>Support</a>
            <a href="https://doctub.github.io/status/" target="_blank"><i style="color:#039be5" class="zmdi zmdi-graphic-eq zmdi-hc-fw zmdi-hc-lg"></i>Status</a>
            <a href="https://gratipay.com/DocTub/" target="_blank"><i style="color:#be1931" class="zmdi zmdi-flower-alt zmdi-hc-fw zmdi-hc-lg"></i>Donate Us</a>
            <a href="{{ baseUrl('/logout') }}" class="text-neg"><i style="color:#651fff" class="zmdi zmdi-run zmdi-hc-fw zmdi-hc-lg"></i>{{ trans('auth.logout') }}</a>
        </li>
    </ul>
</div>

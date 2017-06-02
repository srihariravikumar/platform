
{{--Requires an Activity item with the name $activity passed in--}}

@if($activity->user)
    <div class="left">
        <img class="avatar" src="https://secure.gravatar.com/avatar/{{ md5(strtolower(trim($activity->user->email))) }}?d=identicon&r=x&s=80" alt="{{ $activity->user->name }}">
    </div>
@endif

<div class="right" ng-non-bindable>
    @if($activity->user)
        <a href="{{ $activity->user->getProfileUrl() }}">{{ $activity->user->name }}</a>
    @else
        <div class="left">
            <img class="avatar" src="https://secure.gravatar.com/avatar/00?d=retro&r=x&s=80" alt="{{ $activity->user->name }}">
        </div>
    @endif

    {{ $activity->getText() }}

    @if($activity->entity)
        <a href="{{ $activity->entity->getUrl() }}">{{ $activity->entity->name }}</a>
    @endif

    @if($activity->extra) "{{ $activity->extra }}" @endif

    <br>

    <span class="text-muted"><small><i class="zmdi zmdi-time"></i>{{ $activity->created_at->diffForHumans() }}</small></span>
</div>


{{--Requires an Activity item with the name $activity passed in--}}

@if($activity->user)
    <div class="left">
        <img class="avatar" src="https://secure.gravatar.com/avatar/{{ md5(strtolower(trim($activity->user->email))) }}?d=retro&r=x&s=80" alt="{{ $activity->user->name }}">
    </div>
@endif

<div class="right" ng-non-bindable>
    @if($activity->user)
        <a href="{{ $activity->user->getProfileUrl() }}">{{ $activity->user->name }}</a>
    @else
        {{ trans('common.deleted_user') }}
    @endif

    {{ $activity->getText() }}

    @if($activity->entity)
        <a href="{{ $activity->entity->getUrl() }}">{{ $activity->entity->name }}</a>
    @endif

    @if($activity->extra) "{{ $activity->extra }}" @endif

    <br>

    <span class="text-muted"><small><i class="fa fa-clock-o"></i>{{ $activity->created_at->diffForHumans() }}</small></span>
</div>

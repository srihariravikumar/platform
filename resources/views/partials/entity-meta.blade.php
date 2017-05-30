<p class="text-muted small">
    @if ($entity->isA('page')) {{ trans('entities.meta_revision', ['revisionCount' => $entity->revision_count]) }} <br> @endif
    @if ($entity->createdBy)
        {!! trans('entities.meta_created_name', [
            'timeLength' => '<span title="'.$entity->created_at->toDayDateTimeString().'">'.$entity->created_at->diffForHumans() . '</span>',
            'user' => "<a href='{$entity->createdBy->getProfileUrl()}'>".htmlentities($entity->createdBy->name). "</a>"
            ]) !!}
    @else
        <span title="{{$entity->created_at->toDayDateTimeString()}}">{{ trans('entities.meta_created', ['timeLength' => $entity->created_at->diffForHumans()]) }}</span>
    @endif
    <br>
    @if ($entity->updatedBy)
        {!! trans('entities.meta_updated_name', [
                'timeLength' => '<span title="' . $entity->updated_at->toDayDateTimeString() .'">' . $entity->updated_at->diffForHumans() .'</span>',
                'user' => "<a href='{$entity->updatedBy->getProfileUrl()}'>".htmlentities($entity->updatedBy->name). "</a>"
            ]) !!}
    @else
        <span title="{{ $entity->updated_at->toDayDateTimeString() }}">{{ trans('entities.meta_updated', ['timeLength' => $entity->updated_at->diffForHumans()]) }}</span>
    @endif
</p>

<iframe id="trends-widget-1" src="https://trends.google.com:443/trends/embed/explore/TIMESERIES?req={"comparisonItem":[{"keyword":"{{$book->name}}","geo":"","time":"2004-01-01 2017-05-30"}],"category":0,"property":""}&amp;tz=-330&amp;eq=date=all&q={{$book->name}}" width="100%;height:380px;" frameborder="0" scrolling="0"></iframe>

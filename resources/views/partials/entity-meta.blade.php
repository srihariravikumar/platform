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

<iframe frameborder="0" src="https://www.google.com/trends/fetchComponent?q={{$book->name}}&amp;cid=TIMESERIES_GRAPH_0&amp;export=5&amp;w=1140&amp;h=380" style="width:100%;max-width: 940px;height: 380px;border: 1px solid #EAEAEA; display:block; margin: 0 auto;margin-bottom: 15px;"></iframe>

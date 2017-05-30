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

<script type="text/javascript" src="https://ssl.gstatic.com/trends_nrtr/1015_RC10/embed_loader.js"></script> <script type="text/javascript"> trends.embed.renderExploreWidget("TIMESERIES", {"comparisonItem":[{"keyword":"{{$book->name}}","geo":"","time":"2004-01-01 2017-05-30"}],"category":0,"property":""}, {"exploreQuery":"date=all&q={{$book->name}}","guestPath":"https://trends.google.com:443/trends/embed/"}); </script>


<div class="notification anim pos" @if(!session()->has('success')) style="display:none;" @endif>
    <i class="fa fa-check-circle"></i> <span>{!! nl2br(htmlentities(session()->get('success'))) !!}</span>
</div>

<div class="notification anim warning stopped" @if(!session()->has('warning')) style="display:none;" @endif>
    <i class="fa fa-info-circle"></i> <span>{!! nl2br(htmlentities(session()->get('warning'))) !!}</span>
</div>

<div class="notification anim neg stopped" @if(!session()->has('error')) style="display:none;" @endif>
    <i class="fa fa-exclamation-circle"></i> <span>{!! nl2br(htmlentities(session()->get('error'))) !!}</span>
</div>

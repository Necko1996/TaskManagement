@if($task->priority == 0)
    <span class="badge badge-light">@lang('tasks.priorityLow')</span>
@elseif($task->priority == 1)
    <span class="badge badge-warning">@lang('tasks.priorityNormal')</span>
@elseif($task->priority == 2)
    <span class="badge badge-success">@lang('tasks.priorityHigh')</span>
@else
    <span class="badge badge-danger">@lang('tasks.errorPriority')</span>
@endif

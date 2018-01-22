@if($task->priority == 0)
    <span class="label label-default ">@lang('tasks.priorityLow')</span>
@elseif($task->priority == 1)
    <span class="label label-warning ">@lang('tasks.priorityNormal')</span>
@elseif($task->priority == 2)
    <span class="label label-success ">@lang('tasks.priorityHigh')</span>
@else
    <span class="label label-danger ">@lang('tasks.errorPriority')</span>
@endif
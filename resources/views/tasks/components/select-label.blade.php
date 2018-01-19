@if($task->status == 0)
    <span class="label label-default ">@lang('tasks.notActive')</span>
@elseif($task->status == 1)
    <span class="label label-warning ">@lang('tasks.inProgress')</span>
@elseif($task->status == 2)
    <span class="label label-success ">@lang('tasks.Completed')</span>
@else
    <span class="label label-danger ">@lang('tasks.errorStatus')</span>
@endif
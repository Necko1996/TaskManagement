@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                @if(!empty($tasks))

                    <div class="mx-auto pull-right m-b">
                        <a href="{{ url('/tasks/create') }}">
                            <button class="btn btn-primary">@lang('tasks.createTask') </button>
                        </a>
                    </div>

                    <div class="mb-2">
                        <table class="table table-bordered table-hover">

                            <thead>
                                <tr>
                                    <th>@lang('tasks.ID')</th>
                                    <th>@lang('tasks.Title')</th>
                                    <th>@lang('tasks.Status')</th>
                                    {{--<th>@lang('tasks.Created')</th>--}}
                                    {{--<th>@lang('tasks.Updated')</th>--}}
                                    <th> </th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach($tasks as $task)
                                    <tr>
                                        <td>{{ $task->id  }}</td>
                                        <td>{{ $task->title }}</td>
                                        <td>
                                            @include('tasks.components.select-label')
                                        </td>
                                        <td class="col-sm-4">
                                            <a href="{{ url('/tasks/' . $task->id ) }}">
                                                <button class="btn btn-primary">
                                                    View <i class="fas fa-eye"></i>
                                                </button>
                                            </a>
                                            <a href="#" onclick="document.getElementById('task-delete-form').submit()">
                                                <button class="btn btn-danger">
                                                    Delete <i class="fas fa-trash"></i>
                                                </button>
                                            </a>

                                            <form id="task-delete-form" action="{{ url('/tasks/' . $task->id ) }}" method="POST" style="display: none">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>

                        </table>
                    </div>

                @else

                    <h1 class="text-center m-b">@lang('tasks.noneTasks')</h1>

                    <div class="col-md-12 text-center">
                        <a href="{{ url('/tasks/create') }}">
                            <button class="btn btn-primary">@lang('tasks.createFirstTask')</button>
                        </a>
                    </div>

                @endif
            </div>
        </div>
    </div>
@endsection
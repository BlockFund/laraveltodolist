@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>{{ $task->title }}</h1>

        <div class="row-cols-12 text-right mb-2">
            @include('buttons.edit', ['taskId' => $task->id])
            @include('buttons.delete', ['task' => $task])
        </div>

        <ul class="list-group mb-2">
            <li class="list-group-item"><strong>Title:</strong> {{ $task->title }}</li>
            <li class="list-group-item"><strong>Description:</strong> {{ $task->description }}</li>
            <li class="list-group-item"><strong>Completed:</strong> {{ $task->completed }}</li>
            <li class="list-group-item"><strong>Created
                    by:</strong> {{ $task->user->first_name }} {{ $task->user->last_name }}</li>
            <li class="list-group-item"><strong>Created at:</strong> {{ $task->created_at }}</li>
        </ul>

        @include('buttons.back')

    </div>
@endsection

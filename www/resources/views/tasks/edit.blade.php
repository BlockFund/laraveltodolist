@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>{{ $task->title }}</h1>


        {{ \Collective\Html\FormFacade::model($task, array('route' => array('tasks.update', $task->id), 'method' => 'PUT')) }}

        <div class="form-group">
            {{ \Collective\Html\FormFacade::label('title', 'Title') }}
            {{ \Collective\Html\FormFacade::text('title', null, ['required', 'class' => 'form-control', 'disabled' => !$task->checkPermission(auth()->user()->id)]) }}

            @if($errors->has('title'))
                <span class="text-danger" role="alert">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            {{ \Collective\Html\FormFacade::label('description', 'Description') }}
            {{ \Collective\Html\FormFacade::textarea('description', null, ['required', 'class' => 'form-control', 'disabled' => !$task->checkPermission(auth()->user()->id)]) }}

            @if($errors->has('description'))
                <span class="text-danger" role="alert">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <div class="custom-control custom-switch">
                {{ \Collective\Html\FormFacade::checkbox('completed', 1, (bool) $task->completed, ['class' => 'custom-control-input', 'id' => 'customSwitch1']) }}
                {{ \Collective\Html\FormFacade::label('customSwitch1', 'Completed', ['class' => 'custom-control-label']) }}
            </div>

            @if($errors->has('completed'))
                <span class="text-danger" role="alert">
                    <strong>{{ $errors->first('completed') }}</strong>
                </span>
            @endif
        </div>

        @include('buttons.back')
        {{ \Collective\Html\FormFacade::submit('Edit the task!', ['class' => 'btn btn-primary']) }}

        {{ \Collective\Html\FormFacade::close() }}

    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>Create the task</h1>

{{--        {{ \Collective\Html\HtmlFacade::ul($errors->all()) }}--}}

        {{ \Collective\Html\FormFacade::open(['url' => 'tasks']) }}

        <div class="form-group">
            {{ \Collective\Html\FormFacade::label('title', 'Title') }}
            {{ \Collective\Html\FormFacade::text('title', old('title'), ['class' => 'form-control', 'required']) }}

            @if($errors->has('title'))
                <span class="text-danger" role="alert">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            {{ \Collective\Html\FormFacade::label('description', 'Description') }}
            {{ \Collective\Html\FormFacade::textarea('description', old('description'), ['class' => 'form-control', 'required']) }}

            @if($errors->has('description'))
                <span class="text-danger" role="alert">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            @include('buttons.back')
            {{ \Collective\Html\FormFacade::submit('Create the task!', ['class' => 'btn btn-primary']) }}
        </div>

        {{ \Collective\Html\FormFacade::close() }}

    </div>
@endsection

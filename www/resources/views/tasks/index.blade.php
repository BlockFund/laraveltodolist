@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>All the tasks</h1>

        @if (\Illuminate\Support\Facades\Session::has('message'))
            <div class="alert alert-success">{{ \Illuminate\Support\Facades\Session::get('message') }}</div>
        @endif

        @if (\Illuminate\Support\Facades\Session::has('message-error'))
            <div class="alert alert-danger">{{ \Illuminate\Support\Facades\Session::get('message-error') }}</div>
        @endif

        <div class="row-cols-12 text-right mb-2">
            <a class="btn btn-small btn-success" href="{{  \Illuminate\Support\Facades\URL::to('tasks/create') }}">Create
                a task</a>
        </div>

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <td>ID</td>
                <td>Title</td>
                <td>Description</td>
                <td>Completed</td>
                <td>Date create</td>
                <td>Actions</td>
            </tr>
            </thead>
            <tbody>
            @foreach($tasks as $key => $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->title }}</td>
                    <td>{{ $value->description }}</td>
                    <td>{{ $value->completed }}</td>
                    <td>{{ $value->created_at }}</td>

                    <td class="text-center">
                        @include('buttons.show', ['taskId' => $value->id])
                        @include('buttons.edit', ['taskId' => $value->id])
                        @include('buttons.delete', ['task' => $value])
                    </td>
                </tr>
            @endforeach

            @unless (count($tasks))
                <tr>
                    <td colspan="6">
                        <div class="alert alert-light text-center" role="alert">
                            Tasks are not found
                        </div>
                    </td>
                </tr>
            @endunless

            </tbody>
        </table>

        {{ $tasks->links() }}

    </div>
@endsection

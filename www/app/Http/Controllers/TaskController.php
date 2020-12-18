<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateRequest;
use App\Models\Task;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $tasks = Task::latest()->simplePaginate(Task::COUNT_ON_INDEX);

        return View::make('tasks.index')
            ->with('tasks', $tasks);
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return View::make('tasks.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|max:256',
            'description' => 'required|max:256',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('tasks/create')
                ->withErrors($validator)
                ->withInput($request->only(['title', 'description']));
        }

        Task::forceCreate([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'user_id' => auth()->user()->id
        ]);

        Session::flash('message', 'Successfully created task!');

        return Redirect::to('tasks');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $task = Task::findOrFail($id);

        return View::make('tasks.show')
            ->with('task', $task);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);

        if (!$task) {
            abort('404');
        }

        return View::make('tasks.edit')
            ->with('task', $task);
    }

    /**
     * @param UpdateRequest $updateRequest
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $updateRequest, $id)
    {
        $request = $updateRequest->getFields();

        /** @var Task $task */
        $task = Task::findOrFail($id);

        if (!$task) {
            abort('404');
        }

        if ($request->has('title')) {
            $task->title = $request->get('title');
        }

        if ($request->has('description')) {
            $task->description = $request->get('description');
        }

        $task->completed = $request->get('completed');

        $task->save();

        Session::flash('message', 'Successfully updated task!');
        return Redirect::to('tasks');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $user = auth()->user();
        /** @var Task $task */
        $task = Task::findOrFail($id);

        if (!$task->checkPermission($user->id)) {
            Session::flash('message-error', 'Permission denied');
            return Redirect::to('tasks');
        }

        $task->delete();

        Session::flash('message', 'Successfully deleted the task!');
        return Redirect::to('tasks');
    }
}

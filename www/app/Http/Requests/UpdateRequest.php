<?php


namespace App\Http\Requests;


use App\Models\Task;
use App\Rules\UpdateTask;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Redirect;

class UpdateRequest extends FormRequest
{
    protected $task;

    public function rules()
    {
        return [
            'title' => [
                new UpdateTask($this->task, 'Title'),
                'max:256',
            ],
            'description' => [
                new UpdateTask($this->task, 'Description'),
                'max:256'
            ],
            'completed' => 'sometimes|in:1'
        ];
    }

    protected function prepareForValidation()
    {
        $this->task = Task::findOrFail($this->route('task'));
        $this->redirect = Redirect::to('tasks/' . $this->route('task') . '/edit')->getTargetUrl();

        parent::prepareForValidation();
    }

    public function getFields()
    {
        return collect(
            array_merge(['completed' => $this->get('completed', 0)], UpdateTask::$fields)
        );
    }
}
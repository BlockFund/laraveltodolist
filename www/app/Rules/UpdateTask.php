<?php

namespace App\Rules;

use App\Models\Task;
use Illuminate\Contracts\Validation\Rule;

class UpdateTask implements Rule
{
    protected $task;
    protected $attribute;
    static $fields = [];

    /**
     * UpdateTask constructor.
     * @param Task $task
     * @param $attribute
     */
    public function __construct(Task $task, $attribute)
    {
        $this->task = $task;
        $this->attribute = $attribute;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if ($this->task->checkPermission(auth()->user()->id)) {
            static::$fields[$attribute] = $value;
            return (bool) $value;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return sprintf('The %s is required', $this->attribute);
    }

}

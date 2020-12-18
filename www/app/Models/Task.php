<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    const COUNT_ON_INDEX = 20;

    protected $fillable = [
        'title',
        'description',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * @param $userId
     * @return bool
     */
    public function checkPermission($userId)
    {
        return ($this->user_id == $userId);
    }
}
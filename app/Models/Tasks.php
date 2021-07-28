<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tasks extends Model
{
    protected $table = 'tasks';
    public $timestamps = false;

    protected $fillable = ['id', 'user_id', 'description', 'data_exe'];

    public function logs() {
        return $this->hasMany(Logs::class, 'tasks_id', 'id');
    }

    public function user() {
       return $this->belongsTo(User::class, 'user_id');
    }
}

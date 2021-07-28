<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Logs extends Model
{
    protected $table = 'logs';
    public $timestamps = false;

    protected $fillable = ['id', 'comment', 'date', 'tasks_id'];

    //relacion para traer los productos de una factura
    public function tasks() {
       return $this->belongsTo(Tasks::class, 'tasks_id');
    }
}
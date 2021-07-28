<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    protected $table = 'invoice';
    public $timestamps = true;

    protected $fillable = ['id', 'date', 'user_id', 'seller_id', 'type'];

    //relacion para traer los productos de una factura
    public function products() {
        return $this->hasMany(Product::class, 'invoice_id', 'id');
    }
}

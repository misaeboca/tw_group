<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    protected $table = 'product';
    public $timestamps = true;

    protected $fillable = ['id', 'invoice_id', 'name', 'quantity', 'price'];

    //relacion para traer los productos de una factura
    public function invoices() {
       return $this->belongsTo(Invoice::class, 'invoice_id');
    }
}

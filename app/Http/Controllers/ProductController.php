<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Invoice;
use App\Models\Product;

use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    /***return totail amount invoice***/
    public function listUp()
    {
        $products = Product::where('price', '>', 1000000)
                    ->select('name')->get();

        if(empty($products)){
            return redirect()->route('home')->withErrors('No exite productos con precio mayor a 1000.000');
        }

        $totail = $invoice->products->sum(function ($row) {

        return redirect()->route('home')->with('products');

    }

}
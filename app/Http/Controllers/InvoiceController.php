<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Invoice;
use App\Models\Product;

use Illuminate\Support\Facades\DB;


class InvoiceController extends Controller
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    /***return totail amount invoice***/
    public function totailInvoice($invoice_id)
    {
        $invoice = Invoice::with('products')
                    ->where('id', $invoice_id)
                    ->first();

        if(empty($invoice)){
            return redirect()->route('home')->withErrors('No exite la factura');
        }

        $totail = $invoice->products->sum(function ($row) {
                    return $row->price * $row->quanty;
            });

        return redirect()->route('home')->with('totail');

    }

    /***return id from invoice with quanty up 100 ***/
    public function upProduct()
    {
        $invoices = Product::where('quanty', '>', 100)
                    ->select(DB::raw('distinct(invoice_id) as id'))->get();

        if(empty($invoices)){
            return redirect()->route('home')->withErrors('No exiten  facturas con productos, con cantidad mayor a 100');
        }

        return redirect()->route('home')->with('invoices');

    }

}
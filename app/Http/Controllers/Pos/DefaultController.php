<?php

namespace App\Http\Controllers\Pos;

use Auth;
use App\Models\Unit;
use App\Models\Product;
use App\Models\Category;
use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Models\InvoiceDetail;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class DefaultController extends Controller
{
    public function GetCategory(Request $request)
    {

        $supplier_id = $request->supplier_id;
        // dd($supplier_id);
        $allCategory = Product::with(['category'])->select('category_id')->where('supplier_id', $supplier_id)->groupBy('category_id')->get();
        return response()->json($allCategory);
    } // End Mehtod

    public function GetProduct(Request $request)
    {

        $category_id = $request->category_id;
        $allProduct = Product::with('unit')->where('category_id', $category_id)->get();
        return response()->json($allProduct);
    } // End Mehtod


    public function GetStock(Request $request)
    {
        $product_id = $request->product_id;
        $stock = Product::where('id', $product_id)->first();

        $buying_total = Purchase::where('category_id', $stock->category_id)
            ->where('product_id', $stock->id)
            ->where('status', '1')
            ->sum('buying_qty');

        $selling_total = InvoiceDetail::where('category_id', $stock->category_id)
            ->where('product_id', $stock->id)
            ->where('status', '1')
            ->sum('selling_qty');

        $total = $buying_total - $selling_total ?? 0;

        return response()->json($total);
    } // End Mehtod






}

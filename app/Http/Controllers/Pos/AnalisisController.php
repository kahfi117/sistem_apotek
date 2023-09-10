<?php

namespace App\Http\Controllers\Pos;

use Auth;
use App\Models\Unit;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

use App\Models\Invoice;
use App\Models\InvoiceDetail;

class AnalisisController extends Controller
{

    public function index()
    {
        $data = InvoiceDetail::with('product')
            ->selectRaw('sum(selling_qty) as qty, sum(selling_price) as price, product_id')
            ->groupBy('product_id')
            ->orderBy('price', 'desc')
            ->get();

        $totalPendapatan = InvoiceDetail::selectRaw('sum(selling_price) as price')
            ->first()
            ->price;

        return view('backend.analisis.analisis', compact('data', 'totalPendapatan'));

        // dd($data, $totalPendapatan);
    }

    public function choose()
    {
        return view('backend.analisis.choose');
    }

    public function analisisByMonth(Request $request)
    {
        $periode = $request->periode;
        $year = date("Y", strtotime($periode));
        $month = date("m", strtotime($periode));

        $data = InvoiceDetail::with('product')
            ->selectRaw('sum(selling_qty) as qty, sum(selling_price) as price, product_id, date')
            ->groupBy('product_id')
            ->orderBy('price', 'desc')
            ->whereYear('date', $year)
            ->whereMonth('date', $month)
            ->groupBy('date')
            ->get();

        // dd($data, $request->periode);

        $totalPendapatan = InvoiceDetail::selectRaw('sum(selling_price) as price')
            ->whereYear('date', $year)
            ->whereMonth('date', $month)
            ->first()
            ->price;

        return view('backend.analisis.analisis', compact('data', 'totalPendapatan'));
    }
}
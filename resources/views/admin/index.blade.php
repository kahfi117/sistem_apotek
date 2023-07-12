@extends('admin.admin_master')
@section('admin')
    @php
        $totalObat = App\Models\Product::count();
        $totalPendapatan = App\Models\InvoiceDetail::selectRaw('sum(selling_price) as total, sum(selling_qty) as qty')->first();
        $product = App\Models\Product::all();
        $no = 1;
    @endphp
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Dashboard</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Apotek Gisella Farma</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Total Item Obat</p>
                                    <h4 class="mb-2">{{ $totalObat }} Obat</h4>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-primary rounded-3">
                                        <i class="ri-hospital-line font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->
                <div class="col-xl-4 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Obat Terjual</p>
                                    <h4 class="mb-2">{{ $totalPendapatan->qty }} Obat</h4>
                                    {{-- <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2">
                                        <i class="ri-arrow-right-up-line me-1 align-middle"></i>
                                        16.2%</span>from
                                        previous period</p> --}}
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-primary rounded-3">
                                        <i class="mdi mdi-medical-bag font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->
                <div class="col-xl-4 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Total Pendapatan</p>
                                    <h4 class="mb-2">Rp.{{ number_format($totalPendapatan->total, 2, ',', '.') }}</h4>
                                    {{-- <p class="text-muted mb-0"><span class="text-danger fw-bold font-size-12 me-2"><i
                                                class="ri-arrow-right-down-line me-1 align-middle"></i>1.09%</span>from
                                        previous period</p> --}}
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-success rounded-3">
                                        <i class="mdi mdi-currency-usd font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title text-center mb-3">Stock Obat Dibawah 10</h4>

                            <table id="datatable2" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Obat</th>
                                        <th>Satuan</th>
                                        <th class="text-center">Sisa Stock </th>
                                </thead>


                                <tbody>

                                    @foreach ($product as $key => $item)

                                        @php
                                            $buying_total = App\Models\Purchase::where('category_id', $item->category_id)
                                                ->where('product_id', $item->id)
                                                ->where('status', '1')
                                                ->sum('buying_qty');

                                            $selling_total = App\Models\InvoiceDetail::where('category_id', $item->category_id)
                                                ->where('product_id', $item->id)
                                                ->where('status', '1')
                                                ->sum('selling_qty');

                                            $stock = $buying_total - $selling_total;
                                        @endphp

                                        @if ($stock <= 10)
                                        <tr>
                                            <td> {{ $no++ }} </td>
                                            <td> {{ $item->name }} </td>
                                            <td> {{ $item['unit']['name'] }} </td>
                                            @if ($stock <= 5)
                                                <td class="text-center"> <span class="btn btn-danger">
                                                        {{ $stock ?? 0 }}</span> </td>
                                            @else
                                                <td class="text-center"> <span class="btn btn-warning">
                                                        {{ $stock ?? 0 }}</span> </td>
                                            @endif
                                        </tr>
                                        @else

                                        @endif

                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

            @php
                $data = App\Models\InvoiceDetail::with('product')
                    ->selectRaw('sum(selling_qty) as qty, sum(selling_price) as price, product_id')
                    ->groupBy('product_id')
                    ->orderBy('price', 'desc')
                    ->get();

                $totalPendapatan = App\Models\InvoiceDetail::selectRaw('sum(selling_price) as price')->first()->price;
            @endphp

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center mb-3">ANALISIS ABC</h4>
                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Obat</th>
                                        <th>Jumlah</th>
                                        <th>Total Pendapatan</th>
                                        <th>%Pendapatan</th>
                                        <th>%Kumulatif</th>
                                        <th>Kelas</th>
                                </thead>
                                @php
                                    $pendapatan = 0;
                                @endphp

                                <tbody>

                                    @foreach ($data as $key => $item)
                                        @php

                                            $kumulatif = $pendapatan + ($item->price / $totalPendapatan) * 100;

                                        @endphp

                                        <tr>
                                            <td> {{ $key + 1 }} </td>
                                            <td> {{ $item['product']['name'] }} </td>
                                            <td> {{ $item->qty }} </td>
                                            <td> Rp. {{ number_format($item->price, 2, ',', '.') }} </td>
                                            <td> {{ number_format(($item->price / $totalPendapatan) * 100, 3) }}</td>
                                            <td> {{ number_format($kumulatif, 3) }}</td>
                                            @if ($kumulatif < 80)
                                                <td>
                                                    <button class="btn btn-success">
                                                        A
                                                    </button>
                                                </td>
                                            @elseif ($kumulatif >= 80 && $kumulatif <= 95)
                                                <td>
                                                    <button class="btn btn-warning">
                                                        B
                                                    </button>
                                                </td>
                                            @else
                                                <td>
                                                    <button class="btn btn-secondary">
                                                        C
                                                    </button>
                                                </td>
                                            @endif

                                        </tr>

                                        @php

                                            $pendapatan = $kumulatif;

                                        @endphp
                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->


        </div>
    @endsection

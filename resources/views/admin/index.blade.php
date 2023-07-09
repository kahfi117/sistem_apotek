@extends('admin.admin_master')
@section('admin')
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

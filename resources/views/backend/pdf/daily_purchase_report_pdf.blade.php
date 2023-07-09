@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Laporan Pembelian</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);"> </a></li>
                                <li class="breadcrumb-item active">Laporan Pembelian Harian</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-12">
                                    <div class="invoice-title">

                                        @include('backend.pdf.title')
                                        <div class="col-6 mt-4 text-end">
                                            <address>

                                            </address>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-12">
                                    <div>
                                        <div class="p-2">
                                            <h3 class="font-size-16"><strong>Laporan Pembelian
                                                    <span class="btn btn-info"> {{ date('d-m-Y', strtotime($start_date)) }}
                                                    </span> -
                                                    <span class="btn btn-success"> {{ date('d-m-Y', strtotime($end_date)) }}
                                                    </span>
                                                </strong></h3>
                                        </div>

                                    </div>

                                </div>
                            </div> <!-- end row -->





                            <div class="row">
                                <div class="col-12">
                                    <div>
                                        <div class="p-2">

                                        </div>
                                        <div class="">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <td><strong>No </strong></td>
                                                            <td class="text-center"><strong>No Pembelian </strong></td>
                                                            <td class="text-center"><strong>Tanggal </strong>
                                                            </td>
                                                            <td class="text-center"><strong>Nama Obat</strong>
                                                            </td>
                                                            <td class="text-center"><strong>Jenis</strong>
                                                            </td>
                                                            <td class="text-center"><strong>Kategori</strong>
                                                            </td>
                                                            <td class="text-center"><strong>Qty</strong>
                                                            </td>
                                                            {{-- <td class="text-center"><strong>Harga Satuan</strong>
                                                            </td>
                                                            <td class="text-center"><strong>Total Harga</strong>
                                                            </td> --}}
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- foreach ($order->lineItems as $line) or some such thing here -->

                                                        @php
                                                            $total_sum = '0';
                                                        @endphp
                                                        @foreach ($allData as $key => $item)
                                                            <tr>
                                                                <td class="text-center">{{ $key + 1 }}</td>
                                                                <td class="text-center">{{ $item->purchase_no }}</td>
                                                                <td class="text-center">
                                                                    {{ date('d-m-Y', strtotime($item->date)) }}</td>
                                                                <td class="text-center">{{ $item['product']['name'] }}</td>
                                                                <td class="text-center">{{ $item['product']['unit']['name'] }}</td>
                                                                <td class="text-center">{{ $item['product']['category']['name'] }}</td>
                                                                <td class="text-center">{{ $item->buying_qty }}
                                                                    {{ $item['product']['unit']['name'] }} </td>
                                                                {{-- <td class="text-center">Rp.{{ number_format($item->unit_price,2,',','.') }}</td>
                                                                <td class="text-center">Rp.{{ number_format($item->buying_price,2,',','.') }}</td> --}}
                                                            </tr>
                                                            {{-- @php
                                                                $total_sum += $item->buying_price;
                                                            @endphp --}}
                                                        @endforeach

                                                        {{-- <tr>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line text-center" colspan="2">
                                                                <strong>Total Bayar</strong>
                                                            </td>
                                                            <td class="no-line text-end">
                                                                <h4 class="m-0">Rp. {{ number_format($total_sum,2,',','.') }}</h4>
                                                            </td>
                                                        </tr> --}}
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="d-print-none">
                                                <div class="float-end">
                                                    <a href="javascript:window.print()"
                                                        class="btn btn-success waves-effect waves-light"><i
                                                            class="fa fa-print"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- end row -->






                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
@endsection

@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Faktur Pembelian</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);"> </a></li>
                                <li class="breadcrumb-item active">Pembelian Obat</li>
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
                                        <h4 class="float-end font-size-16"><strong>Nomor Pembelian #
                                                {{ $purchase->purchase_no }}</strong></h4>
                                        @include('backend.pdf.title')
                                        <div class="col-6 mt-4 text-end">
                                            <address>
                                                <strong>Tanggal Pembelian:</strong><br>
                                                {{ date('d-m-Y', strtotime($purchase->date)) }} <br><br>
                                            </address>
                                        </div>
                                    </div>
                                </div>
                            </div>

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
                                                            <td class="text-center"><strong>Kategori</strong></td>
                                                            <td class="text-center"><strong>Nama Obat</strong>
                                                            </td>
                                                            <td class="text-center"><strong>Jenis</strong>
                                                            </td>
                                                            <td class="text-center"><strong>Quantity</strong>
                                                            </td>
                                                            <td class="text-end"><strong>Harga Satuan</strong>
                                                            </td>
                                                            <td class="text-end"><strong>Total Harga</strong>
                                                            </td>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- foreach ($order->lineItems as $line) or some such thing here -->

                                                        @php
                                                            $total_sum = '0';
                                                        @endphp
                                                        @foreach ($dataBuying as $key => $details)
                                                            <tr>
                                                                <td class="text-center">{{ $key + 1 }}</td>
                                                                <td class="text-center">{{ $details['category']['name'] }}
                                                                </td>
                                                                <td class="text-center">{{ $details['product']['name'] }}
                                                                </td>
                                                                <td class="text-center">{{ $details['product']['unit']['name'] }}
                                                                </td>
                                                                <td class="text-center">{{ $details->buying_qty }}</td>
                                                                <td class="text-end">Rp.{{ number_format($details->unit_price,2,',','.') }}</td>
                                                                <td class="text-end">Rp.{{ number_format($details->buying_price,2,',','.') }}</td>

                                                            </tr>
                                                            @php
                                                                $total_sum += $details->buying_price;
                                                            @endphp
                                                        @endforeach
                                                        <tr>
                                                            <td class="thick-line"></td>
                                                            <td class="thick-line"></td>
                                                            <td class="thick-line"></td>
                                                            <td class="thick-line"></td>
                                                            <td class="thick-line"></td>
                                                            <td class="thick-line text-center">
                                                                <strong>Subtotal</strong>
                                                            </td>
                                                            <td class="thick-line text-end">Rp. {{ number_format($total_sum,2,',','.')  }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="d-print-none">
                                                <div class="float-end">
                                                    <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light">
                                                        <i class="fa fa-print"></i>
                                                    </a>
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

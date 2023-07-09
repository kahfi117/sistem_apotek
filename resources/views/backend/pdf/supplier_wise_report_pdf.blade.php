@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Laporan Pembelian Obat Dari Supplier</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);"> </a></li>
                                <li class="breadcrumb-item active">Laporan Pembelian Obat</li>
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

                                                <h5 class="text-start"><strong>Supplier : </strong>
                                                    {{ $allData['0']['supplier']['name'] ?? '' }} </h5>


                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <td><strong>No</strong></td>
                                                            <td class="text-start"><strong>Kategori</strong>
                                                            </td>
                                                            <td class="text-start"><strong>Nama Obat</strong>
                                                            </td>
                                                            <td class="text-start"><strong>Satuan</strong>
                                                            </td>
                                                            <td class="text-start"><strong>Stock </strong>
                                                            </td>


                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- foreach ($order->lineItems as $line) or some such thing here -->


                                                        @foreach ($allData as $key => $item)
                                                            <tr>
                                                                <td class="text-start"> {{ $key + 1 }} </td>
                                                                <td class="text-start"> {{ $item['product']['category']['name'] }}
                                                                </td>
                                                                <td class="text-start"> {{ $item['product']['name'] }} </td>
                                                                <td class="text-start"> {{ $item['product']['unit']['name'] }} </td>
                                                                <td class="text-start"> {{ $item->qty }} </td>


                                                            </tr>
                                                        @endforeach


                                                    </tbody>
                                                </table>
                                            </div>


                                            @php
                                                $date = new DateTime('now', new DateTimeZone('Asia/Makassar'));
                                            @endphp
                                            <i>Printing Time : {{ $date->format('F j, Y, g:i a') }}</i>

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

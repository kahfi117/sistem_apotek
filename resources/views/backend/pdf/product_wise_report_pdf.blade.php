@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Product Wise Stock Report</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);"> </a></li>
                                <li class="breadcrumb-item active">Product Wise Stock Report</li>
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



                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <td class="text-center">
                                                                <strong>Kategori</strong>
                                                            </td>
                                                            <td class="text-center">
                                                                <strong>Nama Obat</strong>
                                                            </td>
                                                            <td class="text-center">
                                                                <strong>Satuan</strong>
                                                            </td>
                                                            <td class="text-center">
                                                                <strong>In Qty</strong>
                                                            </td>
                                                            <td class="text-center">
                                                                <strong>Out Qty</strong>
                                                            </td>
                                                            <td class="text-center">
                                                                <strong>Stock </strong>
                                                            </td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($products as $product)
                                                            @php
                                                                $buying_total = App\Models\Purchase::where('category_id', $product->category_id)
                                                                    ->where('product_id', $product->id)
                                                                    ->where('status', '1')
                                                                    ->sum('buying_qty');

                                                                $selling_total = App\Models\InvoiceDetail::where('category_id', $product->category_id)
                                                                    ->where('product_id', $product->id)
                                                                    ->where('status', '1')
                                                                    ->sum('selling_qty');
                                                            @endphp
                                                            <tr>
                                                                <td class="text-center"> {{ $product['category']['name'] }}
                                                                </td>
                                                                <td class="text-center"> {{ $product->name }} </td>
                                                                <td class="text-center"> {{ $product['unit']['name'] }}
                                                                </td>
                                                                <td class="text-center"> {{ $buying_total }} </td>
                                                                <td class="text-center"> {{ $selling_total }} </td>
                                                                <td class="text-center"> {{ $buying_total - $selling_total }} </td>
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

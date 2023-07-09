@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Analisis ABC</h4>



                    </div>
                </div>
            </div>
            <!-- end page title -->

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

                                            $kumulatif = $pendapatan + ($item->price/$totalPendapatan)*100;

                                        @endphp

                                        <tr>
                                            <td> {{ $key + 1 }} </td>
                                            <td> {{ $item['product']['name'] }} </td>
                                            <td> {{ $item->qty }} </td>
                                            <td> Rp. {{ number_format($item->price,2,',','.') }} </td>
                                            <td> {{ number_format(($item->price/$totalPendapatan)*100 , 3) }}</td>
                                            <td> {{  number_format($kumulatif,3) }}</td>
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



        </div> <!-- container-fluid -->
    </div>
@endsection

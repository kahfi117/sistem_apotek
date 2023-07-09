@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Daftar Data User</h4>



                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <a href="{{ route('user.add') }}" class="btn btn-dark btn-rounded waves-effect waves-light"
                                style="float:right;"><i class="fas fa-plus-circle"> Tambah User </i></a> <br> <br>

                            <h4 class="card-title">Data User </h4>


                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th width="20%">Action</th>

                                </thead>


                                <tbody>

                                    @foreach ($users as $key => $item)
                                        <tr>
                                            <td> {{ $key + 1 }} </td>
                                            <td> {{ $item->name }} </td>
                                            <td> {{ $item->email }} </td>
                                            @if ($item->role == 'admin')
                                                <td>
                                                    <h5>
                                                        <span class="badge rounded-pill bg-success ">Admin</span>
                                                    </h5>
                                                </td>
                                            @else
                                                <td>
                                                    <h5>
                                                        <span class="badge rounded-pill bg-primary ">Manajer</span>
                                                    </h5>
                                                </td>
                                            @endif
                                            <td>
                                                @if (Auth::user()->role == 'admin')
                                                    <a href="{{ route('user.edit', $item->id) }}" class="btn btn-info sm"
                                                        title="Edit Data"> <i class="fas fa-edit"></i> </a>

                                                    <a href="{{ route('user.delete', $item->id) }}"
                                                        class="btn btn-danger sm" title="Delete Data" id="delete"> <i
                                                            class="fas fa-trash-alt"></i>
                                                    </a>
                                                @else
                                                <button class="btn btn-secondary sm">NO ACTION </button>
                                                @endif
                                            </td>


                                        </tr>
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

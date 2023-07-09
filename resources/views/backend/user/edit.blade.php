@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Edit Data User</h4><br><br>

                            <form method="post" action="{{ route('user.update') }}" id="myForm">
                                @csrf

                                <input type="hidden" name="id" value="{{ $user->id }}">
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Nama </label>
                                    <div class="form-group col-sm-10">
                                        <input name="name" class="form-control" type="text"
                                            value="{{ $user->name }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Username </label>
                                    <div class="form-group col-sm-10">
                                        <input name="username" class="form-control" type="text"
                                            value="{{ $user->username }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Email </label>
                                    <div class="form-group col-sm-10">
                                        <input name="email" class="form-control" type="email"
                                            value="{{ $user->email }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Role </label>
                                    <div class="form-group col-sm-10">
                                        <select name="role" id="" class="form-control">
                                            @if ($user->role == 'admin')
                                                <option value="">-- Pilih Role --</option>
                                                <option value="admin" selected>Admin</option>
                                                <option value="manajer">Manajer</option>
                                            @else
                                                <option value="">-- Pilih Role --</option>
                                                <option value="admin">Admin</option>
                                                <option value="manajer" selected>Manajer</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Password </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="password" type="password" name="password"
                                         placeholder="Password">
                                    </div>
                                </div>


                                <div class="form-group mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Password Confirm
                                    </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="password_confirmation" type="password"
                                            name="password_confirmation" placeholder="Password Confirmation">
                                    </div>
                                </div>


                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Edit User">
                            </form>



                        </div>
                    </div>
                </div> <!-- end col -->
            </div>



        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    username: {
                        required: true,
                    },
                    email: {
                        required: true,
                    },
                    role: {
                        required: true,
                    },

                },
                messages: {
                    name: {
                        required: 'Please Enter Your Name',
                    },
                    username: {
                        required: 'Please Enter Your User Name and Must Unique',
                    },
                    email: {
                        required: 'Please Enter Your Email',
                    },
                    role: {
                        required: 'Please Select One Role',
                    },

                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>
@endsection

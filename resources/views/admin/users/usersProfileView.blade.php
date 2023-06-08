<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
@extends('admin.adminMaster')
@section('admin')
    <!-- Site wrapper -->
    <div class="wrapper">

        <!-- Content Wrapper. Contains page content -->
        <div class="content">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <h2 class="mt-5">Korisnici</h2>
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3 d-flex align-items-center">
                            <div class="card-footer clearfix">
                                <a href="{{ route('users.create') }}" type="button" class="btn btn-primary float-right"><i class="fas fa-plus" style="margin-right: 5px"></i> Dodajte korisnika</a>
                            </div>
                        </div>
                        <div class="col-md-12 custom-select-wrapper">
                            <form action="{{ route('users.sort', ['role'=>'role']) }}" method="GET">
                                <select class="odabrano ml-2" name="role" onchange="this.form.submit()">
                                    <option value="all" {{ request('role') === 'all' ? 'selected' : '' }}>All</option>
                                    <option value="admin" {{ request('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="trainer" {{ request('role') === 'trainer' ? 'selected' : '' }}>Trainer</option>
                                    <option value="member" {{ request('role') === 'member' ? 'selected' : '' }}>Member</option>
                                </select>
                            </form>


{{--                            <form class="form-inline" action="{{ route('users.sort', ['role' => request('role')]) }}" method="GET">--}}
{{--                                <div class="form-group">--}}
{{--                                <label for="role">Prikaz korisnika po ulogama:</label>--}}
{{--                                <select name="role" id="role" class="form-control ml-2">--}}
{{--                                    <option value="all"{{ request('role') === 'all' ? ' selected' : '' }}>All</option>--}}
{{--                                    <option value="admin"{{ request('role') === 'admin' ? ' selected' : '' }}>Admin</option>--}}
{{--                                    <option value="trainer"{{ request('role') === 'trainer' ? ' selected' : '' }}>Trainer</option>--}}
{{--                                    <option value="member"{{ request('role') === 'member' ? ' selected' : '' }}>Member</option>--}}
{{--                                </select>--}}
{{--                                <button class="btnSort" type="submit">Sortiraj</button>--}}
{{--                                </div>--}}
{{--                            </form>--}}
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                @if(Session::has('message'))
                    <script>
                    var type = "{{ Session::get('alert-type','info') }}"
                    switch(type){
                    case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;

                    case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;

                    case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;

                    case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
                    }
                    </script>
                @endif
                <!-- Default box -->
                <div class="card">
                    <div class="card-body p-0">
                        <table class="table table-striped projects">
                            <thead>
                            <tr>
                                <th class="text-center">

                                </th>
                                <th class="text-center">
                                    Ime
                                </th>
                                <th class="text-center">
                                    Prezime
                                </th>
                                <th>
                                    Korisničko ime
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Adresa
                                </th>
                                <th>
                                    Broj telefona
                                </th>
                                <th>
                                    Pol
                                </th>
                                <th>
                                    Godine
                                </th>
                                <th>
                                    Pozicija
                                </th>
                                <th style="width: 20%">
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>

                                    </td>
                                    <td>
                                        <a>
                                            {{ $user->UserInfo->first_name }}
                                        </a>
                                    </td>
                                    <td>
                                        {{ $user->UserInfo->last_name }}
                                    </td>
                                    <td>
                                        {{ $user->username }}
                                    </td>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                    <td>
                                        {{ $user->UserInfo->address }}
                                    </td>
                                    <td>
                                        {{ $user->userInfo->phone }}
                                    </td>
                                    <td>
                                        {{ $user->UserInfo->gender }}
                                    </td>
                                    <td>
                                        {{ $user->UserInfo->age }}
                                    </td>
                                    <td>
                                        {{ $user->role }}
                                    </td>
                                    <td class="project-actions text-right">
                                        <div class="row">
                                            <div class="col-md-4">
                                        <a class="btn btn-primary btn-sm" href="{{ route('users.select', $user->id) }}">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                            </div>
                                            <div class="col-md-4">
                                        <a class="btn btn-info btn-sm" href="{{ route('users.edit', $user->id) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                            </div>
                                            <div class="col-md-4">
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash mr-1"></i>Delete</button>
                                        </form>
                                        </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

@endsection

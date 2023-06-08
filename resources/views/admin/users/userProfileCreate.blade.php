<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
@extends('admin.adminMaster')
@section('admin')
    <body style="background: #eae9e9">
    <br>

    <!-- Content Wrapper. Contains page content -->
    <div class="content">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1>Dodavanje novog korisnika</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Profil Add</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content mt-3">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Podaci profila</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Ime:</label>
                                <input type="text" id="inputName" class="form-control" name="first_name" placeholder="Unesite ime">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Prezime:</label>
                                <input type="text" id="inputName" class="form-control" name="last_name" placeholder="Unesite prezime">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Adresa:</label>
                                <input type="text" id="inputName" class="form-control" name="address" placeholder="Unesite adresu">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Broj telefona:</label>
                                <input type="text" id="inputName" class="form-control" name="phone" placeholder="Unesite broj telefona">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Godine:</label>
                                <input type="text" id="inputName" class="form-control" name="age" placeholder="Unesite godine">
                            </div>
                            <div class="form-group row ">
                                <div class="col-md-12">
                                    <label for="gender" class= "col-md-4 col-form-label text-md-right">{{ __('Pol') }}</label>
                                    <div class="form-check form-check-inline" >
                                        <input class="form-check-input" type="radio" name="gender" value="{{ \App\Models\UserInfo::GENDER_MUSKO }}">
                                        <label class="form-check-label" for="{{ \App\Models\UserInfo::GENDER_MUSKO }}">Muško</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" value="{{ \App\Models\UserInfo::GENDER_ZENSKO }}">
                                        <label class="form-check-label" for="{{ \App\Models\UserInfo::GENDER_ZENSKO }}">Žensko</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-6">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Podaci za prijavu</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Korisničko ime:</label>
                                <input type="text" id="inputName" class="form-control" name="username" placeholder="Unesite korisničko ime">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Email:</label>
                                <input type="text" id="inputName" class="form-control" name="email" placeholder="Unesite email">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Šifra:</label>
                                <input class="form-control" id="inputName" type="password" name="password" placeholder="Unesite šifru">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Potvrdite šifru:</label>
                                <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" placeholder="Potvrdite unetu šifru">
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Uloga</label>
                                <select id="inputStatus" class="form-control custom-select" name="role">
                                    <option selected disabled>Izaberite ulogu</option>
                                    <option value="admin">Admin</option>
                                    <option value="trainer">Trener</option>
                                    <option value="member">Član</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
                <div>
                    <button class="btn btn-outline-primary" type="submit">Registruj se</button>
                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    </body>
@endsection

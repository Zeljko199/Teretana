<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
@extends('admin.adminMaster')
@section('admin')
    <body style="background: #eae9e9">
    <br>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Promenite podatke o korisniku</h4>
                            <form method="post" action="{{ route('users.update', ['user' => $user]) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3 mt-5">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Ime</label>
                                    <div class="col-sm-10">
                                        <input name="first_name" class="form-control" type="text" value="{{ $user->userInfo->first_name }}" id="example-text-input">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Prezime</label>
                                    <div class="col-sm-10">
                                        <input name="last_name" class="form-control" type="text" value="{{ $user->userInfo->last_name }}" id="example-text-input">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Korisničko ime</label>
                                    <div class="col-sm-10">
                                        <input name="username" class="form-control" type="text" value="{{ $user->username }}" id="example-text-input">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">E-mail</label>
                                    <div class="col-sm-10">
                                        <input name="email" class="form-control" type="email" value="{{ $user->email }}" id="example-text-input">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3 mt-5">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Adresa</label>
                                    <div class="col-sm-10">
                                        <input name="address" class="form-control" type="text" value="{{ $user->userInfo->address }}" id="example-text-input">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3 mt-5">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Broj telefona</label>
                                    <div class="col-sm-10">
                                        <input name="phone" class="form-control" type="tel" value="{{ $user->userInfo->phone }}" id="example-text-input">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <div class="col-md-12">
                                        <label for="gender" class= "col-md-4 col-form-label text-md-right">{{ __('Pol') }}</label>
                                        <div class="form-check form-check-inline" >
                                            <input class="form-check-input" type="radio" name="gender" value="{{ \App\Models\UserInfo::GENDER_MUSKO }}" {{ $user->userInfo->gender === \App\Models\UserInfo::GENDER_MUSKO ? 'checked' : '' }}>
                                            <label class="form-check-label" for="{{ \App\Models\UserInfo::GENDER_MUSKO }}">Muško</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" value="{{ \App\Models\UserInfo::GENDER_ZENSKO }}" {{ $user->userInfo->gender === \App\Models\UserInfo::GENDER_ZENSKO ? 'checked' : '' }}>
                                            <label class="form-check-label" for="{{ \App\Models\UserInfo::GENDER_ZENSKO }}">Žensko</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3 mt-5">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Godine</label>
                                    <div class="col-sm-10">
                                        <input name="age" class="form-control" type="number" value="{{ $user->userInfo->age }}" id="example-text-input">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="form-group">
                                    <label for="inputStatus">Uloga</label>
                                    <select id="inputStatus" class="form-control custom-select" name="role">
                                        <option disabled>Izaberite ulogu</option>
                                        <option value="admin" {{ $user->role === \App\Models\User::TYPE_ADMIN ? 'selected' : '' }}>Admin</option>
                                        <option value="trainer" {{ $user->role === \App\Models\User::TYPE_TRAINER ? 'selected' : '' }}>Trener</option>
                                        <option value="member {{ $user->role === \App\Models\User::TYPE_MEMBER ? 'selected' : '' }}">Član</option>
                                    </select>
                                </div>
                                <input type="submit" class="btn btn-info btn-rounded waves-effect waves-light" value="Ažuriraj profil">
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
    </div>
@endsection

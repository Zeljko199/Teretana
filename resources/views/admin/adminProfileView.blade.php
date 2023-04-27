<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
@extends('admin.adminMaster')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <br><br>
                    <div style="text-align: center;">
                        <img class="rounded-circle avatar-xl" src="{{ (!empty($adminData->profile_image))? url('image/admin_images/'.$editData->profile_image):url('image/admin_images/avatar.png') }}" alt="Card image cap">
                    </div>
                        <div class="card-body">
                            <div class="row">
                            <div class="col-md-6">
                    <h4 class="card-title mt-2">Ime: {{ $adminData->name ?? 'None' }}</h4>
                    <h4 class="card-title mt-2">Korisničko ime: {{ $adminData->username }}</h4>
                    <h4 class="card-title mt-2"> E-mail: {{ $adminData->email }}</h4>
                        </div>
                            </div>
                    <br>
                    <a class="btn btn-info btn-rounded waves-effect waves-light" href="{{ route('edit.profile') }}">Uredi profil</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
</div>

@endsection

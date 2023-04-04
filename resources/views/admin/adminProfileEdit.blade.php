<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
@extends('admin.adminMaster')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                        <h4 class="card-title mb-4">Detalji o korisniku</h4>
                        <form>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Ime</label>
                                <div class="col-sm-10">
                                    <input name="name" class="form-control" type="text" value="{{ $editData->name }}" id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Korisničko ime</label>
                                <div class="col-sm-10">
                                    <input name="username" class="form-control" type="text" value="{{ $editData->username }}" id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">E-mail</label>
                                <div class="col-sm-10">
                                    <input name="email" class="form-control" type="text" value="{{ $editData->email }}" id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Slika korisnika</label>
                                <div class="col-sm-10">
                                    <input name="profileImage" class="form-control" type="file" id="image">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img id="showImage" class="rounded avatar-lg" src="{{ asset('backend/assets/images/small/img-5.jpg') }}" alt="Card image cap">
                                </div>
                            </div>
                            <!-- end row -->
                            <input type="submit" class="btn btn-info btn-rounded waves-effect waves-light" value="Ažuriraj profil">
                        </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
    </div>
<script type="text/javascript">
    // kod se izvrsava tek kada se ucita ceo HTML dokument
    $(document).ready(function (){
        //f-ja se pokrece kada se vrednost input polja sa ID-om "image" promeni
        $('#image').change(function (e){
            //pravi novi objekat "FileReader" koji omogucava JavaScriptu da cita sadrzaj fajla
            var reader = new FileReader();
            // postavlja f-ju koja ce se pozvati kada se fajl uspesno ucita
            reader.onload = function (e){
                //kod postavlja atribut "src" elementa sa ID-om "showImage" na fajl koji je ucitan (e.target.result)
                $('#showImage').attr('src',e.target.result);
            }
            //cita sadrzaj fajla i prikazuje ga u pregledacu, "e.target.files['0']" je fajl koji je izabran iz input polja
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection

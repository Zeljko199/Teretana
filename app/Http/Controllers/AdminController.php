<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function Profile(){
        //Dobavlja ID trenutno autentifikovanog korisnika
        $id = Auth::user()->id;
        // zatim f-ja koristi taj ID da pronađe podatke o korisniku i snesta podatke u $adminData
        $adminData = User::find($id);
        // biće prikazani podaci o trenutno autentifikovanom korisniku. adminData je varijabla koja sadrzi informacije
        // o trenutno autentifikovanom korisniku    */
        return view('admin.adminProfileView', compact('adminData'));
    }

    public function EditProfile(){
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('admin.adminProfileEdit', compact('editData'));
    }
}

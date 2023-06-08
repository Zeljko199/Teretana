<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Trainer;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'Korisnik je uspesno odjavljen',
            'alert-type' => 'success'
        );

        return redirect('/login')->with($notification);
    }

    public function Profile(){
        //Dobavlja ID trenutno autentifikovanog korisnika
        $user_id = Auth::user()->id;
        // zatim f-ja koristi taj ID da pronađe podatke o korisniku i snesta podatke u $adminData
        $userDate = User::with('UserInfo')->find($user_id);
        // biće prikazani podaci o trenutno autentifikovanom korisniku. adminData je varijabla koja sadrzi informacije
        // o trenutno autentifikovanom korisniku    */
        return view('admin.adminProfileView', compact('userDate'));
    }

    public function EditProfile(){
        $user_id = Auth::user()->id;
        $editData = User::with('UserInfo')->find($user_id);
        return view('admin.adminProfileEdit', compact('editData'));
    }

    public function StoreProfile(Request $request){

        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
        ]);

        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $user->email = $request->email;
        $user->username = $request->username;

        if ($request->file('profile_image')) {
            $file = $request->file('profile_image');

            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('image/admin_images'),$filename);
            $user['profile_image'] = $filename;
        }

        $user->save();

        $userInfo = new UserInfo();
        $userInfo->first_name = $request->first_name;
        $userInfo->last_name = $request->last_name;
        $userInfo->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('admin.profile')->with($notification);
    }
 /*   public function ChangePassword(){

        return view('admin.admin_change_password');

    }
    public function UpdatePassword(Request $request){

        $validateData = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirm_password' => 'required|same:newpassword',

        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword,$hashedPassword )) {
            $users = User::find(Auth::id());
            $users->password = bcrypt($request->newpassword);
            $users->save();

            session()->flash('message','Password Updated Successfully');
            return redirect()->back();
        } else{
            session()->flash('message','Old password is not match');
            return redirect()->back();
        }

    }*/
}

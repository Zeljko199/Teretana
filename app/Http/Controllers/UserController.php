<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStore;
use App\Models\Member;
use App\Models\UserInfo;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public $search = '';
    public function UserIndex(){
//        $userInfo_id = Auth::user()->id;
//        $userData = User::find($userInfo_id);
//        return view('admin.users.userProfileView', compact('userData'));
        $users = User::with('UserInfo')->get();
        return view('admin.users.usersProfileView', ['users' => $users]);
    }
    // U metodi koristimo User model binding da bismo pronašli korisnika koji se trazi na osnovu id-ja i
    // prikazali detaljne informacije o njemu.
    public function UserSelect(User $user){
        return view('admin.users.userProfileSelect', compact('user'));
//        $user = User::with('UserInfo')->get();
//        return view('admin.users.usersProfileView', ['user' => $user]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function UserCreate()
    {
        return view('admin.users.userProfileCreate');
    }

    public function UserStore(UserStore $request)
    {

        $existingUser = User::where('email', $request->email)->first();
        if ($existingUser){
            return redirect()->back()->with('error', 'Korisnik sa tom email adresom već postoji!');
        }
        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->email_verified_at = Carbon::now();
        $user->role = $request->input('role');
        $user->save();

        $userInfo = new UserInfo();
        $userInfo->first_name = $request->first_name;
        $userInfo->last_name = $request->last_name;
        $userInfo->address = $request->address;
        $userInfo->phone = $request->phone;
        $userInfo->age = intval($request->age);
        $userInfo->gender = $request->gender;
        $userInfo->user_id = $user->id;
        $userInfo->save();

        if($request->input('role') === User::TYPE_MEMBER){
        $member = new Member();
        $member->user_id = $user->id;
        $member->join_date = now();
        $member->end_of_membership_date = Carbon::now()->addMonth();
        $member->is_active = true;
        $member->save();
        }

        return redirect()->route('users.index')->with('success', 'Korisnik je uspesno registrovan.');
        //return view('admin.users.usersProfileView');
    }
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */

    public function UserEdit()
    {
        $user_id = Auth::user()->id;
        $user = User::with('userInfo')->findOrFail($user_id);
        return view('admin.users.userProfileEdit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    // BINDING
    public function UserUpdate(Request $request, User $user)
    {
        //dd($request->all());
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'age' => ['required', 'numeric'],
            'gender' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string']
        ]);
        //die();
        //$user = User::findOrFail($user);
        $user->username = $request->username;
        $user->email = $request->email;
        $user->role = $request->input('role');
        $user->save();

        $user->userinfo->first_name = $request->first_name;
        $user->userinfo->last_name = $request->last_name;
        $user->userinfo->address = $request->address;
        $user->userinfo->phone = $request->phone;
        $user->userinfo->age = $request->age;
        $user->userinfo->gender = $request->gender;
        $user->userinfo->save();
        return redirect()->route('users.index')->with('message', 'Podaci korisnika su uspešno ažurirani.');
        //return view('admin.users.userProfileEdit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function UserDestroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->userInfo()->delete();
        $user->delete();
        $notification = array(
            'message' => 'Korisnik je obrisan!',
            'alert-type' => 'info'
        );
        return redirect()->route('users.index')->with($notification);
    }
    public function SearchUser(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);
        $email = $email ?? $request->input('email');
        if ($request->email){
            $user = User::with('userInfo')->where('email', $email)->first();
            return view('admin.users.userProfileSelect', compact( 'user'));
        }
        else{
            return redirect()->back()->with('message', 'Korisnik nije pronađen.');
        }
    }
    public function UserSort(Request $request){
        $users = [];
        $role = $request->input('role','all');
        if($role === 'all'){
            $users = User::with('UserInfo')->get();
        }
        else{
            $users = User::with('UserInfo')->where('role', $role)->get();
        }
        return view('admin.users.usersProfileView', ['users' => $users]);
    }

    /* $user_id = Auth::user()->id;

    $user = User::with('userInfo')->find($user_id);

    return view('admin.adminProfileView', compact('user')); */
}
